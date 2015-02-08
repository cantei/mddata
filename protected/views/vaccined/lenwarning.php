<h4  align="center"> จำนวนเด็กที่ได้รับวัคซีนที่ระยะห่างระหว่างโด๊สเร็วกว่าปกติ </h4>
<div class='container'>
<?php 
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>array(
       'ความครอบคลุมการได้วัคซีน'=>array('/vaccined/coverage'),
       'ระยะห่างระหว่างการได้รับวัคซีน',
    ),
));
?>
<hr>


    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'mseason-grid',
        'dataProvider' => $dataProvider,

       
        'columns' => array(
            
            array(
                'name' => 'HOSPCODE',
                'header' => 'รหัสหน่วยบริการ',
                'htmlOptions' => array('style' => 'width:50px;','style'=>'text-align:center'),
                
            ),
            array(
                'name' => 'hosname',
                'header' => 'หน่วยบริการ',
                'htmlOptions' => array('style' => 'width:100px;','style'=>'text-align:left'),
           
            ),
            array(
                'name' => 'a1',
                'header' => 'DHBV1-DHBV2',
               'htmlOptions' => array('style' => 'width:100px;','style'=>'text-align:center'),
            ),
            array(
                'name' => 'a2',
                'header' => 'DHBV2-DHBV3',
                'htmlOptions' => array('style' => 'width:100px;','style'=>'text-align:center'),
            ),
            array(
                'name' => 'a3',
                'header' => 'JE1-JE2',
                'htmlOptions' => array('style' => 'width:100px;','style'=>'text-align:center'),
            ),
            array(
                'name' => 'a4',
                'header' => 'JE2-JE2',
                'htmlOptions' => array('style' => 'width:100px;','style'=>'text-align:center'),
            ),
            array(
                'name' => 'a5',
                'header' => 'DTP3-DTP4',
                'htmlOptions' => array('style' => 'width:100px;','style'=>'text-align:center'),
            ),

        ),
    ));
    ?>
</div>
<?php // echo $sql;?>
