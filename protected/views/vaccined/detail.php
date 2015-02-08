<div class='container'>
<?php 
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>array(
        'ความครอบคลุมการได้รับวัคซีน'=>array('vaccined/coverage', 'id'=>12),
        '#',
    ),
));
?>

<h3  align="center"> จำนวนเป็นหมายที่ได้รับและไม่ได้รับวัคซีน </h3>

<div class='container'>
<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'a-grid-id',
    'dataProvider' => $dataProvider,
    'ajaxUpdate' => true, //false if you want to reload aentire page (useful if sorting has an effect to other widgets)
    'filter' => null, //if not exist search filters
 
    'columns' => array(
        array(
            'header' => 'รหัสหมู่บ้าน',
            'name' => 'VILLAGEID',
            'htmlOptions' => array("width" => "10%", 'style' => 'text-align: left;')
        ),
        array(
            'header' => 'หมู่บ้าน',
            'name' => 'villagename',
        ),
        array(
            'header' => 'จำนวนเป้าหมาย',
            'name' => 'target',
        ),
        array(
            'header' => 'จำนวนที่ได้รับวัคซีน',
            'name' => 'get',
        ),
        array(
            'header' => 'จำนวนที่ไม่ได้รับวัคซีน',
            'name' => 'miss',
        ),
    ),
    ));
?>
</div>
<?php 
// echo $sql;
?>
</div>