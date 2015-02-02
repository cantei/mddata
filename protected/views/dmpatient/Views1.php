<?php echo $my_id;?>
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$DmPatient,
   // 'filter'=>$DmPatient,
    // "itemsCssClass" => "table_design_1",
    "htmlOptions" => array(
       //  "class" => "div_design_1"
    ),
    'columns'=>array(
        array(
            'name'=>'HOSPCODE', 
            'header'=>'First name',
            'type' => 'raw',
         //   'value' => 'CHtml::link($data->family_name,$data->id)'
        ),
        array(
            'name'=>'HOSPNAME', 
            'header'=>'Last name',
            'type' => 'raw',
          //  'value' => 'CHtml::link($data->given_name,$data->id)'
        ),
        array(
            'class'=>'CButtonColumn',
            'viewButtonUrl'=>'Yii::app()->request->getBaseUrl(true).".index.php?r=DmPatient/Views1.php?cid=".$data["cid"]',
            // 'updateButtonUrl'=>'Yii::app()->controller->createUrl("update",$data->primaryKey)',
            // 'deleteButtonUrl'=>'Yii::app()->controller->createUrl("delete",$data->primaryKey)',
            "htmlOptions" => array(
                'style'=>'width: 60px;'
            )
        )
    )
)); ?> 