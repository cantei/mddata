<div class="container">
    
    <div class="heading">

        <h3>เมนูหลัก</h3>
    </div>    
    
    
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">ประชากร/เป้าหมาย</h3>
        </div>
        <div class="panel-body">
            <li><a href="<?php echo $this->createUrl('/person/index'); ?>">PERSON</a></li>
            <li><a href="<?php echo $this->createUrl('#'); ?>">DBPOP</a></li>
            <li><a href="<?php echo $this->createUrl('#'); ?>">ทะเบียนผู้พิการ</a></li>
        </div>
    </div>
    
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">บุคลากร</h3>
        </div>
        <div class="panel-body">
            <li><a href="<?php echo $this->createUrl('labfu/hba1c'); ?>">ข้าราชการ</a></li>
            <li><a href="<?php echo $this->createUrl('labfu/hba1c'); ?>">ลูกจ้าง</a></li>
        </div>
    </div>
    
    
    <div class="panel panel-danger">
        <div class="panel-heading">
            <h3 class="panel-title">การเงิน/งบประมาณ</h3>
        </div>
        <div class="panel-body">
            <li><a href="<?php echo $this->createUrl('labfu/hba1c'); ?>">สถานการณ์เงินบำรุง</a></li>
        </div>
    </div>
    
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">ทรัพยากรและสิ่งปลูกสร้าง</h3>
        </div>
        <div class="panel-body">
            <ul class="list-group">
                <li class="list-group-item"><a href="<?php echo $this->createUrl('labfu/hba1c'); ?>">สถานการณ์เงินบำรุง</a></li>
                <li class="list-group-item">Free Window Space hosting</li>
                <li class="list-group-item">Number of Images</li>
                <li class="list-group-item">24*7 support</li>
                <li class="list-group-item">Renewal cost per year</li>
             </ul>
        </div>
    </div>

    
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title">ตัวชี้วัด/สถิติ</h3>
        </div>
        <div class="panel-body">
            <li><a href="<?php echo $this->createUrl('labfu/hba1c'); ?>">สถิติสาธารณสุข</a></li>
            <li><a href="<?php echo $this->createUrl('labfu/hba1c'); ?>">ตัวชี้วัดกระทรวงสาธารณสุข</a></li>
            <li><a href="<?php echo $this->createUrl('labfu/hba1c'); ?>">ตัวชี้วัดสาธารณสุขระดับเขต </a></li>
            <li><a href="<?php echo $this->createUrl('labfu/hba1c'); ?>">ตัวชี้วัดสาธารณสุขระดับจังหวัด</a></li>
            <li><a href="<?php echo $this->createUrl('labfu/hba1c'); ?>">ตัวชี้วัดสาธารณสุขระดับอำเภอ</a></li>
        </div>
    </div>

    
    <div class="row"> 
<!-- .col-sm-4 -->
    <div class="col-sm-4">
          <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">กิจกรรมบริการ</h3>
        </div>
        <div class="panel-body">
             <li><a href="<?php echo $this->createUrl('chronics/index'); ?>">ระบบงานโรคเรื้อรัง</a></li>
            <li><a href="<?php echo $this->createUrl('labfu/hba1c'); ?>">ผู้ป่วยนอก</a></li>
            <li><a href="<?php echo $this->createUrl('labfu/hba1c'); ?>">ผู้ป่วยใน</a></li>
        </div>
    </div>
    </div>
    <div class="col-sm-8">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title">กิจกรรมบริการ</h3>
            </div>
            <div class="panel-body">
                 <li><a href="<?php echo $this->createUrl('chronics/index'); ?>">ระบบงานโรคเรื้อรัง</a></li>
                <li><a href="<?php echo $this->createUrl('labfu/hba1c'); ?>">ผู้ป่วยนอก</a></li>
                <li><a href="<?php echo $this->createUrl('labfu/hba1c'); ?>">ผู้ป่วยใน</a></li>
            </div>
    </div>
    </div>
</div>   



  
<!--<div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">ระบบงานโรคเรื้อรัง</h3>
        </div>
        <div class="panel-body">
            <li><a href="<?php // echo $this->createUrl('labfu/hba1c'); ?>">อุบัติการณ์/ความชุกโรคเรื้อรัง</a></li>
            <li><a href="<?php // echo $this->createUrl('labfu/hba1c'); ?>">ทะเบียนโรคเรื้อรัง</a></li>
            <li><a href="<?php // echo $this->createUrl('labfu/hba1c'); ?>">การตรวจ HbA1C</a></li>

        </div>
</div>-->


<?php
echo (Yii::app()->controller->id)."/";
echo (Yii::app()->controller->action->id);
    ?>
</div>
