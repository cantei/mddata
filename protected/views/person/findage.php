<div class='container'>
<div class='row'>
        
<?php 
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>array(
       // 'Sample post'=>array('post/view', 'id'=>12),
        'ค้นหาจำนวนประชากรตามอายุ',
    ),
));
?>

<h3 align="center"> ประชากรจากการสำรวจ</h3>
<h4 align="center"> เครือข่ายบริการอำเภอเมืองเพชรบูรณ์ ปี 2558</h4>
<?php echo "อายุระหว่าง  ".$x." ปี  ถึง  ".$y."  ปี" ;?>
</div>
<hr>
<div class="row">
    <form  method="post" align="center">
            อายุ:    <input type="text" name="x">
            ถึง:     <input type="text" name="y">
            <input type="submit"  value="ประมวลผล">
    </form>
</div>

<div class='row'>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'a-grid-id',
    'dataProvider' => $dataProvider,
    'ajaxUpdate' => true, //false if you want to reload aentire page (useful if sorting has an effect to other widgets)
    'filter' => null, //if not exist search filters
    'columns' => array(
 
        array(
            'header' => 'รหัสหน่วยบริการ',
            'name' => 'HOSPCODE',

            // 'htmlOptions' => array("width" => "50px", 'style' => 'text-align: right;'),
        ),
        array(
            'header' => 'หน่วยบริการ',
            'name' => 'hosname',
        ),
        array(
            'header' => 'จำนวน ปชก. ชาย',
            'name' => 'male',
        ),
        array(
            'header' => 'จำนวน ปชก.หญิง',
            'name' => 'female',
        ),
        array(
            'header' => 'จำนวน ปชก.ทั้งหมด',
            'name' => 'total',
        ),

    ),

));
?>
</div>
    <div class="row"><?php echo "ข้อมูลที่แสดงนี้  ได้แก่ ข้อมูลประชากรที่มีสถานะการอยู่อาศัยเป็น (1) (อาศัยอยู่จริงและมีทะเบียนบ้าน)  และสถานะการอยู่อาศัยเป็น (3) (อาศัยอยู่จริงแต่ไม่มีทะเบียนบ้าน)  ";?></div>
    
</div>



 