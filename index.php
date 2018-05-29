<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\JsExpression;
use yii\helpers\Url;

?>

<div class="mevent-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
    ]); ?>


<!-- JS CODE -->
<?php
$JSEventClick = <<<EOF
function(calEvent, jsEvent, view) {
    alert('ประชุม : ' + calEvent.title +' วันที่ : ' + calEvent.start.format("DD/MM/YYYY") + ' ถึงวันที่ : ' + calEvent.end.format("DD/MM/YYYY") +' ' );
    $(this).css('border-color', 'red');
}
EOF;
    
?>
<!-- VIEW CALENDER -->
<?php
    echo yii2fullcalendar\yii2fullcalendar::widget(array(
        'events' => $events,
        'clientOptions' => [
            'eventClick' => new JsExpression($JSEventClick),
            'defaultDate' => date('Y-m-d')
            ],
    ));
?>


</div>
