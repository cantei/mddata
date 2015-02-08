<h2><?php // echo $email; ?></h2>
<div id="container1" class="container">
<h4 align="center"><?php  // echo "การได้รับวัคซีนเร็วกว่าอายุที่กำหนด...".$vaccinename?></h4>
<h5 align="center"><?php  // echo $msg;?></h5>

<hr>
    
        <form method='post'>
         <select name="vaccinetype" style="height:34px;width:120px" >
                    <option value="" disabled="disabled" selected="selected">เลือกชนิดวัคซีน</option>
                    <option value="BCG">BCG</option>
                    <option value="HB1">HB1</option>
                    <option value="DHB1">DHBV1</option>
                    <option value="MMR1">MMR1</option>
                    <option value="JE1">JE1</option>
          </select>
<!--          <button type='submit' class='btn btn-primary'>ประมวลผล</button>-->
                <?php echo CHtml::button('ประมวลผล',
                    array(
                        'submit'=>array('vaccined/checkage',array('vaccinetype'=>$vaccinetype)),
                        // 'confirm' => 'Are you sure?'
                        // or you can use 'params'=>array('id'=>$id)
                    )
                );?>
        </form>
 




    <?php
//    $this->widget('zii.widgets.grid.CGridView', array(
//        'id' => 'mseason-grid',
//        'dataProvider' => $dataProvider,
//        'columns' => array(
//             array(
//                'class' => 'CDataColumn',
//                 'type'=>'raw',
//                 'value'=>'CHtml::link($data["HOSPCODE"],array("vaccined/#&hospcode=".$data["HOSPCODE"]),array(
//                     "target"=>"_blank"))',              
//                'header' =>'รหัสตำบล',
//                'name'=>'summary',
//                'htmlOptions' => array('style' => 'width:150px;'),
//            ),
//            array(
//                'name' => 'hosname',
//                'header' => 'หน่วยบริการ',
//                'htmlOptions' => array('style' => 'width:150px;'),
//            ),
//
//            array(
//                'name' => 'n',
//                'header' => 'จำนวน',
//                'htmlOptions' => array('style' => 'width:80px;'),
//            ),
//
//
//        ),
//    ));
    ?>
</div>
<?php // echo $sql;?>
<?php  echo $vaccinetype;?>
