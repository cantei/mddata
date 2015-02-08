<h4  align="center"> จำนวนเด็กที่ได้รับวัคซีน JE ที่ระยะห่างระหว่างครั้งเร็วกว่าปกติ </h4>
<div class='container'>
<?php 
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>array(
       //'ผลการตรวจ HbA1C รายหน่วยบริการ'=>array('/labfu/hba1c'),
       ' ระยะห่างระหว่างการได้รับวัคซีน',
    ),
));
?>
<h4  align="center"> <?php // echo "ทะเบียนผู้ป่วยเบาหวาน รพ.สต.".$HOSPCODE ;?> </h4>


<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'a-grid-id',
    'dataProvider' => $dataProvider,
    'ajaxUpdate' => true, //false if you want to reload aentire page (useful if sorting has an effect to other widgets)
    'filter' => null, //if not exist search filters
 
    'columns' => array(

        array(
            'header' => 'รหัสหน่วยบริการ',
            'name' => 'HOSPCODE',
        ),
        array(
            'header' => 'หน่วยบริการ',
            'name' => 'hosname',
      
        ),
        array(
            'header' => 'ระยะห่าง JE1-JE2',
            'name' => 'lenje2',
        ),
        array(
            'header' => 'ระยะห่าง JE2-JE3',
            'name' => 'lenje3',
        ),
         
    ),
    ));
?>
</div>