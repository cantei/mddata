
<?php

//if(Yii::app()->user->detail->office_id != $_GET['hospcode'])
//{
//    echo '<script>alert("ไม่สามารถเข้าใช้งานได้\n");</script>';
//    echo '<META http-equiv="refresh" content="3;URL='. Yii::app()->createAbsoluteUrl('site/login') . '">';
//    Yii::app()->end();
//}

?>


<div class='container'>
<?php 
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>array(
       'ความครอบคลุมการได้รับวัคซีน'=>array('/vaccined/coverage'),
        'ความครอบคลุมการได้รับวัคซีน จำแนกรายหมู่บ้าน',
    ),
));
?>
    <hr>
    <h2 align="center"> <?php echo "ความครอบคลุมรายหมู่บ้าน/ชุมชน หน่วยบริการ=".$hospcode ;?> </h2>


<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'a-grid-id',
    'dataProvider' => $dataProvider,
    'ajaxUpdate' => true, //false if you want to reload aentire page (useful if sorting has an effect to other widgets)
    'filter' => null, //if not exist search filters
 
    'columns' => array(
 
        array(
            'header' => 'รหัสหมู่บ้าน',
            'name' => 'VILLAGEID',
           //  'htmlOptions' => array("width" => "10%", 'style' => 'text-align: center;')
        ),

        array(
            'header' => 'ชื่อหมู่บ้าน',
            'name' => 'villagename',
        ),
        array(
            'header' => 'จำนวนเป้าหมาย',
            'name' => 'target',
        ),
        array(
            'header' => 'ได้รับ BCG',
            'name' => 'getbcg',
             'htmlOptions' => array('style' => 'text-align: center;')
        ),

                array(
            'header' => 'ได้รับ MMR',
            'name' => 'getmmr',
            'htmlOptions' => array('style' => 'text-align: center;')
        ),
                array(
            'header' => 'ได้รับ DHBV3',
            'name' => 'getdhbv3',
            'htmlOptions' => array('style' => 'text-align: center;')
        ),
                 array(
            'header' => 'ได้รับ OPV3',
            'name' => 'getopv3',
            'htmlOptions' => array('style' => 'text-align: center;')
        ),
        
        array(
            'header' => 'ไม่ได้รับ BCG',
            'name' => 'missbcg',
             'htmlOptions' => array('style' => 'text-align: center;'),
            'value' => function($data) {
                ?>
                                    <a href="<?= Yii::app()->createUrl('vaccined/missvaccine'
                                        ,array(
                                            'hospcode'=>$data['HOSPCODE'],
                                            'BCG'=>'BCG',
                                            'VILLAGEID'=>$data['VILLAGEID'],
                                    ))?>"
                                     ><?= $data['missbcg'] ?>
                                    </a>
            <?php
            }
        ),

                array(
            'header' => 'ไม่ได้รับ MMR',
            'name' => 'missmmr',
            'htmlOptions' => array('style' => 'text-align: center;'),
            'value' => function($data) {
                ?>
                                    <a href="<?= Yii::app()->createUrl('vaccined/missvaccine'
                                            ,array(
                                            'hospcode'=>$data['HOSPCODE'],
                                            'vaccinetype'=>'MMR',
                                            'VILLAGEID'=>$data['VILLAGEID'],
                                            ))?>"
                                     ><?= $data['missmmr'] ?>
                                     </a>
            <?php
            }
        ),
                array(
            'header' => 'ไม่ได้รับ DHBV3',
            'name' => 'missdhbv3',
            'htmlOptions' => array('style' => 'text-align: center;'),
            'value' => function($data) {
                ?>
                                    <a href="<?= Yii::app()->createUrl('vaccined/missvaccine'
                                            ,array(
                                            'hospcode'=>$data['HOSPCODE'],
                                             'vaccinetype'=>'093',
                                            'VILLAGEID'=>$data['VILLAGEID'],
                                            ))?>"
                                     ><?= $data['missmmr'] ?>
                                     </a>
            <?php
            }
        ),
                 array(
            'header' => 'ไม่ได้รับ OPV3',
            'name' => 'missopv3',
            'htmlOptions' => array('style' => 'text-align: center;'),
            'value' => function($data) {
                ?>
                                   <a href="<?= Yii::app()->createUrl('vaccined/missvaccine'
                                            ,array(
                                            'hospcode'=>$data['HOSPCODE'],
                                          //  'vaccinetype'=>'083',
                                            'VILLAGEID'=>$data['VILLAGEID'],
                                            ))?>"
                                     ><?= $data['missmmr'] ?>
                                     </a>
            <?php
            }
        ),

    ),
    ));
?>
</div>
<?php 
// echo $sql;
?>