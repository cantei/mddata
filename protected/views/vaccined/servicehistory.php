<div class='container'>
<?php 
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>array(
       'ความครอบคลุมการได้รับวัคซีน'=>array('/vaccined/coverage'),
        'ประวัติการรับวัคซีน',
    ),
));
?>
<h4  align="center"> <?php echo "ประวัติการรับวัคซีน รพ.สต.".$HOSPCODE ;?> </h4>


<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'a-grid-id',
    'dataProvider' => $dataProvider,
    'ajaxUpdate' => true, //false if you want to reload aentire page (useful if sorting has an effect to other widgets)
    'filter' => null, //if not exist search filters
 
    'columns' => array(
 
        array(
            'header' => 'รหัสบุคคล',
            'name' => 'PID',
           //  'htmlOptions' => array("width" => "10%", 'style' => 'text-align: center;')
        ),

        array(
            'header' => 'ชื่อ',
            'name' => 'NAME',
        ),
        array(
            'header' => 'สกุล',
            'name' => 'LNAME',
        ),
        array(
            'header' => 'BCG',
            'name' => 'BCG',
             'htmlOptions' => array('style' => 'text-align: center;')
        ),
                array(
            'header' => 'HB1',
            'name' => 'HB1',
            'htmlOptions' => array('style' => 'text-align: center;')
        ),
                array(
            'header' => 'MMR',
            'name' => 'MMR',
            'htmlOptions' => array('style' => 'text-align: center;')
        ),
                array(
            'header' => 'DHBV3',
            'name' => 'DHBV3',
            'htmlOptions' => array('style' => 'text-align: center;')
        ),
                 array(
            'header' => 'OPV3',
            'name' => 'OPV3',
            'htmlOptions' => array('style' => 'text-align: center;')
        ),
//         array(
//            'header' => 'วันเกิด',
//            'name' => 'BIRTH',
//        ),

    ),
    ));
?>
</div>