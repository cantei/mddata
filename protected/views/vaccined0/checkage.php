<div class='container'>
<h2><?php // echo $email; ?></h2>

<h4 align="center"><?php  echo "การได้รับวัคซีนเร็วกว่าอายุที่กำหนด...".$vaccname?></h4>
<h5 align="center"><?php  echo $msg;?></h5>

<hr>
    
<form method='post'>
    <select name="vacctype" style="height:34px;width:120px" >
        <option value="" disabled="disabled" selected="selected">เลือกชนิดวัคซีน</option>
        <option value="010">BCG</option>
        <option value="041">HB1</option>
        <option value="091">HB1</option>
        <option value="061">MMR1</option>
        <option value="051">JE1</option>
    </select>
    <button type='submit' class='btn btn-primary'>ประมวลผล</button>
</form>

    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'mseason-grid',
        'dataProvider' => $dataProvider,
        'columns' => array(
//             array(
//                'class' => 'CDataColumn',
//                 'type'=>'raw',
//                 'value'=>'CHtml::link($data["HOSPCODE"],array("vaccined/coverage&HOSPCODE=".$data["HOSPCODE"]),array(
//                     "target"=>"_blank"))',              
//                'header' =>'รหัสตำบล',
//                'name'=>'HOSPCODE',
//                'htmlOptions' => array('style' => 'width:150px;'),
//            ),
            array(
                'name' => 'hosname',
                'header' => 'หน่วยบริการ',
                'htmlOptions' => array('style' => 'width:150px;'),
            ),

            array(
                'name' => 'n',
                'header' => 'จำนวน',
                'htmlOptions' => array('style' => 'width:80px;'),
            ),


        ),
    ));
    ?>

<?php  echo '$sql'.'test';?>
</div>