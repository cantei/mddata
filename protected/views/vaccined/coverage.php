<br>
<div class='container'>
    <ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">2013</a></li>
  <li class="active">November</li>
</ol>
<?php 
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>array(
       //'ผลการตรวจ HbA1C รายหน่วยบริการ'=>array('/labfu/hba1c'),
        'ความครอบคลุมวัคซีนในเด็กอายุครบ 1 ปี',
    ),
));
?>
<h4  align="center"> ความครอบคลุมการได้รับวัคซีนในเด็กอายุครบ 1 ปี </h4>


<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'a-grid-id',
    'dataProvider' => $dataProvider,
    'ajaxUpdate' => true, //false if you want to reload aentire page (useful if sorting has an effect to other widgets)
    'filter' => null, //if not exist search filters
 
    'columns' => array(
 
//        array(
//                 'class' => 'CDataColumn',
//                 'type'=>'raw',
//                 'value'=>'CHtml::link($data["hoscode"],array("vaccined/coveragevillage&hospcode=".$data["hoscode"]),array(
//                     ))',
//            'header' => 'รหัสหน่วยบริการ',
//            'name' => 'hoscode',
//           //  'htmlOptions' => array("width" => "10%", 'style' => 'text-align: left;')
//        ),
        array(
            'header' => 'หน่วยบริการ',
            'name' => 'hoscode',
        ),
        array(
            'header' => 'หน่วยบริการ',
            'name' => 'hosname',
        ),
        array(
            'header' => 'เป้าหมาย',
            'name' => 'target',
      
        ),
        array(
            'header' => 'BCG',
            'name' => 'coverbcg',
        ),
        array(
            'header' => '%',
            'name' => 'percentbcg',
        ),
         array(
            'header' => 'MMR',
            'name' => 'covermmr',
        ),
        array(
            'header' => '%',
            'name' => 'percentmmr',
        ),
        array(
            'header' => 'DHBV3',
            'name' => 'coverdhbv3',
        ),
        array(
            'header' => '%',
            'name' => 'percentdhbv3',
        ),
        array(
            'header' => 'OPV3',
            'name' => 'coveropv3',
        ),
        array(
            'header' => '%',
            'name' => 'percentopv3',
        ),
                /* 
        array(
            'header' => '%',
            'name' => 'percentbcg',
        ),
        array(
            'header' => 'MMR',
            'name' => 'mmr',
           
        ),
         array(
            'header' => '%',
            'name' => 'percentmmr',
        ),
          array(
            'header' => 'DHBV3',
            'name' => 'dhbv3',
           
        ),
         array(
            'header' => '%',
            'name' => 'percentdhbv3',
        ),
         array(
            'header' => 'OPV3',
            'name' => 'opv3',
          
            
        ),
         array(
            'header' => '%',
            'name' => 'percentopv3',
        ),
                 * 
                 */
        
    ),
    ));
?>
</div>