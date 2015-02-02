<div class='container'>
    <div class="row">
 <div class="page-header">Install</div>
    
        <pre>
            <?php
//$this->widget('bootstrap.widgets.TbDetailView', array(
//     'dataProvider' => $dataProvider,
//    'attributes'=>array(    
//        array(
//            'label'=>'Total Tunggakan',
//            'value'=> >function($data){echo $PID},
//        ),      
//    ),
//));
//            echo $hospcode . '<br>';
//            echo $sql;
//exit;
            ?>
        </pre>
    </div>
</div>
      <div class="container">


    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'mseason-grid',
        'dataProvider' => $dataProvider,
        // 'filter' => $filtersForm,
        'columns' => array(
            array(
                'name' => 'PID',
                'header' => 'รหัสบุคคล',

            ),
            array(
                'name' => 'CID',
                'header' => 'เลขประจำตัวประชาชน',
	
            ),
            array(
                'name' => 'FNAME',
                'header' => 'ชื่อ',
	
            ),
             array(
                'name' => 'LNAME',
                'header' => 'สกุล',
	
             ),
             array(
                'name' => 'VACCINETYPE',
                'header' => 'ชนิดวัคซีน',
	
               
            ),
            array(
                'name' => 'DATE_SERV',
                'header' => 'วันที่รับบริการ',
		
                ),
        ),
    ));
    ?>
</div>
        </div>