
<h3 align="center"> ประชากรจากการสำรวจ</h3>
<h4 align="center">จำแนกรายรายหมู่บ้าน/ชุมชน</h4>

<div class='container'>

<?php 
    $this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>array(
       'ประชากรรายหน่วยบริการ'=>array('/person/index'),
        'ประชากรรายหมู่บ้าน/ชุมชน',
    ),
));
?>

<?php

// 
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'a-grid-id',
    'dataProvider' => $dataProvider,
    'ajaxUpdate' => true, //false if you want to reload aentire page (useful if sorting has an effect to other widgets)
    'filter' => null, //if not exist search filters
    'columns' => array(
 
//        array(
//            'header' => 'รหัสหน่วยบริการ',
//            'name' => 'HOSPCODE',
//            // 'htmlOptions' => array("width" => "50px", 'style' => 'text-align: right;'),
//        ),
//        array(
//            'header' => 'หน่วยบริการ',
//            'name' => 'hosname',
//        ),
        array(
            'header' => 'รหัสหมู่บ้าน/ชุมชน',
            'name' => 'villagecode',
        ),
        array(
            'header' => 'ชื่อหมู่บ้าน/ชุมชน',
            'name' => 'villagename',
        ),
        array(
            'header' => 'จำนวน ปชก. ชาย',
            'name' => 'male',
        ),
        array(
            'header' => 'จำนวน ปชก.หญิง',
            'name' => 'female',
        ),
        array(
            'header' => 'จำนวน ปชก.ทั้งหมด',
            'name' => 'total',
        ),
        array(
            'header' => 'จำนวนหลังเรือน',
            'name' => 'nhouse',
        ),
    ),
     'pager' => array(
        //'cssFile'=>Yii::app()->theme->baseUrl."/css/pagination.css",
        'maxButtonCount'=>4,
        'header' => 'เลือกหน้า',
        'prevPageLabel' => 'หน้าก่อน',
        'nextPageLabel' => 'หน้าถัดไป',
        'firstPageLabel'=>'First',
        'lastPageLabel'=>'Last',
        'footer'=>'End',
         ),
));
?>
    
    <div class="row"><?php echo "&nbsp; &nbsp;"."ข้อมูลที่แสดงนี้  ได้แก่ ข้อมูลประชากรที่มีสถานะการอยู่อาศัยเป็น (1) (อาศัยอยู่จริงและมีทะเบียนบ้านในเขตรับผิดชอบ)  และสถานะการอยู่อาศัยเป็น (3) (อาศัยอยู่จริงแต่ไม่มีทะเบียนบ้านอยู่ในเขตรับผิดชอบ)  ";?></div>
    
</div>