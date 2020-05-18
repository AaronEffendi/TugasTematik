
<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use dosamigos\chartjs\ChartJs;
use practically\chartjs\Chart;
use yii\widgets\ActiveForm;
// use yii\bootstrap\ActiveForm;
?>

<div class="container">
    <div class="row d-flex justify-content-left py-5">
        <div class="col-lg-6 pr-0">
            <div class="section-tittle">
                <h2><?php echo $formTitle['FORMLISTTITLE']; ?></h2>
            </div>
        </div>
    </div>
    <?=  Html::beginForm(['coba'],'post');
        foreach($data as $row) :?>
            <?php if($row['ID_TYPE'] == 1 || $row['ID_TYPE'] == 2){?>
                <?php if($row['ID_TYPE'] == 1){?>
                    <div class="card mb-3 p-5">
                        <div class="card-body">
                            <h3 class="card-title"><?= Html::encode($row['NAME'])?></h3>
                            <p class="card-text"><?= Html::encode($row['DESCRIPTION'])?></p>
                            <div class="form-row">
                                <div class="col">
                                    <div class="md-form mt-0">
                                        <?= Html::input('text',Html::encode($row['ID']),'', ['class' => 'form-control'])?>
                                    </div>
                                </div>
                                <div class="col"></div>
                            </div>
                        </div>
                    </div>
                <?php } else if($row['ID_TYPE'] == 2){?>
                    <div class="card mb-3 p-5">
                        <div class="card-body">
                            <h3 class="card-title"><?= Html::encode($row['NAME'])?></h3>
                            <p class="card-text"><?= Html::encode($row['DESCRIPTION'])?></p>
                            <div class="md-form form-lg">
                                <?= Html::input('text',Html::encode($row['ID']),'', ['class' => 'form-control form-control-lg'])?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } else  {?>
                <div class="card mb-3 p-5">
                    <div class="card-body">
                        <h3 class="card-title"><?= Html::encode($row['NAME'])?></h3>
                        <p class="card-text"><?= Html::encode($row['DESCRIPTION'])?></p>
                        <?php foreach($value as $tmp) : ?>
                            <?php 
                                if($tmp['ID'] == $row['ID']){?>
                                    <!-- <div class="custom-control"> -->
                                        <input type="<?php 
                                        if($row['ID_TYPE'] == 3){
                                            echo 'radio';
                                        }else if($row['ID_TYPE'] == 4){
                                            echo 'checkbox';
                                        }
                                        ?>" 
                                        id="<?= Html::encode($row['ID'])?>" name="<?= Html::encode($row['ID'])?>">
                                        <label for=""><?= Html::encode($tmp['VAL'])?></label><br>
                                    <!-- </div> -->
                            <?php }?>
                        <?php endforeach;Html::endForm()?>
                    </div>
                </div>
            <?php } ?>
        <?php endforeach;?>
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </form>
</div>