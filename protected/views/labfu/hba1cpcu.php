<?php 
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>array(
        'Sample post'=>array('post/view', 'id'=>12),
        'Edit',
    ),
));
?>

<h3  align="center"> สรุปจำนวนผู้ป่วยเบาหวานที่ขึ้นทะเบียนและได้รับการตรวจ HBA1C ปีงบประมาณ 2557 </h3>

<div class='container'>
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
            'htmlOptions' => array("width" => "10%", 'style' => 'text-align: left;')
        ),
        array(
            'header' => 'หน่วยบริการ',
            'name' => 'HNAME',
        ),
        array(
            'header' => 'จำนวนผู้ป่วย DM ',
            'name' => 'nDM',
            'htmlOptions' => array("width" => "10%", 'style' => 'text-align: right;'),
            'value' => function($data) {
                ?>
                                    <a href="<?= Yii::app()->createUrl('labfu/regdm'
                        , array('hospcode' => $data['HOSPCODE']))
                ?>"
                                            ><?= $data['nDM'] ?>
                                    </a>
            <?php
            }
        ),
        array(
            'header' => 'ตรวจ HbA1C ทั้งหมด',
            'name' => 'TOTAL',
            'htmlOptions' => array("width" => "10%", 'style' => 'text-align: right;'),
            'value' => function($data) {
                ?>
                                    <a href="<?= Yii::app()->createUrl('labfu/detail'
                        , array('hospcode' => $data['HOSPCODE']))
                ?>"
                                            ><?= $data['TOTAL'] ?>
                                    </a>
            <?php
            }            
        ),
        array(
            'header' => 'ร้อยละที่ตรวจ HbA1C',
            'name' => 'percent1',
            'htmlOptions' => array("width" => "10%", 'style' => 'text-align: right;'),
                
        ),
        array(
            'header' => 'น้อยกว่า 7 ',
            'name' => 'LOWRISK',
            'htmlOptions' => array("width" => "10%", 'style' => 'text-align: right;'),
   
            ),
        array(
            'header' => 'ร้อยละ',
            'name' => 'percent2',
            'htmlOptions' => array("width" => "10%", 'style' => 'text-align: right;'),
      
            ),
        array(
            'header' => 'มากกว่าหรือเท่ากับ 7  ',
            'name' => 'ATRISK',
            'htmlOptions' => array("width" => "10%", 'style' => 'text-align: right;'),
                
        ),
        array(
            'header' => 'ร้อยละ',
            'name' => 'percent3',
            'htmlOptions' => array("width" => "10%", 'style' => 'text-align: right;'),

//            }                  
        ),
    ),
    ));
?>
</div>
<?php 
// echo $sql;
?>