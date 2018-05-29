# yii_calendar
#ติดตั้ง
1. เพิ่ม "philippfrenzel/yii2fullcalendar":"*", ใน composer.json
หรือ
1. รันคำสั่ง composer require philippfrenzel/yii2fullcalendar "*"

2.หน้า Controllers เพิ่มคำสั่งต่อไปนี้

    public function actionIndex()
    {
      ......
		$times = Mevent::find()->all();//select ข้อมูล
        $events = array();
        foreach ($times AS $time){//วนลูปเก็บค่าลง Array
          //Testing
          $event = new \yii2fullcalendar\models\Event();
          $event->id = $time->eve_id;//pramay key
          $event->title = $time->title;//name show
          $event->start = date('Y-m-d\Th:m:s\Z',strtotime($time->date_start));//datetime start
          $event->end = date('Y-m-d\Th:m:s\Z',strtotime($time->date_start));//datetime end
          $events[] = $event;
        }
        ....
        return $this->render('index', [
            ...
            'events' => $events,//ส่งค่า
        ]);
    }
    
    3.หน้า view เพิ่มคำสั่ง
    
    <?php
    echo yii2fullcalendar\yii2fullcalendar::widget(array(
      'events' => $events
    ));
    ?>
