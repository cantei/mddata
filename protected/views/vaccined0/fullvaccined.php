<div id="container1" class="container">
    <div id="panel1" class="panel panel-default">
        <h4 class=" text-color" align='center'>ความครอบคลุมของการได้รับวัคซีนครบชุด</h4>
        <h5 align='center'>
            <?php
            // echo $enddate_params;
            echo "เด็กเกิดระหว่างวันที่    " . $startdate . "  ถึงวันที่  " . $enddate;
            ?>
        </h5>

    </div>
    <div class='well'>
        <form method='POST'>
            <?php echo "วันเดือนปีเกิดเด็กกลุ่มเป้าหมาย :  ";
            ?>
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name' => 'startdate_para',
                'options' => array(
                    'dateFormat' => 'yy-mm-dd',
                    // 'language'=>'th',
                     'language' => 'TH',
                    'showAnim' => 'slide', //'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                ),
                'htmlOptions' => array(
                    'style' => 'height:35px;',
                ),
            ));
            ?>
             <?php echo "ถึง";?>
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name' => 'enddate_para',
                'options' => array(
                    'dateFormat' => 'yy-mm-dd',
                    'language'=>'th',
                    'showAnim' => 'slide', //'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                ),
                'htmlOptions' => array(
                    'style' => 'height:35px;',
                ),
            ));
            ?>
            <button type='submit' class='btn btn-primary'>ประมวลผล</button>
        </form>
    </div>

    <br>




    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'mseason-grid',
        'dataProvider' => $dataProvider,
        'filter' => $filtersForm,
        'columns' => array(
            array(
                'name' => 'off_id',
                'header' => 'รหัสตำบล',
                'htmlOptions' => array('style' => 'width:150px;'),
            ),
            array(
                'name' => 'off_name',
                'header' => 'สถานบริการ',
                'htmlOptions' => array('style' => 'width:150px;'),
            ),
            array(
                'name' => 'cid',
                'header' => 'บัตรประชาชน',
                'htmlOptions' => array('style' => 'width:80px;'),
            ),
            array(
                'name' => 'birth',
                'header' => 'วันเกิด',
                'htmlOptions' => array('style' => 'width:80px;'),
            ),
            array(
                'class' => 'CButtonColumn',
                'template' => '{view}',
                // 'htmlOptions'=>array('style'=>'width:150px;'),
                'buttons' => array('view' => array(
                        'label' => '',
                        'url' => 'Yii::app()->controller->createUrl("site/personvaccined",array("id"=>$data["cid"]))',
                        'imageUrl' => FALSE,
                        'options' => array('title' => 'ดูรายละเอียด'
                            , 'class' => 'fa fa-eye btn btn-default'
                            , 'rel' => 'tooltip'
                            , 'class' => 'glyphicon glyphicon-eye-open'
                            , 'data-toggle' => 'tooltip')
                        , 'data-placement' => 'top'
                        , 'data-original-title' => 'View'
                    )
                )
            )
        ),
    ));
    ?>


</div>
