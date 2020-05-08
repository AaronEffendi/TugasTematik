<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FormSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Result';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'FORMID',
            'FORMLISTID',
            'FORMDATESTART',
            'FORMDATEEND',

            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' =>  function($url,$model) {
                        return Html::a('<i class="fas fa-eye"></i>', $url."&isViewAnswer=1", [
                            'title' => Yii::t('app', 'view')
                        ]);
                    },
                 ]
            ],
        ],
    ]); ?>


</div>