<h4  align="center"> <?php echo "ทะเบียนผู้ป่วยเบาหวาน รพ.สต.".$HOSPCODE ;?> </h4>

<div class='container'>
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
            'name' => 'DM_DX',
        ),
         array(
            'header' => 'วันที่วินิจฉัยล่าสุด',
            'name' => 'LASTDx',
        ),
         array(
            'header' => 'โรค HT',
            'name' => 'DMWITHHT',
        ),
         array(
            'header' => 'โรคเรื้อรังอื่นๆ',
            'name' => 'DMWITOTHER',
        ),
          array(
            'header' => 'วันที่ตรวจ HbA1C',
            'name' => 'DATE_SERV',
        ),
         array(
            'header' => 'ผล HbA1C',
            'name' => 'LABRESULT',
        ),
    ),
    ));
?>
</div>