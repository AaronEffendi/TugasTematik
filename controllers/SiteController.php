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
        return $this->render('survey');
    }
    public function actionGraph()
    {
        return $this->render('index');
    }
    public function actionForm()
    {
        $model = new Country();
        $data = array();
        $value = array();
        $data = $model->question();
        $value = $model->checkbox();
        $num = count($data);
        for($i = 0 ; $i < $num ;$i++){
            $this->questionID[$i] = $data[$i]['ID'];
        }
        // print_r($this->questionID);
        return $this->render('form',['data' => $data,'value' =>$value]);
    }
    public function actionCoba(){
        $data = array() ;
        $num = count($this->questionID);
        for($i = 0 ; $i < $num ; $i++){
            if(isset($_POST['2'])){
                $data[$i] = $_POST['2'];
            }
        }
        return $this->render('coba',['data' => $data]);
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
