<div class='container'>
<div class="row">      
<?php 
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>array(
       // 'Sample post'=>array('post/view', 'id'=>12),
        'ความครอบคลุมการตรวจ HbA1C >>',
    ),
));
?>
 
</div>

<h3  align="center">จำนวนผู้ป่วยเบาหวานที่ขึ้นทะเบียนและได้รับการตรวจ HBA1C ปีงบประมาณ 2557 </h3>
<div class="row">
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
           // 'htmlOptions' => array("width" => "10%", 'style' => 'text-align: left;')
        ),
        array(
            'header' => 'หน่วยบริการ',
            'name' => 'HNAME',
        ),
        array(
            'header' => 'จำนวนผู้ป่วย DM ',
            'name' => 'nDM',
            //'htmlOptions' => array("width" => "10%", 'style' => 'text-align: right;'),
           
        ),
        array(
            'header' => 'ตรวจ HbA1C ทั้งหมด',
            'name' => 'TOTAL',
            //'htmlOptions' => array("width" => "10%", 'style' => 'text-align: right;'),
          
        ),
        array(
            'header' => 'ร้อยละที่ตรวจ HbA1C',
            'name' => 'percent1',
            'htmlOptions' => array("width" => "10%", 'style' => 'text-align: right;'),
                
        ),
        array(
            'header' => 'น้อยกว่า 7 ',
            'name' => 'LOWRISK',
            //'htmlOptions' => array("width" => "10%", 'style' => 'text-align: right;'),
   
            ),
        array(
            'header' => 'ร้อยละ',
            'name' => 'percent2',
            'htmlOptions' => array("width" => "10%", 'style' => 'text-align: right;'),
      
            ),
        array(
            'header' => 'มากกว่าหรือเท่ากับ 7  ',
            'name' => 'ATRISK',
           // 'htmlOptions' => array("width" => "10%", 'style' => 'text-align: right;'),
                
        ),
        array(
            'header' => 'ร้อยละ',
            'name' => 'percent3',
          //  'htmlOptions' => array("width" => "10%", 'style' => 'text-align: right;'),

//            }                  
        ),
    ),
    ));
?>
</div>
</div>

