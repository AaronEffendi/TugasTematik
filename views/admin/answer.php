<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use dosamigos\chartjs\ChartJs;


/* @var $this yii\web\View */
/* @var $searchModel app\models\FormListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Answers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-answer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= Html::a('<span class="btn-label">Download</span>', ['admin/excel', 'id' => $id], ['class' => 'btn btn-primary']) ?>

    <br/><br/>

    <div class="table-responsive" id="answer-table">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>E-Mail Address</th>
                    <?php foreach ($formQuestionNames as $indexFormQuestionName => $formQuestionName): ?>
                        <th><?= $formQuestionName ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($answers as $indexAnswer => $answer): ?>
                <tr>
                    <td><?= $indexAnswer ?></td>
                    <?php foreach ($answer as $indexAnswerDetail => $answerDetail): ?>
                        <?php foreach ($answerDetail as $indexAnswerDetailValue => $answerDetailValue): ?>
                            <td><?= $answerDetailValue ?></td>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<!-- <?php for ($i = 1; $i <= 2; $i++): ?>
<?= ChartJs::widget([
    'type' => 'bar',
    'options' => [
        'height' => 400,
        'width' => 400
    ],
    'data' => [
        'labels' => ["January", "February", "March", "April", "May", "June", "July"],
        'datasets' => [
            [
                'label' => "My First dataset",
                'backgroundColor' => "rgba(179,181,198,0.2)",
                'borderColor' => "rgba(179,181,198,1)",
                'pointBackgroundColor' => "rgba(179,181,198,1)",
                'pointBorderColor' => "#fff",
                'pointHoverBackgroundColor' => "#fff",
                'pointHoverBorderColor' => "rgba(179,181,198,1)",
                'data' => [65, 59, 90, 81, 56, 55, 40]
            ],
            [
                'label' => "My Second dataset",
                'backgroundColor' => "rgba(255,99,132,0.2)",
                'borderColor' => "rgba(255,99,132,1)",
                'pointBackgroundColor' => "rgba(255,99,132,1)",
                'pointBorderColor' => "#fff",
                'pointHoverBackgroundColor' => "#fff",
                'pointHoverBorderColor' => "rgba(255,99,132,1)",
                'data' => [28, 48, 40, 19, 96, 27, 100]
            ]
        ]
    ]
]);?>
<?php endfor; ?> -->
</div>