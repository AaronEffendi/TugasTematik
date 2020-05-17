<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'UMN SURVEY';
?>

<main>
    <!-- Visit Stuffs Start -->
    <div class="visit-area fix visite-padding">
        <div class="container">
            <!-- Section-tittle -->
            <div class="row d-flex justify-content-left">
                <div class="col-lg-6 pr-0">
                    <div class="section-tittle">
                        <h2>List Of Survey</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid p-0">
            <div class="row ">
                <?php foreach($data as $formlist) :?>
                    <div class="col-lg-3 col-md-4">
                        <div class="single-visited mb-30">
                            <div class="visited-img">
                                <img src="assets/img/visit/visit_1.jpg" alt="">
                            </div>
                            <div class="visited-cap">
                                <h3><a href="<?= Url::toRoute(['site/form', 'formlistid' => $formlist->FORMLISTID])?>"><?= $formlist->FORMLISTTITLE?></a></h3>
                                <!-- <p>Email Marketing</p> -->
                            </div>
                        </div>
                    </div> 
                <?php endforeach;?>
            </div>
        </div>
    </div>
    <!-- Visit Stuffs Start -->
</main>