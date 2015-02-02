    <?php
// views/Product/Index.php

    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider' => $DmPatient,
        'selectableRows' => 2, // เพื่อให้เลือกได้ครั้งละหลายๆแถว
        //  grid  bootstrap's style
        'pagerCssClass' => 'pagination', // แบ่งหน้า
        "pager" => array(
            "selectedPageCssClass" => "active",
            "firstPageCssClass" => "previous",
            "lastPageCssClass" => "next",
            "hiddenPageCssClass" => "disabled",
            "header" => "",
            "htmlOptions" => array(
                "class" => "pagination"
            )
        ),
        'columns' => array(
                array(
                    'name' => 'HOSPCODE',
                    'header' => 'รหัสหน่วยบริการ'
                ),
                array(
                    'name' => 'HOSPNAME',
                    'header' => 'ชื่อหน่วยบริการ'
                ),
                array(
                    'name' => 'NAME',
                    'header' => 'ชื่อ'
                ),
                array(
                    'name' => 'LNAME',
                    'header' => 'นามสกุล'
                ),
                array(
                    'name' => 'cid',
                    'header' => 'รหัสประจำตัวประชาชน'
                ),
                array(
                    'name' => 'age',
                    'header' => 'อายุ'
                ),
                array(
                    'name' => 'lastdx',
                    'header' => 'ว ด ป ที่วินิจฉัย'
                ),

                array
                (
                    
                  // 'viewButtonUrl'=>'Yii::app()->request->getBaseUrl(true)."index.php?r=product/view&cid=".$data["cid"]',
                    'class'=>'CButtonColumn',
                    'header' => 'ดูรายละเอียด',
                    'template'=>'{view}',
                      'id' => 'id[]'
                )
        )


    ));
    ?>