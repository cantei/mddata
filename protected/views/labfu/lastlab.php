    
<?php

// 
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'a-grid-id',
    'dataProvider' => $dataProvider,
    'ajaxUpdate' => true, //false if you want to reload aentire page (useful if sorting has an effect to other widgets)
    'filter' => null, //if not exist search filters
    'columns' => array(
 
        array(
            'header' => 'รหัสหน่วยบริการ',
            'name' => 'HOSPCODE',
            //'htmlOptions' => array("width" => "50px", 'style' => 'text-align: right;'),
            //'value'=>'$data["MAIN_ID"]', //in the case we want something custom
        ),
        array(
            'header' => 'PID',
            'name' => 'PID',
            //'value'=>'$data["title"]', //in the case we want something custom
        ),
        array(
            'header' => 'วันที่ตรวจ',
            'name' => 'date_serv',
            //'htmlOptions' => array('style' => 'width:150px;',),      
            //'headerHtmlOptions'=>array('style'=>'height: 180px;'),
            
            
            //'value'=>'$data["title"]', //in the case we want something custom
        ),
        array(
            'header' => 'ชนิดแล็ป',
            'name' => 'labtest',
         //   'htmlOptions' => array("width" => "50px", 'style' => 'text-align: right;'),
      
        ),
        array(
            'header' => 'ค่ามาตรฐาน',
            'name' => 'std_value',
          //  'htmlOptions' => array("width" => "50px", 'style' => 'text-align: right;'),

        ),
        array(
            'header' => 'ผลแล็ป',
            'name' => 'labresult',
          //  'htmlOptions' => array("width" => "50px", 'style' => 'text-align: right;'),
 
        ),
      ),
));
?>
