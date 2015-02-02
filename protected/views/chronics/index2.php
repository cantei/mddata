<?php
$this->widget('zii.widgets.grid.CGridView',array(
   'id' => 'grid1',
   'dataProvider'=>$dataProvider1,
   'enablePagination' => TRUE,
   'columns' => array(
        array(
            'name' => 'HOSPCODE',
            'header' => 'HOSPCODE',
        ),
//        array(
//            'name' => 'CID',
//            'header' => 'CID',
//        ),
//        array(
//            'name' => 'BIRTH',
//            'header' => 'BIRTH',
//        ),
//         array(
//           'name' => 'DM_DX',
//          'header' => 'DM_DX',
//        ),
    ),
));
?>
<?php
$this->widget('zii.widgets.grid.CGridView',array(
   'id' => 'grid2',
 //  'dataProvider2'=>$dataProvider2,
   'enablePagination' => TRUE,
   'columns' => array(
        array(
            'name' => 'HOSPCODE',
            'header' => 'HOSPCODE',
        ),
        array(
            'name' => 'CID',
            'header' => 'CID',
        ),
        array(
            'name' => 'BIRTH',
            'header' => 'BIRTH',
        ),
         array(
           'name' => 'DM_DX',
          'header' => 'DM_DX',
        ),
    ),
));
?>

