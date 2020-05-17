<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\db\Connection;
use yii\db\Command;
use yii\db\DataReader;
use yii\db\Transaction;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Country;
use app\models\Answer;
use app\models\Formlist;
use yii\widgets\ActiveForm;
use app\models\FormQuestion;
use app\models\FormQuestionOption;
use app\models\FormQuestionType;
use app\models\FormAnswerDetail;
use app\models\FormAnswer;

class SiteController extends Controller
{
    public $layout = 'main_user';
    /**
     * {@inheritdoc}
     */
    private $questionID = array();
    private $surveyID = array();
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = Formlist::find()->all();
        $data = array();
        // $data = $model->attributeLabels();
        return $this->render('index',['data' => $model]);
        // return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionSurvey()
    {
        $model = Formlist::find()->all();
        $data = array();
        return $this->render('survey',['data' => $model]);
    }
    public function actionGraph()
    {
        return $this->render('index');
    }
    public function actionForm($formlistID)
    {
        $data;$value;
        $model = new Country();
        if(isset($formlistID)){
            $data = $model->question($formlistID);
            $value = $model->checkbox($formlistID);
        }else{
            return $this->render('error');
        } 
        $modelsFormQuestion = new FormQuestion;
        $modelsFormQuestionOption = new FormQuestionOption;
        $modelsFormAnswerDetail = new FormAnswerDetail();
        return $this->render('form',['FormAnswerDetail' => $modelsFormAnswerDetail,'data' => $data,'value' => $value]);
    }
    public function actionCoba(){
        $modelFormAnswer = new FormAnswerDetail;
        $model = new Country();
        $data = $model->questionID();
        $tmp;$idFormAnswer;
        //if($modelFormAnswer->load(Yii::$app->request->post())){
            //ini $trash cuman untuk mneampung, sama halnya dengan trash dibawahnya
            $trash = $model->count();
            $trashIDFormAnswer = $model->countFormAnswer();
            // dua foreach ini untuk ambil nilai dan taruh di variable iterasi
            foreach($trash as $tr){
                $count = $tr['SEQ'] + 1;
            }
            foreach($trashIDFormAnswer as $tr){
                $idFormAnswer = $tr['SEQ'] + 1;
            }
            //tmpCount itu untuk nilai sequence yang dipassing ke insertAnswer dan masuk ke table formanswerdetail
            //karena harus unik
            $tmpCount = $count;
                foreach($data as $loop){
                    if(isset($_POST[$loop['ID']])){
                    $tmp = $_POST[$loop['ID']];
                    if($tmpCount == $count){
                        //if ini sebenarnya pastiin bahwa hanya iterasi pertama kali yang jalanain insertAnswer
                            $model->insertAnswer($tmpCount,$idFormAnswer,$loop['ID'],$tmp);
                    }else{
                        // ini untuk menghandle tipe data array kayak checkbox, jadi di check dulu apakah 
                        // datanya array atau string biasa
                        if(is_array($tmp)){
                            foreach($tmp as $dat){
                                $model->insertAnswerDetail($tmpCount,$idFormAnswer,$loop['ID'],$dat);
                            }
                        }else{
                            $model->insertAnswerDetail($tmpCount,$idFormAnswer,$loop['ID'],$tmp);
                        }
                    }
                    
                    $tmpCount++;
                    }
                }
            return $this->render('coba',['tmp' => $tmp]);
        //}
    }
    public function actionForms()
    {
        $model = new Answer();
        if($model->load(Yii::$app->request->post()) && $model->save()){
            Yii::$app->session->setFlash('formSubmitted');
            return $this->render('forms',[
                'model' => $model,
            ]);

        }else{
            return $this->render('forms',[
                'model' => $model,
            ]);
        }
    }
}
