<div class='container'>
<?php 
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>array(
       'ความครอบคลุมการได้รับวัคซีน จำแนกรายหมู่บ้าน'=>Yii::app()->createAbsoluteUrl('vaccined/coveragevillage',array('hospcode'=>$_GET['hospcode'])),
        'รายชื่อเด็กที่ยังไม่ได้รับวัคซีน',
    ),
));

// Yii::app()->createUrl('vaccined/coveragevillage',array('hospcode'=>$_GET['hospcode']));
// Yii::app()->createAbsoluteUrl('vaccined/coveragevillage',array('hospcode'=>$_GET['hospcode']));
// http://localhost/web_project/vaccined/coveragevillage&hospcode=22&code=12&codes=12s // รูปแบบ URL ปกติ ไม่ใช่ Yii Framework
// http://localhost/web_project/vaccined/coveragevillage/hospcode/22/code/12/codes/12s/ // รูปแบบ URL ของ Yii Framework (urlManager)
// echo $_GET['hospcode'];
// 22
// echo $_GET['code'];
// 12

?>
    <hr>
<h4  align="center"> <?php  echo "ประวัติการรับวัคซีน รพ.สต.".$hospcode ;?> </h4>


<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'a-grid-id',
    'dataProvider' => $dataProvider,
    'ajaxUpdate' => true, //false if you want to reload aentire page (useful if sorting has an effect to other widgets)
    'filter' => null, //if not exist search filters
 
    'columns' => array(

        array(
            'header' => 'PID',
            'name' => 'PID',
          
        ),
         array(
            'header' => 'ชื่อ',
            'name' => 'FNAME',
             
        ),
        array(
            'header' => 'สกุล',
            'name' => 'LNAME',
            
        ),
         array(
            'header' => 'สกุล',
            'name' => 'BIRTH',
             
        ),
          array(
            'header' => 'บ้านเลขที่',
            'name' => 'HOUSE',
          
        ),
          array(
            'header' => 'หมู่ที่',
            'name' => 'MOO',
            
        ),

         
       

    ),
    ));
?>
</div>
<?php 
// secho $sql;
?>