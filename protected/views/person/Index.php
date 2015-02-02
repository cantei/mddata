
<h2 align="center"> ประชากรจากการสำรวจ</h2>
<h4 align="center"> เครือข่ายบริการอำเภอเมืองเพชรบูรณ์ ปี 2557</h4>

<div class='container'>

<?php 
    $this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>array(
      //  'ประชากร'=>array('/person'),
        'จำนวนประชากรจากการสำรวจ',
    ),
));
?>

<?php

// 
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'a-grid-id',
    'dataProvider' => $model,
    'ajaxUpdate' => true, //false if you want to reload aentire page (useful if sorting has an effect to other widgets)
    'filter' => null, //if not exist search filters
    'columns' => array(
 
        array(
            'header' => 'รหัสหน่วยบริการ',
            'name' => 'HOSPCODE',
            // 'htmlOptions' => array("width" => "50px", 'style' => 'text-align: right;'),
        ),
        array(
            'header' => 'หน่วยบริการ',
            'name' => 'HNAME',
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
</div>