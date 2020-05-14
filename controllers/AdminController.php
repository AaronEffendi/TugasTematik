<?php

namespace app\controllers;

use Yii;
use app\models\FormList;
use app\models\FormListSearch;
use app\models\Form;
use app\models\FormSearch;
use app\models\FormQuestion;
use app\models\Model;
use app\models\FormAnswer;
use app\models\FormAnswerSearch;
use app\models\FormAnswerDetail;
use app\models\FormQuestionOption;
use app\models\SendFrom;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;

/**
 * AdminController implements the CRUD actions for FormList model.
 */
class AdminController extends Controller
{
    public $layout = 'admin';

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all FormList models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FormListSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FormList model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'modelFormList' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new FormList model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelFormList = new FormList;
        $modelFormList->FORMLISTDATE = date('d-M-y');
        $modelsFormQuestion = [new FormQuestion];
        $modelsFormQuestionOption = [[new FormQuestionOption]];
        
        if ($modelFormList->load(Yii::$app->request->post())) {
            $modelFormList->FORMLISTTOTALSECTION = 0;
            $modelFormList->FORMLISTTOTALQUESTION = 0;

            $modelsFormQuestion = Model::createMultiple(FormQuestion::classname());
            Model::loadMultiple($modelsFormQuestion, Yii::$app->request->post());
            
            $valid = $modelFormList->validate();
            $valid = Model::validateMultiple($modelsFormQuestion) && $valid;

            if (isset($_POST['FormQuestionOption'][0][0])) {
                foreach ($_POST['FormQuestionOption'] as $indexFormList => $formQuestionOptions) {
                    $modelFormList->FORMLISTTOTALQUESTION += 1;
                    $modelsFormQuestion[$indexFormList]->FORMQUESTIONPOSITION = $indexFormList;
                    $modelsFormQuestion[$indexFormList]->FORMQUESTIONSECTION = 0;
                    $modelsFormQuestion[$indexFormList]->FORMIMAGE = UploadedFile::getInstance($modelsFormQuestion[$indexFormList], "[{$indexFormList}]FORMIMAGE");
                    $modelsFormQuestion[$indexFormList]->upload();

                    foreach ($formQuestionOptions as $indexFormQuestionOption => $formQuestionOption) {
                        $data['FormQuestionOption'] = $formQuestionOption;
                        $modelFormQuestionOption = new FormQuestionOption;

                        $modelFormQuestionOption->load($data);
                        $modelFormQuestionOption->FORMQUESTIONOPTIONROWPOSITION = $indexFormQuestionOption;

                        $modelsFormQuestionOption[$indexFormList][$indexFormQuestionOption] = $modelFormQuestionOption;
                        $valid = $modelFormQuestionOption->validate();
                    }
                }
            }

            if ($valid) {
                $transaction = Yii::$app->db->beginTransaction();
                $modelFormList->save(false);
                $transaction->commit();
                $modelFormList->FORMLISTID = FormList::find()->select('FORMLISTID')->max('FORMLISTID');
                
                try {
                    if ($flag = $modelFormList->save(false)) {
                        foreach ($modelsFormQuestion as $indexFormList => $modelFormQuestion) {
                            if ($flag === false) {
                                break;
                            }
                            
                            $transaction = Yii::$app->db->beginTransaction();
                            $modelFormQuestion->FORMLISTID = $modelFormList->FORMLISTID;
                            $modelFormQuestion->save(false);
                            if (!($flag = $modelFormQuestion->save(false))) {
                                break;
                            }
                            $transaction->commit();
                            $modelFormQuestion->FORMQUESTIONID = FormQuestion::find()->select('FORMQUESTIONID')->max('FORMQUESTIONID');

                            if (isset($modelsFormQuestionOption[$indexFormList]) && is_array($modelsFormQuestionOption[$indexFormList])) {
                                foreach ($modelsFormQuestionOption[$indexFormList] as $indexFormQuestionOption => $modelFormQuestionOption) {
                                    $transaction = Yii::$app->db->beginTransaction();
                                    $modelFormQuestionOption->FORMQUESTIONID = $modelFormQuestion->FORMQUESTIONID;
                                    $modelFormQuestionOption->save(false);
                                    if (!($flag = $modelFormQuestionOption->save(false))) {
                                        break;
                                    }
                                    $transaction->commit();
                                }
                            }
                        }
                    }

                    if ($flag) {
                        return $this->redirect(['view', 'id' => $modelFormList->FORMLISTID]);
                    } else {
                        $transaction->rollBack();
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }

            return; // debug
        }

        return $this->render('create', [
            'modelFormList' => $modelFormList,
            'modelsFormQuestion' => (empty($modelsFormQuestion)) ? [new FormQuestion] : $modelsFormQuestion,
            'modelsFormQuestionOption' => (empty($modelsFormQuestionOption)) ? [[new FormQuestionOption]] : $modelsFormQuestionOption,
        ]);
    }

    /**
     * Updates an existing FormList model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $modelFormList = $this->findModel($id);
        $modelsFormQuestion = FormQuestion::find()->where(['FORMLISTID' => $modelFormList->FORMLISTID])->orderBy(['FORMQUESTIONPOSITION' => SORT_ASC])->all();
        $modelsFormQuestionOption = [];
        $oldFormQuestionOption = [];
        
        if (!empty($modelsFormQuestion)) {
            foreach ($modelsFormQuestion as $indexFormList => $modelFormQuestion) {
                $formQuestionOptions = FormQuestionOption::find()->where(['FORMQUESTIONID' => $modelFormQuestion->FORMQUESTIONID])->orderBy(['FORMQUESTIONOPTIONROWPOSITION' => SORT_ASC])->all();
                $modelsFormQuestionOption[$indexFormList] = $formQuestionOptions;
                $oldFormQuestionOption = ArrayHelper::merge(ArrayHelper::index($formQuestionOptions, 'FORMQUESTIONOPTIONID'), $oldFormQuestionOption);
            }
        }
        

        if ($modelFormList->load(Yii::$app->request->post())) {
            $modelFormList->FORMLISTDATE = date('d-M-y');
            $modelFormList->FORMLISTTOTALSECTION = 0;
            $modelFormList->FORMLISTTOTALQUESTION = 0;
            $modelsFormQuestionOption = [];
            $oldFormQuestionID = ArrayHelper::map($modelsFormQuestion, 'FORMQUESTIONID', 'FORMQUESTIONID');

            $modelsFormQuestion = Model::createMultiple(FormQuestion::classname(), $modelsFormQuestion);
            Model::loadMultiple($modelsFormQuestion, Yii::$app->request->post());
            $deletedFormQuestionID = array_diff($oldFormQuestionID, array_filter(ArrayHelper::map($modelsFormQuestion, 'FORMQUESTIONID', 'FORMQUESTIONID')));

            $valid = $modelFormList->validate();
            $valid = Model::validateMultiple($modelsFormQuestion) && $valid;

            $formQuestionOptionID = [];
            if (isset($_POST['FormQuestionOption'][0][0])) {
                foreach ($_POST['FormQuestionOption'] as $indexFormList => $formQuestionOptions) {
                    $formQuestionOptionID = ArrayHelper::merge($formQuestionOptionID, array_filter(ArrayHelper::getColumn($formQuestionOptions, 'FORMQUESTIONOPTIONID')));
                    $modelFormList->FORMLISTTOTALQUESTION += 1;
                    $modelsFormQuestion[$indexFormList]->FORMQUESTIONPOSITION = $indexFormList;
                    $modelsFormQuestion[$indexFormList]->FORMQUESTIONSECTION = 0;

                    foreach ($formQuestionOptions as $indexFormQuestionOption => $formQuestionOption) {
                        $data['FormQuestionOption'] = $formQuestionOption;
                        $modelFormQuestionOption = (isset($formQuestionOption['FORMQUESTIONOPTIONID']) && isset($oldFormQuestionOption[$formQuestionOption['FORMQUESTIONOPTIONID']])) ? $oldFormQuestionOption[$formQuestionOption['FORMQUESTIONOPTIONID']] : new FormQuestionOption;
                        
                        $modelFormQuestionOption->load($data);
                        $modelFormQuestionOption->FORMQUESTIONOPTIONROWPOSITION = $indexFormQuestionOption;
                        
                        $modelsFormQuestionOption[$indexFormList][$indexFormQuestionOption] = $modelFormQuestionOption;
                        $valid = $modelFormQuestionOption->validate();
                    }
                }
            }

            $oldFormQuestionOptionID = ArrayHelper::getColumn($oldFormQuestionOption, 'FORMQUESTIONOPTIONID');
            $deletedFormQuestionOptionID = array_diff($oldFormQuestionOptionID, $formQuestionOptionID);

            if ($valid) {
                $transaction = Yii::$app->db->beginTransaction();
                $modelFormList->save(false);
                $transaction->commit();

                $transaction = Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelFormList->save(false)) {
                        if (! empty($deletedFormQuestionOptionID)) {
                            FormQuestionOption::deleteAll(['FORMQUESTIONOPTIONID' => $deletedFormQuestionOptionID]);
                        }

                        if (! empty($deletedFormQuestionID)) {
                            FormQuestion::deleteAll(['FORMQUESTIONID' => $deletedFormQuestionID]);
                        }

                        foreach ($modelsFormQuestion as $indexFormList => $modelFormQuestion) {
                            if ($flag === false) {
                                break;
                            }

                            $transaction = Yii::$app->db->beginTransaction();
                            if ($modelFormQuestion->FORMQUESTIONID == NULL) {
                                $modelFormQuestion->FORMQUESTIONID = FormQuestion::find()->select('FORMQUESTIONID')->max('FORMQUESTIONID') + 1;
                            }
                            $modelFormQuestion->FORMLISTID = $modelFormList->FORMLISTID;
                            $modelFormQuestion->save(false);
                            if (!($flag = $modelFormQuestion->save(false))) {
                                break;
                            }
                            $transaction->commit();

                            if (isset($modelsFormQuestionOption[$indexFormList]) && is_array($modelsFormQuestionOption[$indexFormList])) {
                                foreach ($modelsFormQuestionOption[$indexFormList] as $indexFormQuestionOption => $modelFormQuestionOption) {
                                    $transaction = Yii::$app->db->beginTransaction();
                                    if ($modelFormQuestionOption->FORMQUESTIONOPTIONID == NULL) {
                                        $modelFormQuestionOption->FORMQUESTIONOPTIONID = FormQuestionOption::find()->select('FORMQUESTIONOPTIONID')->max('FORMQUESTIONOPTIONID') + 1;
                                    }
                                    $modelFormQuestionOption->FORMQUESTIONID = $modelFormQuestion->FORMQUESTIONID;
                                    $modelFormQuestionOption->save(false);
                                    if (!($flag = $modelFormQuestionOption->save(false))) {
                                        break;
                                    }
                                    $transaction->commit();
                                }
                            }
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelFormList->FORMLISTID]);
                    } else {
                        $transaction->rollBack();
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }

            return; // debug
        }

        return $this->render('update', [
            'modelFormList' => $modelFormList,
            'modelsFormQuestion' => (empty($modelsFormQuestion)) ? [new FormQuestion] : $modelsFormQuestion,
            'modelsFormQuestionOption' => (empty($modelsFormQuestionOption)) ? [[new FormQuestionOption]] : $modelsFormQuestionOption,
        ]);
    }


    /**
     * Deletes an existing FormList model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FormList model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return FormList the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FormList::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionResult()
    {
        // $searchModel = new FormSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModel = new Form();
        $dataProvider = new ActiveDataProvider([
            'query' => $searchModel::find(),
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'FORMID' => SORT_ASC, 
                ]
            ],
        ]);

        return $this->render('result', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAnswer($id)
    {
        $searchModel = new FormAnswerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $rows = (new \yii\db\Query())
            ->select(['FORMANSWER.USEREMAIL', 'FORMQUESTION.FORMQUESTIONNAME', 'FORMANSWERDETAIL.FORMANSWERDETAILVALUE'])
            ->from('FORMANSWER')
            ->innerJoin('FORMANSWERDETAIL', 'FORMANSWERDETAIL.FORMANSWERID = FORMANSWER.FORMANSWERID')
            ->innerJoin('FORMQUESTION', 'FORMANSWERDETAIL.FORMQUESTIONID = FORMQUESTION.FORMQUESTIONID')
            ->where(['FORMANSWER.FORMID' => $id])
            ->all();

        $answers = array();
        $formQuestionNames = array();
        foreach($rows as $row){
            if(empty($answers["$row[USEREMAIL]"])) {
                $answers["$row[USEREMAIL]"] = array();
                $answers["$row[USEREMAIL]"]["FORMQUESTIONNAME"] = array();
                $answers["$row[USEREMAIL]"]["FORMANSWERDETAILVALUE"] = array();
            } 
            array_push($formQuestionNames, $row["FORMQUESTIONNAME"]);
            array_push($answers["$row[USEREMAIL]"]["FORMANSWERDETAILVALUE"], $row["FORMANSWERDETAILVALUE"]);
        }

        $formQuestionNames = array_unique($formQuestionNames);

        return $this->render('answer', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'answers' => $answers,
            'formQuestionNames' => $formQuestionNames,
            'id' => $id,
        ]);
    }

    public function actionExcel($id) {
        $searchModel = new FormAnswerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $rows = (new \yii\db\Query())
            ->select(['FORMANSWER.USEREMAIL', 'FORMQUESTION.FORMQUESTIONNAME', 'FORMANSWERDETAIL.FORMANSWERDETAILVALUE'])
            ->from('FORMANSWER')
            ->innerJoin('FORMANSWERDETAIL', 'FORMANSWERDETAIL.FORMANSWERID = FORMANSWER.FORMANSWERID')
            ->innerJoin('FORMQUESTION', 'FORMANSWERDETAIL.FORMQUESTIONID = FORMQUESTION.FORMQUESTIONID')
            ->where(['FORMANSWER.FORMID' => $id])
            ->all();

        $answers = array();
        $formQuestionNames = array();
        foreach($rows as $row){
            if(empty($answers["$row[USEREMAIL]"])) {
                $answers["$row[USEREMAIL]"] = array();
                $answers["$row[USEREMAIL]"]["FORMQUESTIONNAME"] = array();
                $answers["$row[USEREMAIL]"]["FORMANSWERDETAILVALUE"] = array();
            } 
            array_push($formQuestionNames, $row["FORMQUESTIONNAME"]);
            array_push($answers["$row[USEREMAIL]"]["FORMANSWERDETAILVALUE"], $row["FORMANSWERDETAILVALUE"]);
        }

        $formQuestionNames = array_unique($formQuestionNames);

        return $this->renderPartial('excel', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'answers' => $answers,
            'formQuestionNames' => $formQuestionNames,
        ]);
    }
    
    /**
     * Lists all FormList models.
     * @return mixed
     */
    public function actionSpread()
    {
        $searchModel = new FormListSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('spread', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays send page.
     *
     * @return Response|string
     */    
    public function actionSend($id)
    {
        $model = new SendFrom();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('send', [
            'model' => $model,
            'id' => $id,
        ]);
    }

    // Menampilkan Chart
    public function actionChart($formQuestionID){
        // 49 & 51
        $formQuestionID = 50; // Yang didapat pertama kali ketika admin pencet pertanyaan buat dijadii grafik -> dummy data
        $formQuestion = FormQuestion::findOne($formQuestionID); // Untuk dapetin keseluruhan informasi formQuestion
        
        $formQuestionOption = FormQuestionOption::find()
                                ->where(['FORMQUESTIONID' => $formQuestionID])->all(); // Untuk dapeti semua formQuestionOption

        // echo "<pre>";
        // print_r($formQuestionOption) ;
        // echo "</pre>";
        
        // $countArray untuk bikin associative array buat nampung $formOption->FORMQUESTIONVALUE = count
        // Misal: 
        //     Pilihan1 => 2,
        //     Pilihan2 => 3,
        $countArray = []; 
        foreach($formQuestionOption as $formOption){
            $countArray["$formOption->FORMQUESTIONVALUE"] = 0; // Awalnya diinisialisasi 0 semua
        }

        $keys = array_keys( $countArray ); 
        for($x = 0; $x < sizeof($keys); $x++ ) { 
            // Masukin JUMLAH orang yang ngejawab pilihan A ke array A, dst.
            $countArray[$keys[$x]] = FormAnswerDetail::find()
                        ->where(['FORMANSWERDETAILVALUE' => $keys[$x]])
                        ->count();
        } 


        return $this->render('chart', [
            'formQuestion' => $formQuestion, // Untuk dapetin keseluruhan informasi formQuestion
            'countArray' => $countArray, // Associative array yang digunakan buat menampung nilai untuk sumbu X => nilai untuk sumbu Y
            'formQuestionOption' => $formQuestionOption,
            // Untuk nentui bentuk grafik panggil: $formQuestion->FORMQUESTIONTYPEID
            // Untuk Legend panggil: $formQuestion->FORMQUESTIONNAME

            // Kalau mau akses associative array di view, pake (perlu didalam php):
            // $keys = array_keys( $countArray ); 
            // for($x = 0; $x < sizeof($keys); $x++ ) { 
            //     echo "key: ". $keys[$x] . ", value: " 
            //             . $countArray[$keys[$x]] . "\n"; 
            //     // note:   $keys[$x] untuk generate optionValue (nilai untuk sumbu X)
            //     //         $countArray[$keys[$x]] untuk generate COUNT (jumlah orang yg pilih) optionValue tsb (nilai untuk sumbu Y)
            // } 
        ]);
    }
}
