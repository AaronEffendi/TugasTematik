<?php

use dosamigos\chartjs\ChartJs;
use yii\helpers\ArrayHelper;
    
    $labels = array();
    $data = array();
    $bgColor = array();
    $bdColor = array();
    $datasets = array();

    $backgroundColor = array(
        "rgba(255,0,0,0.2)", "rgba(0,255,0,0.2)", "rgba(0,0,255,0.2)", 
        "rgba(255,255,0,0.2)", "rgba(0,255,255,0.2)", "rgba(255,0,255,0.2)", 
        "rgba(192,192,192,0.2)", "rgba(128,0,0,0.2)", "rgba(0,128,0,0.2)");
    $borderColor = array(
        "rgba(255,0,0,1)", "rgba(0,255,0,1)", "rgba(0,0,255,1)", 
        "rgba(255,255,0,1)", "rgba(0,255,255,1)", "rgba(255,0,255,1)", 
        "rgba(192,192,192,1)", "rgba(128,0,0,1)", "rgba(0,128,0,1)");
    $type = null;

    
    $keys = array_keys( $countArray ); 
    for($x = 0; $x < sizeof($keys); $x++ ) { 
        $labels[$x] = $keys[$x];
        $data[$x] = $countArray[$keys[$x]];
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
            'data' => $countArray[$keys[$x]]
        ];

        // echo "key: ". $keys[$x] . ", value: " 
        //         . $countArray[$keys[$x]] . "\n"; 
        // note:   $keys[$x] untuk generate optionValue (nilai untuk sumbu X)
        //         $countArray[$keys[$x]] untuk generate COUNT (jumlah orang yg pilih) optionValue tsb (nilai untuk sumbu Y)
    }

    if($formQuestion->FORMQUESTIONTYPEID == 3){ // Multiple choice - Pie
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
    elseif($formQuestion->FORMQUESTIONTYPEID == 4){ // Checkbox - Horizontal bar
        $type = 'horizontalBar';
    }
    elseif($formQuestion->FORMQUESTIONTYPEID == 7){ // Linear Scale - Vertical bar
        $type = 'bar';
    }
    else{ // Trend
        $type = 'line';
    }
            
    echo $type;

    echo "<pre>";
    echo "formQuestion <br>";
    print_r($formQuestion);
    echo "formQuestionOption <br>";
    print_r($formQuestionOption);
    echo "labels <br>";
    print_r($labels);
    echo "data <br>";
    print_r($data);
    echo "datasets <br>";
    print_r($datasets);
    echo "</pre>";
?>

<!-- Sumber:
    https://github.com/2amigos/yii2-chartjs-widget -->
<?=

    $chart = ChartJs::widget([
        'type' => $type,
        'options' => [
            'height' => 200,
            'width' => 200,
        ],
        'data' => [
            'labels' => $labels,
            'datasets' => $datasets,
            // 'labels' => ["January", "February", "March", "April", "May", "June", "July"],
            // 'datasets' => [
            //     [
            //         'label' => $labels,
            //         'backgroundColor' => "rgba(179,181,198,0.2)",
            //         'borderColor' => "rgba(179,181,198,1)",
            //         'pointBackgroundColor' => "rgba(179,181,198,1)",
            //         'pointBorderColor' => "#fff",
            //         'pointHoverBackgroundColor' => "#fff",
            //         'pointHoverBorderColor' => "rgba(179,181,198,1)",
            //         // 'data' => [65, 59, 90, 81, 56, 55, 40]
            //         'data' => $data
            //     ]
            // ]
        ]
    ]);
?>