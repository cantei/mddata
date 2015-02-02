

<h4  align="center"> <?php echo "ทะเบียนผู้ป่วยเบาหวาน" ;?> </h4>

<div class="panel panel-primary">
    <?php 
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>array(
        'HbA1C'=>array('labfu/hba1c'),
        'DM Registration',
    ),
));
?>
    <hr>
    <div class="panel-heading"> <?php echo "รพ.สต.".$HOSPCODE ;?> </div>
<div class='panel-body'>
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
           //  'htmlOptions' => array("width" => "10%", 'style' => 'text-align: left;')
        ),
        array(
            'header' => 'หน่วยบริการ',
            'name' => 'CID',
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
            'header' => 'เพศ',
            'name' => 'SEX',
        ),
         array(
            'header' => 'วันเกิด',
            'name' => 'BIRTH',
        ),
         array(
            'header' => 'อายุ',
            'name' => 'AGE',
        ),
         array(
            'header' => 'ICD-10',
            'name' => 'DM_DX_ASC',
        ),
         array(
            'header' => 'วันที่วินิจฉัยล่าสุด',
            'name' => 'FIRSTDx',
        ),
         array(
            'header' => 'โรคความดันโลหิตสูง',
            'name' => 'DMWITHHT',
        ),
         array(
            'header' => 'โรคเรื้อรังอื่นๆ',
            'name' => 'DMWITOTHER',
           //  'htmlOptions' => array("width" => "10%", 'style' => 'text-align: left;')
        ),
        
    ),
    ));
?>
</div>
</div>