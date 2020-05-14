<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
class Country extends Model{

    public function question(){
        $command = Yii::$app->db->createCommand("SELECT a.formQuestionID AS ID,a.formQuestionName AS Name,a.formDescription AS Description,a.formQuestionTypeID AS ID_type
        FROM formquestion a, formquestiontype b,formlist c
        WHERE a.formQuestionTypeID = b.formQuestionTypeID
        AND a.formListID = c.formListID
        ORDER BY a.formQuestionPosition asc")->queryAll();
        return $command;
    }
    public function checkbox(){
        $command = Yii::$app->db->createCommand("SELECT formQuestionID AS ID, formQuestionValue AS val  FROM formQuestionOption ORDER BY formQuestionOptionRowPosition")->queryAll();
        return $command;
    }
}
?>