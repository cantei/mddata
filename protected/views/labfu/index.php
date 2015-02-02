<head>
<meta charset="UTF-8">
<meta name="description" content="Free Web tutorials">
<meta name="keywords" content="HTML,CSS,XML,JavaScript">
<meta name="author" content="Hege Refsnes">
</head>

<form method='post' action='<?=Yii::app()->createUrl('labfu/pdf')?>'>
    <input type='text' name='pid'>
    <button type='submit'>ค้นหา</button>
</form>
    
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
            'htmlOptions' => array("width" => "50px", 'style' => 'text-align: right;'),
            //'value'=>'$data["MAIN_ID"]', //in the case we want something custom
        ),
        array(
            'header' => 'PID',
            'name' => 'PID',
            //'value'=>'$data["title"]', //in the case we want something custom
        ),
        array(
            'header' => 'วันที่ตรวจ',
            'name' => 'DATE_SERV',
            'htmlOptions' => array('style' => 'width:150px;',),      
            //'headerHtmlOptions'=>array('style'=>'height: 180px;'),
            
            
            //'value'=>'$data["title"]', //in the case we want something custom
        ),
        array(
            'header' => 'ตรวจน้ำตาลในเลือด1',
            'name' => 'lab01',
            'htmlOptions' => array("width" => "50px", 'style' => 'text-align: right;'),
          
           // 'value'=>'$data["lab01"]', //in the case we want something custom
        ),
        // 'LABRESULT', //just use it in default way (but still we could use array(header,name)... )
        array(
            'header' => 'ตรวจน้ำตาลในเลือด2',
            'name' => 'lab02',
            'htmlOptions' => array("width" => "50px", 'style' => 'text-align: right;'),
      
        ),
        array(
            'header' => 'ตรวจน้ำตาลในเลือด3',
            'name' => 'lab03',
            'htmlOptions' => array("width" => "50px", 'style' => 'text-align: right;'),

        ),
        array(
            'header' => 'ตรวจน้ำตาลในเลือด4',
            'name' => 'lab04',
            'htmlOptions' => array("width" => "50px", 'style' => 'text-align: right;'),
 
        ),
        array(
            'header' => 'ตรวจ HbA1C',
            'name' => 'lab05',
            // 'value'=>'number_format($data["lab05"],2)',
            'htmlOptions'=>array('align'=>'right','width'=>'30px'),
     
        ),
        array(
            'header' => 'lab06',
            'name' => 'lab06',
 
        ),
        array(
            'header' => 'lab07',
            'name' => 'lab07',
 
        ),
        
        array(
            'header' => 'lab08',
            'name' => 'lab08',
     
        ),
        array(
            'header' => 'lab09',
            'name' => 'lab09',
 
        ),
        array(
            'header' => 'lab10',
            'name' => 'lab10',
 
        ),
        
        array(
            'header' => 'lab11',
            'name' => 'lab11',
 
        ),
        
        array(
            'header' => 'lab12',
            'name' => 'lab12',
     
        ),
        array(
            'header' => 'lab13',
            'name' => 'lab13',
 
        ),
        array(
            'header' => 'lab14',
            'name' => 'lab14',
 
        ),
        array(
            'header' => 'lab15',
            'name' => 'lab15',
 
        ),
        
        array(
            'header' => 'lab16',
            'name' => 'lab16',
 
        ),
        
        array(
            'header' => 'lab17',
            'name' => 'lab17',
     
        ),
        array(
            'header' => 'lab18',
            'name' => 'lab18',
 
        ),
        array(
            'header' => 'lab19',
            'name' => 'lab19',
 
        ),
       array(
            'header' => 'lab20',
            'name' => 'lab20',
 
        ),
       array(
            'header' => 'lab21',
            'name' => 'lab21',
 
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

