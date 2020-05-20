<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use dosamigos\chartjs\ChartJs;
use yii\helpers\Url;
use kv4nt\owlcarousel\OwlCarouselWidget;
use app\models\FormQuestion;
use app\models\FormList;

$this->title = 'UMN SURVEY';
?>
<!-- Preloader Start -->
<!-- <div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="assets/img/logo/logo.png" alt="">
            </div>
        </div>
    </div>
</div> -->
    <!-- Preloader Start -->

<main>
    <!-- Slider Area Start-->
    <div class="slider-area ">
        <div class="slider-active">
            <div class="single-slider slider-height d-flex align-items-center" data-background="assets/img/hero/h1_hero.png">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-7 col-md-9 ">
                            <div class="hero__caption">
                                <h1 data-animation="fadeInLeft" data-delay=".4s">Satisfaction<br> Survey</h1>
                                <p data-animation="fadeInLeft" data-delay=".6s">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravi.</p>
                                <!-- Hero-btn -->
                                <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s">
                                    <a href="index.html#recentform" class="btn hero-btn">MORE INFO</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="hero__img d-none d-lg-block" data-animation="fadeInRight" data-delay="1s">
                                <img src="assets/img/hero/hero_right.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider slider-height d-flex align-items-center" data-background="assets/img/hero/h1_hero.png">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-7 col-md-9 ">
                            <div class="hero__caption">
                                <h1 data-animation="fadeInLeft" data-delay=".4s">Facilities Survey</h1>
                                <p data-animation="fadeInLeft" data-delay=".6s">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravi.</p>
                                <!-- Hero-btn -->
                                <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s">
                                    <a href="index.html#recentform" class="btn hero-btn">MORE INFO</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="hero__img d-none d-lg-block" data-animation="fadeInRight" data-delay="1s">
                                <img src="assets/img/hero/hero_right.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Slider Area End-->
    
    <div class="what-we-do we-padding" id="recentform">
        <div class="container">
            <div class="row">
                <?php
                    OwlCarouselWidget::begin([
                        'container' => 'div',
                        'assetType' => OwlCarouselWidget::ASSET_TYPE_CDN,
                        'containerOptions' => [
                            'id' => 'container-id',
                            'class' => 'container-class owl-theme'
                        ],
                        'pluginOptions'    => [
                            'autoplay'          => true,
                            'autoplayTimeout'   => 3000,
                            'items'             => 3,
                            'loop'              => true,
                            'itemsDesktop'      => [1199, 3],
                            'itemsDesktopSmall' => [979, 3]
                        ]
                    ]);
                    foreach($data as $formlist) :?>
                        <div class="item-class">
                            <div class="single-do text-center mb-30">
                                <div class="do-icon">
                                    <span  class="flaticon-tasks"></span>
                                </div>
                                <div class="do-caption">
                                    <h4><?= $formlist->FORMLISTTITLE?></h4>
                                    <p>Hunky dory barney fanny around up the duff no biggie loo cup of tea jolly good ruddy say arse!</p>
                                </div>
                                <div class="do-btn">
                                    <a href="<?= Url::toRoute(['site/form', 'formlistID' => $formlist->FORMLISTID])?>"><i class="ti-arrow-right"></i>FIIL FORM</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                <?php OwlCarouselWidget::end(); ?>
            </div>
        </div>
    </div>



    <div id="graph">
        <?php
            $backgroundColor = array(
                "rgba(255,0,0,0.2)", "rgba(0,255,0,0.2)", "rgba(0,0,255,0.2)", 
                "rgba(255,255,0,0.2)", "rgba(0,255,255,0.2)", "rgba(255,0,255,0.2)", 
                "rgba(192,192,192,0.2)", "rgba(128,0,0,0.2)", "rgba(0,128,0,0.2)");
            $borderColor = array(
                "rgba(255,0,0,1)", "rgba(0,255,0,1)", "rgba(0,0,255,1)", 
                "rgba(255,255,0,1)", "rgba(0,255,255,1)", "rgba(255,0,255,1)", 
                "rgba(192,192,192,1)", "rgba(128,0,0,1)", "rgba(0,128,0,1)");
            $type = null;
            
            foreach($graph as $formIDs => $formQuestionIDs){
                foreach($formQuestionIDs as $formQuestionID => $formOptionValues){
                    $labels = array();
                    $data = array();
                    $bgColor = array();
                    $bdColor = array();
                    $datasets = array();
                    $clientOptions = array();

                    $keys = array_keys( $formOptionValues );
                    for($x = 0; $x < sizeof($keys); $x++ ) { 
                        $labels[$x] = $keys[$x];
                        $data[$x] = $formOptionValues[$keys[$x]];
                        $bgColor[$x] = $backgroundColor[$x];
                        $bdColor[$x] = $borderColor[$x];
                
                        $datasets[$x] = 
                        [
                            'label' => $keys[$x],
                            'backgroundColor' => $backgroundColor[$x],
                            'borderColor' => $borderColor[$x],
                            'pointBackgroundColor' => "rgba(179,181,198,1)",
                            'pointBorderColor' => "#fff",
                            'pointHoverBackgroundColor' => "#fff",
                            'pointHoverBorderColor' => "rgba(179,181,198,1)",
                            'data' => $formOptionValues[$keys[$x]]
                        ];
                    }
                    
                    $formQuestion = FormQuestion::find()->select(['FORMQUESTIONTYPEID', 'FORMQUESTIONNAME'])->where(['FORMQUESTIONID' => $formQuestionID])->one();
                    $formTypeId = $formQuestion['FORMQUESTIONTYPEID'];
                    $formQuestionName = $formQuestion['FORMQUESTIONNAME'];
                    $formTitle = FormList::find()->select(['FORMLISTTITLE'])
                        ->innerJoin('FORM', 'FORM.FORMLISTID = FORMLIST.FORMLISTID')
                        ->where(['FORM.FORMID' => $formIDs])->one()['FORMLISTTITLE'];

                    if($formTypeId == 3 || $formTypeId == 5){ // Multiple choice - Pie
                        $type = 'pie';
                        $datasets = null;
                        $datasets[0] = [
                            'label' => $labels,
                            'backgroundColor' => $bgColor,
                            'borderColor' => $bdColor,
                            'pointBackgroundColor' => "rgba(179,181,198,1)",
                            'pointBorderColor' => "#fff",
                            'pointHoverBackgroundColor' => "#fff",
                            'pointHoverBorderColor' => "rgba(179,181,198,1)",
                            'data' => $data
                        ];
                    }
                    elseif($formTypeId == 4){ // Checkbox - Horizontal bar
                        $type = 'horizontalBar';
                        $datasets = null;
                        $datasets[0] = [
                            'label' => $formQuestionName,
                            'backgroundColor' => $bgColor,
                            'borderColor' => $bdColor,
                            'pointBackgroundColor' => "rgba(179,181,198,1)",
                            'pointBorderColor' => "#fff",
                            'pointHoverBackgroundColor' => "#fff",
                            'pointHoverBorderColor' => "rgba(179,181,198,1)",
                            'data' => $data
                        ];
                        $clientOptions = [
                            'scales' => [
                                'xAxes' => [[
                                    'ticks' => [
                                        'beginAtZero' => 'true', 
                                        # Sumber: 
                                        # https://github.com/2amigos/yii2-chartjs-widget/issues/22
                                        # https://github.com/2amigos/yii2-chartjs-widget/issues/32
                                    ]
                                ]],
                            ],
                        ];
                    }
                    elseif($formTypeId == 7){ // Linear Scale - Vertical bar
                        $type = 'bar';
                        $datasets = null;
                        $datasets[0] = [
                            'label' => $formQuestionName,
                            'backgroundColor' => $bgColor,
                            'borderColor' => $bdColor,
                            'pointBackgroundColor' => "rgba(179,181,198,1)",
                            'pointBorderColor' => "#fff",
                            'pointHoverBackgroundColor' => "#fff",
                            'pointHoverBorderColor' => "rgba(179,181,198,1)",
                            'data' => $data
                        ];
                        $clientOptions = [
                            'scales' => [
                                'yAxes' => [[
                                    'ticks' => [
                                        'beginAtZero' => 'true', 
                                        # Sumber: 
                                        # https://github.com/2amigos/yii2-chartjs-widget/issues/22
                                        # https://github.com/2amigos/yii2-chartjs-widget/issues/32
                                    ]
                                ]],
                            ],
                        ];
                    }
                    else{ // Trend
                        $type = 'line';
                    }

                    echo "<h1> $formTitle <h1>";
                    echo "<h3> $formQuestionName </h3><br>";
                    echo $chart = ChartJs::widget([
                        'type' => $type,
                        // 'options' => [
                        //     'height' => 200,
                        //     'width' => 200,
                        // ],
                        'data' => [
                            'labels' => $labels,
                            'datasets' => $datasets,
                        ],
                        'clientOptions' =>  $clientOptions,
                    ]);
                    echo "<br><br><br><br>";
                }
            }
        ?>
    </div>
</main>

<p><a class="btn btn-lg btn-success" href="http://localhost/Survey/web/index.php?r=gii">Hello GII!</a></p>
