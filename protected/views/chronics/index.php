<div class='container'>
    <div class="row">
<?php 
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>array(
       // 'Sample post'=>array('post/view', 'id'=>12),
        'Chronic Registration',
    ),
));
?>
    </div>

<h3  align="center">จำนวนผู้ป่วยโรคไม่ติดต่อเรื้อรังที่ขึ้นทะเบียนรักษา  ปี 2558 </h3>

    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'mseason-grid',
        'dataProvider' => $dataProvider,
        'filter' => $filtersForm,
        'columns' => array(
            array(
                'name' => 'HOSPCODE',
                'header' => 'รหัสหน่วยบริการ',
            ),
            array(
                'name' => 'hosname',
                'header' => 'หน่วยบริการ',
            ),
            array(
                'name' => 'nDM',
                'header' => 'เบาหวาน(โรคเดียว)',
            ),
            array(
                'name' => 'nHT',
                'header' => 'ความดันสูง(โรคเดียว)',
            ),
            array(
                'name' => 'nDMHT',
                'header' => 'เบาหวานและความดัน',
            ),
            
            array(
                'name' => 'nOTHER',
                'header' => 'โรคเรื้อรังอื่นๆ',
            ),
        ),
    ));
    ?>
</div>
