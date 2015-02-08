
    <div id="panel1" class="panel panel-default">
        <h4 class=" text-color" align='center'>ผลการให้บริการวัคซีนปีงบประมาณ 2558 </h4>
        <h5 class=" text-color" align='center'>เครือข่ายบริการอำเภอเมืองเพชรบูรณ์ </h5>
        
    </div>
    <div class='well' >
        <form method='POST'>
            <?php echo "กรุณาเลือกวันบริการ :  ";
            ?>
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name' => 'startdate_para',
                'options' => array(
                    'dateFormat' => 'yy-mm-dd',
                    'language' => 'TH',
                    'showAnim' => 'slide', //'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                ),
                'htmlOptions' => array(
                    'style' => 'height:35px;',
                ),
            ));
            ?>
             <?php echo "ถึง";?>
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name' => 'enddate_para',
                'options' => array(
                    'dateFormat' => 'yy-mm-dd',
                    'language'=>'th',
                    'showAnim' => 'slide', //'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                ),
                'htmlOptions' => array(
                    'style' => 'height:35px;',
                ),
            ));
            ?>
            <button type='submit' class='btn btn-primary'>ประมวลผล</button>
        </form>
    </div>

<?php //print_r($dataProvider); ?>

    <?php
    
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'mseason-grid',
        'dataProvider' => $dataProvider,
        // 'filter' => $filtersForm,
        'columns' => array(
            array(
                'name'=>'HOSPCODE',
                'header' => 'รหัสหน่วยบริการ',
                'htmlOptions' => array('style' => 'width:100px;'),
                'value'=>function($data){ ?>
                    <a href="<?=Yii::app()->createUrl('vaccined/viewdetail'
                            ,array('hospcode'=>$data['HOSPCODE']))?>"
                            ><?=$data['HOSPCODE']?>
                    </a>
                <?php }
            ),
            array(
                'name' => 'HNAME',
                'header' => 'หน่วยบริการ',
                'htmlOptions' => array('style' => 'width:250px;'),
               
            ),
            array(
                'name' => 'BCG',
                'header' => 'BCG',
		'htmlOptions'=>array('style'=>'text-align:right'),
                'value'=>function($data){ 
                $d1 = $_POST['startdate_para'];
                $d2 = $_POST['enddate_para'];
                ?>
                    <a href="<?=Yii::app()->createUrl('vaccined/viewdetail'
                            ,array(
                                'hospcode'=>$data['HOSPCODE'],
                                'vactype'=>'010',
                                'startdate'=>$d1,
                                'enddate'=>$d2,
                        ))?>"
                    >
                        <?=$data['BCG']?>
                    </a>
                <?php }
            ),
            array(
                'name' => 'DHB1',
                'header' => 'DHB1',
		'htmlOptions'=>array('style'=>'text-align:right'),
                'value'=>function($data){ 
                $d1 = $_POST['startdate_para'];
                $d2 = $_POST['enddate_para'];
                ?>
                    <a href="<?=Yii::app()->createUrl('vaccined/viewdetail'
                            ,array(
                                'hospcode'=>$data['HOSPCODE'],
                                'vactype'=>'091',
                                'startdate'=>$d1,
                                'enddate'=>$d2,
                        ))?>"
                    >
                        <?=$data['DHB1']?>
                    </a>
                <?php }
            ),array(
                'name' => 'DHB2',
                'header' => 'DHB2',
		'htmlOptions'=>array('style'=>'text-align:right'),
                'value'=>function($data){ 
                $d1 = $_POST['startdate_para'];
                $d2 = $_POST['enddate_para'];
                ?>
                    <a href="<?=Yii::app()->createUrl('vaccined/viewdetail'
                            ,array(
                                'hospcode'=>$data['HOSPCODE'],
                                'vactype'=>'092',
                                'startdate'=>$d1,
                                'enddate'=>$d2,
                        ))?>"
                    >
                        <?=$data['DHB2']?>
                    </a>
                <?php }
            ),
           array(
                'name' => 'DHB3',
                'header' => 'DHB3',
		'htmlOptions'=>array('style'=>'text-align:right'),
                'value'=>function($data){ 
                $d1 = $_POST['startdate_para'];
                $d2 = $_POST['enddate_para'];
                ?>
                    <a href="<?=Yii::app()->createUrl('vaccined/viewdetail'
                            ,array(
                                'hospcode'=>$data['HOSPCODE'],
                                'vactype'=>'093',
                                'startdate'=>$d1,
                                'enddate'=>$d2,
                        ))?>"
                    >
                        <?=$data['DHB3']?>
                    </a>
                <?php }
            ),
            array(
                'name' => 'DTP4',
                'header' => 'DTP4',
		'htmlOptions'=>array('style'=>'text-align:right'),
                'value'=>function($data){ 
                $d1 = $_POST['startdate_para'];
                $d2 = $_POST['enddate_para'];
                ?>
                    <a href="<?=Yii::app()->createUrl('vaccined/viewdetail'
                            ,array(
                                'hospcode'=>$data['HOSPCODE'],
                                'vactype'=>'034',
                                'startdate'=>$d1,
                                'enddate'=>$d2,
                        ))?>"
                    >
                        <?=$data['DTP4']?>
                    </a>
                <?php }
            ),
            array(
                'name' => 'DTP5',
                'header' => 'DTP5',
		'htmlOptions'=>array('style'=>'text-align:right'),
                'value'=>function($data){ 
                $d1 = $_POST['startdate_para'];
                $d2 = $_POST['enddate_para'];
                ?>
                    <a href="<?=Yii::app()->createUrl('vaccined/viewdetail'
                            ,array(
                                'hospcode'=>$data['HOSPCODE'],
                                'vactype'=>'035',
                                'startdate'=>$d1,
                                'enddate'=>$d2,
                        ))?>"
                    >
                        <?=$data['DTP5']?>
                    </a>
                <?php }
            ),
                    
            array(
                'name' => 'OPV1',
                'header' => 'OPV1',
		'htmlOptions'=>array('style'=>'text-align:right'),
                'value'=>function($data){ 
                $d1 = $_POST['startdate_para'];
                $d2 = $_POST['enddate_para'];
                ?>
                    <a href="<?=Yii::app()->createUrl('vaccined/viewdetail'
                            ,array(
                                'hospcode'=>$data['HOSPCODE'],
                                'vactype'=>'081',
                                'startdate'=>$d1,
                                'enddate'=>$d2,
                        ))?>"
                    >
                        <?=$data['OPV1']?>
                    </a>
                <?php }
            ),
            array(
                'name' => 'OPV2',
                'header' => 'OPV2',
		'htmlOptions'=>array('style'=>'text-align:right'),
                'value'=>function($data){ 
                $d1 = $_POST['startdate_para'];
                $d2 = $_POST['enddate_para'];
                ?>
                    <a href="<?=Yii::app()->createUrl('vaccined/viewdetail'
                            ,array(
                                'hospcode'=>$data['HOSPCODE'],
                                'vactype'=>'082',
                                'startdate'=>$d1,
                                'enddate'=>$d2,
                        ))?>"
                    >
                        <?=$data['OPV2']?>
                    </a>
                <?php }
            ),                    
 
            array(
                'name' => 'OPV3',
                'header' => 'OPV3',
		'htmlOptions'=>array('style'=>'text-align:right'),
                'value'=>function($data){ 
                $d1 = $_POST['startdate_para'];
                $d2 = $_POST['enddate_para'];
                ?>
                    <a href="<?=Yii::app()->createUrl('vaccined/viewdetail'
                            ,array(
                                'hospcode'=>$data['HOSPCODE'],
                                'vactype'=>'083',
                                'startdate'=>$d1,
                                'enddate'=>$d2,
                        ))?>"
                    >
                        <?=$data['OPV3']?>
                    </a>
                <?php }
            ),                    
                    
            array(
                'name' => 'OPV4',
                'header' => 'OPV4',
		'htmlOptions'=>array('style'=>'text-align:right'),
                'value'=>function($data){ 
                $d1 = $_POST['startdate_para'];
                $d2 = $_POST['enddate_para'];
                ?>
                    <a href="<?=Yii::app()->createUrl('vaccined/viewdetail'
                            ,array(
                                'hospcode'=>$data['HOSPCODE'],
                                'vactype'=>'084',
                                'startdate'=>$d1,
                                'enddate'=>$d2,
                        ))?>"
                    >
                        <?=$data['OPV4']?>
                    </a>
                <?php }
            ),  
            array(
                'name' => 'OPV5',
                'header' => 'OPV5',
		'htmlOptions'=>array('style'=>'text-align:right'),
                'value'=>function($data){ 
                $d1 = $_POST['startdate_para'];
                $d2 = $_POST['enddate_para'];
                ?>
                    <a href="<?=Yii::app()->createUrl('vaccined/viewdetail'
                            ,array(
                                'hospcode'=>$data['HOSPCODE'],
                                'vactype'=>'085',
                                'startdate'=>$d1,
                                'enddate'=>$d2,
                        ))?>"
                    >
                        <?=$data['OPV5']?>
                    </a>
                <?php }
            ),                    
                    
                    
            array(
                'name' => 'MMR1',
                'header' => 'MMR1',
		'htmlOptions'=>array('style'=>'text-align:right'),
                'value'=>function($data){ 
                $d1 = $_POST['startdate_para'];
                $d2 = $_POST['enddate_para'];
                ?>
                    <a href="<?=Yii::app()->createUrl('vaccined/viewdetail'
                            ,array(
                                'hospcode'=>$data['HOSPCODE'],
                                'vactype'=>'061',
                                'startdate'=>$d1,
                                'enddate'=>$d2,
                        ))?>"
                    >
                        <?=$data['MMR1']?>
                    </a>
                <?php }
            ),                    

                    
                    
                  
                    
            array(
                'name' => 'JE1',
                'header' => 'JE1',
		'htmlOptions'=>array('style'=>'text-align:right'),
                'value'=>function($data){ 
                $d1 = $_POST['startdate_para'];
                $d2 = $_POST['enddate_para'];
                ?>
                    <a href="<?=Yii::app()->createUrl('vaccined/viewdetail'
                            ,array(
                                'hospcode'=>$data['HOSPCODE'],
                                'vactype'=>'051',
                                'startdate'=>$d1,
                                'enddate'=>$d2,
                        ))?>"
                    >
                        <?=$data['JE1']?>
                    </a>
                <?php }
            ),
                    
            array(
                'name' => 'JE1',
                'header' => 'JE1',
		'htmlOptions'=>array('style'=>'text-align:right'),
                'value'=>function($data){ 
                $d1 = $_POST['startdate_para'];
                $d2 = $_POST['enddate_para'];
                ?>
                    <a href="<?=Yii::app()->createUrl('vaccined/viewdetail'
                            ,array(
                                'hospcode'=>$data['HOSPCODE'],
                                'vactype'=>'051',
                                'startdate'=>$d1,
                                'enddate'=>$d2,
                        ))?>"
                    >
                        <?=$data['JE1']?>
                    </a>
                <?php }
            ),
                    
            array(
                'name' => 'JE3',
                'header' => 'JE3',
		'htmlOptions'=>array('style'=>'text-align:right'),
                'value'=>function($data){ 
                $d1 = $_POST['startdate_para'];
                $d2 = $_POST['enddate_para'];
                ?>
                    <a href="<?=Yii::app()->createUrl('vaccined/viewdetail'
                            ,array(
                                'hospcode'=>$data['HOSPCODE'],
                                'vactype'=>'053',
                                'startdate'=>$d1,
                                'enddate'=>$d2,
                        ))?>"
                    >
                        <?=$data['JE3']?>
                    </a>
                <?php }
            ),                    
                    
                    
                    


        ),
    ));
    ?>

<?php  echo $startdate.'<br>'; ?>
<?php  echo $enddate.'<br>'; ?>
<?php  echo  $sql.'<br>'; ?>
