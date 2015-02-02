
<div class="well">

    <h1>ข้อมูลประวัติการเจ็บป่วย</h1>

    <?php echo Yii::app()->session['my_id']; ?>
</div>

<?php
$this->widget('zii.widgets.jui.CJuiTabs', array(
    // 'dataProvider'=>$vulnerdataProvider,
    'tabs' => array(
        'ข้อมูลการรับยา' => array('content' => 'Content for tab 2 With Id', 'id' => 'tab2'),
//        'Render Partial'=>array('id'=>'test-id','content'=>$this->renderPartial(
//                                        '_renderpage',
//                                        array('Values'=>'This Is My Renderpartial Page'),TRUE
//                                        )),        
        // panel 3 contains the content rendered by a partial view
        'ข้อมูลการชันสูตร' => array('ajax' => $this->createUrl('//Site/Index ')),
        'ข้อมูลการสรุปผลการรักษา' => array('ajax' => $this->createUrl('//Site/Index ')),
    ),
    // additional javascript options for the tabs plugin
    'options' => array(
        'collapsible' => true,
    ),
    'id' => 'MyTab-Menu',
));
?>

<?php // Yii::app()->session->destroy(); ?>