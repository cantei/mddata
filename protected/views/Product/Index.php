<!--  ปุ่มอัพเดทเวอร์ชั่น -->

<a class="btn btn-danger" href="index.php?r=Product/Up">
    Update New Version
</a>
<!--  MSG หลังบันทึกข้อมูลแล้ว -->

<?php if (Yii::app()->user->hasFlash('massage')): ?>
    <font color="red">
    <?php echo Yii::app()->user->getFlash('massage'); ?>
    </font>
<?php endif; ?>

<script>
    function browsefiles() {
        $("input[name=excel]").trigger("click");
        document.formExcel.onchange = function() {
            document.formExcel.submit();
        }
    }

</script>
<!-- browse file excel ซ่อนไว้ -->
<form name="formexcel" 
      method="POST"  
      enctype="multipart/form-data" 
      action="index.php?r=Product/Import">
    <input type="file" name="excel" style="display:none" />
</form>


<form name='form1' method="POST">

    <input type="text" value="" />
    <input type="submit" value="ค้นหา" />
    <input type="submit" value="คลิ๊กที่นี่เพื่อลบ" />
    <a class="btn btn-success" href="index.php?r=Product/Form">เพิ่ม Record
    </a>
    <a class="btn btn-warning" href="index.php?r=Product/ExportExcel" target="_blank"> 
        export to excel
    </a>
        <a class="btn btn-warning" href="index.php?r=Product/Pdf" target="_blank"> 
          export to PDF
    </a>
    <a class="btn btn-success" href="#" onclick="browsefiles()">
        import from excel
    </a>


    <?php
        // views/Product/Index.php

    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider' => $products,
        // ปรับแต่งการแสดงผล เลือกบางคอลัมน์
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
        //  ! grid  bootstrap's style     
        'columns' => array(
            array(
                'class' => 'CCheckBoxColumn', // ใช้สำหรับเลือก
               'id' => 'ids[]' // ส่งค่า ids ไป เมื่อมีการกด submit   
            ),
            // ปรับแต่ง header ต้องเอา array มาครอบ
            array(
                'name' => 'product_code',
                'header' => 'รหัสสินค้า'
            ),
            array(
                'name' => 'product_name',
                'header' => 'ชื่อสินค้า'
            ),
            array(
                'name' => 'product_price',
                'header' => 'ราคาสินค้า1'
            ),
            array(
                'name' => 'product_price_send',
                'header' => 'ราคาสินค้า2'
            ),
            // view edit delete button
            array(
                'class' => 'CButtonColumn'
            )
        )
    ));
    ?>
</form>