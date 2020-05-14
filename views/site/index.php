<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use dosamigos\chartjs\ChartJs;
use yii\helpers\Url;
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
                <?php foreach($data as $formlist) :?>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-do text-center mb-30">
                            <div class="do-icon">
                                <span  class="flaticon-tasks"></span>
                            </div>
                            <div class="do-caption">
                                <!-- <h4><?= Html::encode($formlist['FORMLISTTITLE'])?></h4> -->
                                <h4><?= $formlist->FORMLISTTITLE?></h4>
                                <p>Hunky dory barney fanny around up the duff no biggie loo cup of tea jolly good ruddy say arse!</p>
                            </div>
                            <div class="do-btn">
                                <a href="<?= Url::toRoute('site/form')?>"><i class="ti-arrow-right"></i>FIIL FORM</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>

    <div id="graph">
        <div class="row mb-5">
            <div class="col-lg-6 col-md-6">
                <?= ChartJs::widget([
                    'type' => 'line',
                    'options' => [
                        'height' => 400,
                        'width' => 400
                    ],
                    'data' => [
                        'labels' => ["Kantin", "Kelas", "Lab", "Taman", "Lapangan", "Lecture Hall", "Perpustakaan"],
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
                ]);
                
                ?>
            </div>
            <div class="col-lg-6 col-md-6">
                <?= ChartJs::widget([
                    'type' => 'bar',
                    'options' => [
                        'height' => 400,
                        'width' => 400,
                        'scales' => [
                            'xAxes' => [
                                'stacked' => true
                            ],
                            'yAxes' => [
                                'stacked' => true,
                                'ticks' => [
                                    'beginAtZero' => true
                                ]
                            ]
                        ]
                    ],
                    'data' => [
                        'labels' => ["Kantin", "Kelas", "Lab", "Taman", "Lapangan", "Lecture Hall", "Perpustakaan"],
                        'datasets' => [
                            [
                                'label' => "My First dataset",
                                'fill' => 'false',
                                'backgroundColor' => [
                                    "rgba(255, 99, 132, 0.2)",
                                    "rgba(255, 159, 64, 0.2)",
                                    "rgba(255, 205, 86, 0.2)",
                                    "rgba(75, 192, 192, 0.2)",
                                    "rgba(54, 162, 235, 0.2)",
                                    "rgba(153, 102, 255, 0.2)",
                                    "rgba(201, 203, 207, 0.2)"
                                ],
                                'borderColor' => [
                                    "rgb(255, 99, 132)",
                                    "rgb(255, 159, 64)",
                                    "rgb(255, 205, 86)",
                                    "rgb(75, 192, 192)",
                                    "rgb(54, 162, 235)",
                                    "rgb(153, 102, 255)",
                                    "rgb(201, 203, 207)"
                                ],
                                'borderWidth' => 1,
                                'barPercentage' => 0.5,
                                'barThickness' => 6,
                                'maxBarThickness' => 8,
                                'minBarLength' => 2,
                                'data' => [50, 30, 70, 30, 60, 50, 20]
                            ]
                        ]
                    ]
                ]);
                ?>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-lg-6 col-md-6">
                <?= ChartJs::widget([
                    'type' => 'pie',
                    'options' => [
                        'height' => 400,
                        'width' => 400
                    ],
                    'data' => [
                        'labels' => ["Sering", "Kadan-Kadang", "Jarang"],
                        'datasets' => [
                            [
                                'label' => "My First dataset",
                                'backgroundColor' => [ 
                                    "rgb(255, 99, 132)",
                                    "rgb(54, 162, 235)",
                                    "rgb(255, 205, 86)"
                                ],
                                'data' => [300, 100, 50]
                            ]
                        ]
                    ]
                ]);
                
                ?>
            </div>
            <div class="col-lg-6 col-md-6">
                <?= ChartJs::widget([
                    'type' => 'horizontalBar',
                    'options' => [
                        'height' => 400,
                        'width' => 400,
                        'scales' => [
                            'xAxes' => [
                                'stacked' => true
                            ],
                            'yAxes' => [
                                'stacked' => true,
                                'ticks' => [
                                    'beginAtZero' => true
                                ]
                            ]
                        ]
                    ],
                    'data' => [
                        'labels' => ["Kantin", "Kelas", "Lab", "Taman", "Lapangan", "Lecture Hall", "Perpustakaan"],
                        'datasets' => [
                            [
                                'label' => "My First dataset",
                                'fill' => 'false',
                                'backgroundColor' => [
                                    "rgba(255, 99, 132, 0.2)",
                                    "rgba(255, 159, 64, 0.2)",
                                    "rgba(255, 205, 86, 0.2)",
                                    "rgba(75, 192, 192, 0.2)",
                                    "rgba(54, 162, 235, 0.2)",
                                    "rgba(153, 102, 255, 0.2)",
                                    "rgba(201, 203, 207, 0.2)"
                                ],
                                'borderColor' => [
                                    "rgb(255, 99, 132)",
                                    "rgb(255, 159, 64)",
                                    "rgb(255, 205, 86)",
                                    "rgb(75, 192, 192)",
                                    "rgb(54, 162, 235)",
                                    "rgb(153, 102, 255)",
                                    "rgb(201, 203, 207)"
                                ],
                                'borderWidth' => 1,
                                'barPercentage' => 0.5,
                                'barThickness' => 6,
                                'maxBarThickness' => 8,
                                'minBarLength' => 2,
                                'data' => [50, 30, 70, 30, 60, 50, 20]
                            ]
                        ]
                    ]
                ]);
                ?>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-lg-6 col-md-6">
                <?= ChartJs::widget([
                    'type' => 'doughnut',
                    'options' => [
                        'height' => 400,
                        'width' => 400
                    ],
                    'data' => [
                        'labels' => ["Sering", "Kadan-Kadang", "Jarang"],
                        'datasets' => [
                            [
                                'label' => "My First dataset",
                                'backgroundColor' => [ 
                                    "rgb(255, 99, 132)",
                                    "rgb(54, 162, 235)",
                                    "rgb(255, 205, 86)"
                                ],
                                'data' => [300, 100, 50]
                            ]
                        ]
                    ]
                ]);
                
                ?>
            </div>
        </div>
    </div>
</main>

<p><a class="btn btn-lg btn-success" href="http://localhost/Survey/web/index.php?r=gii">Hello GII!</a></p>
