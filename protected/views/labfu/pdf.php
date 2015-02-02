<?php
/* @var $this RaportController */

$this->breadcrumbs = array(
    'labfu' => array('/labfu'),
    'ByDay',
);
?>
<?php
// include_once '/MPDF57/mpdf.php';
?>
<pre>
    <?php
 // echo $DATE_SERV;
    ?>
</pre>
<div class='row'>
<pre>
    <?php
echo $pid;
   // echo ;
    ?>
</pre>
    ?>
</div>

<div class='container'>

<?php
      $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'mseason-grid',
        'dataProvider' =>$dataProvider ,
        //'filter' => $filtersForm,
        'columns' => array(
            array(
                'name' => 'DATE_SERV',
                'header' => 'วันที่ตรวจ',
                'htmlOptions' => array('style' => 'width:100px;'),
            ),

            array(
                'name' => 'LABTEST',
                'header' => 'ชนิดแล็บ',
                'htmlOptions' => array('style' => 'width:100px;'),
            ),
			array(
                'name' => 'describe',
                'header' => 'ชนิดแล็บ',
                'htmlOptions' => array('style' => 'width:350px;'),
            ),
// describe
            array(
                'name' => 'LABRESULT',
                'header' => 'ผลแล็ป',
                'htmlOptions'=>array('style'=>'text-align:right;width:100px;'),
            ),
			array(
                'name' => 'std_value',
                'header' => 'ค่าปกติ',
                'htmlOptions'=>array('style'=>'text-align:left;width:350px;'),
            ),
			
        ),
    ));
?>
</div>