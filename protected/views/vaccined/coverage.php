<div id="container1" class="container">

    <div id="panel1" class="panel panel-default">
        <div id="header1" class="panel-heading">
            <h4 class="headline text-color">ความครอบคลุมของการได้รับวัคซีนครบชุด</h4>

        </div>
        <div class='well'>
        <form method="POST">
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name' => 'datepicker-multiple-month',
                'flat' => true, //remove to hide the datepicker
                'options' => array(
                    // 'numberOfMonths'=>2,
                    'showButtonPanel' => true,
                ),
                'htmlOptions' => array(
                    'style' => ''
                ),
            ));
            ?>		
        </form>
            </div>
        
        <?php
        $this->menu=array(
            array('label'=>'view','url'=>array('view')),
             array('label'=>'create','url'=>array('create')),
        );
        
        ?>
        
        
        
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'mseason-grid',
            'dataProvider' => $dataProvider,
            'filter' => $filtersForm,
            'columns' => array(
                array(
                    'name' => 'Tambon',
                    'header' => 'รหัสตำบล',
                    'htmlOptions' => array('style' => 'width:150px;'),
                ),
                array(
                    'name' => 'subdistname',
                    'header' => 'ชื่อตำบล',
                    'htmlOptions' => array('style' => 'width:150px;'),
                ),
                array(
                    'name' => 'target',
                    'header' => 'เป้าหมาย',
                    'htmlOptions' => array('style' => 'width:80px;'),
                ),
                array(
                    'name' => 'num',
                    'header' => 'ผลงาน',
                    'htmlOptions' => array('style' => 'width:80px;'),
                ),
                array(
                    'name' => 'percent',
                    'header' => 'ร้อยละ',
                    'htmlOptions' => array('style' => 'width:80px;'),
                ),
                array(
                    'class' => 'CButtonColumn',
                    'template' => '{view}',
                    // 'htmlOptions'=>array('style'=>'width:150px;'),
                    'buttons' => array('view' => array(
                            'label' => '',
                            'url' => 'Yii::app()->controller->createUrl("site/personvaccined",array("id"=>$data["Tambon"]))',
                            'imageUrl' => FALSE,
                            'options' => array('title' => 'ดูรายละเอียด'
                                , 'class' => 'fa fa-eye btn btn-default'
                                , 'rel' => 'tooltip'
                                , 'class' => 'glyphicon glyphicon-eye-open'
                                , 'data-toggle' => 'tooltip')
                            , 'data-placement' => 'top'
                            , 'data-original-title' => 'View'
                        )
                    )
                )
            ),
                /*
                  'update' => array(
                  'label' => '',
                  'url' => 'Yii::app()->createUrl("site/index", array("id"=>$data->id))',
                  'imageUrl' => FALSE,
                  //  'options' => array('title' => 'แก้ไข', 'class' => 'glyphicon glyphicon-edit',
                  //    'style' => 'margin-left:8px;margin-right:8px'),
                  ),
                  'delete' => array(
                  'label' => '',
                  'url' => 'Yii::app()->createUrl("site/index", array("id"=>$data->id))',
                  'imageUrl' => FALSE,
                  // 'options' => array('title' => 'ลบ', 'class' => 'glyphicon glyphicon-trash'),
                  )
                  )
                  ),


                 */
        ));
        ?>

    </div>
</div>
<?php echo $_GET['HOSPNAME'].'<br>'; ?>
<?php echo $_GET['VACCINETYPE'].'<br>'; ?>
