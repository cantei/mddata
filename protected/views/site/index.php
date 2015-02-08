<div class="container">
    
    <div class="heading"> <h3>Home</h3></div>    
  
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">เมนูหลัก</h3>
        </div>
        <div class="panel-body">
            <ul class="list-group">
                <li class="list-group-item"><a href="<?php echo $this->createUrl('person/index'); ?>">ประชากร/เป้าหมาย</a><span class="badge badge-warning">4</span></li>
                <li class="list-group-item"><a href="<?php echo $this->createUrl('person/findage'); ?>">ประชากรตามกลุ่มอายุ</a><span class="badge badge-important">6</span></li>
                <li class="list-group-item"><a href="<?php echo $this->createUrl('#'); ?>">กลุ่มเป้าหมายพิเศษ</a></li>
            </ul>
        </div>
    </div>

    

    <div class="row"> 
<!-- .col-sm-4 -->
    <div class="col-sm-4">
          <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">ระบบดูแลโรคเรื้อรัง</h3>
        </div>
        <div class="panel-body">
             <li><a href="<?php echo $this->createUrl('chronics/index'); ?>">ทะเบียนโรคเรื้อรัง</a></li>
             <li><a href="<?php echo $this->createUrl('labfu/hba1c'); ?>">LABFU</a></li>
        </div>
    </div>
    </div>
    <div class="col-sm-8">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">งานสร้างเสริมภูมิคุ้มกันโรค</h3>
            </div>
            <div class="panel-body">
                <li><a href="<?php echo $this->createUrl('vaccined/coverage'); ?>">ความครอบคลุมวัคซีน</a></li>
                <li><a href="<?php echo $this->createUrl('vaccined/performance'); ?>">ผลการให้บริการวัคซีน</a></li>
                <li><a href="<?php echo $this->createUrl('vaccined/fullvaccine'); ?>">การได้รับวัคซีนครบชุด</a></li>
                <li><a href="<?php echo $this->createUrl('vaccined/agewarning'); ?>">ตรวจสอบอายุขณะได้รับวัคซีน</a></li>
                <li><a href="<?php echo $this->createUrl('vaccined/lenwarning'); ?>">ตรวจสอบระยะระหว่างโด๊ส</a></li>
                 <li><a href="<?php echo $this->createUrl('vaccined/quaterreport'); ?>">รายงาน ส่ง สสจ.</a></li>
            </div>
    </div>
    </div>
</div>   



<?php
// echo (Yii::app()->controller->id)."/";
// echo (Yii::app()->controller->action->id);
    ?>
</div>
