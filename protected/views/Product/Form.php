<!--  error massage  -->
<style>
    .errorSummary{
        border :red 2px solid;
        background: #ffffcc;
        color: red;
        padding: 10px;

    }
    inpu.error{
        border :red 1px solid;
        background: #ffffcc;
        color: red;
    }

</style>


<?php
$form = $this->beginWidget('CActiveForm',array(
    // ยืนยัน submit
    'htmlOptions'=>array(
        'onsubmit'=>"return confirm('ดำเนินการต่อไป')"
    )
    
    ));
// validate massage
echo $form->errorSummary($product,'ตรวจพบข้อผิดพลาด');
?>

<div>
<?php echo $form->labelEx($product, 'product_code'); ?>    
    <?php echo $form->textField($product, 'product_code'); // ผูกฟอร์มกับ ชื่อโมเดล ,ชื่อคอลัมน์  ?>        
</div>
<div>
<?php echo $form->labelEx($product, 'product_name'); ?>    
    <?php echo $form->textField($product, 'product_name'); ?>        
</div>
<div>
<?php echo $form->labelEx($product, 'product_price'); ?>    
    <?php echo $form->textField($product, 'product_price'); ?>        
</div>

<input type="submit" value="บันทึก">


<?php
$this->endWidget();
?>

