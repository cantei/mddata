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
            <li><a href="<?php echo $this->createUrl('vaccined/performance'); ?>">DBPOP</a></li>
            <li><a href="<?php echo $this->createUrl('vaccined/performance'); ?>">ทะเบียนผู้พิการ</a></li>
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
            <li><a href="<?php echo $this->createUrl('/person/index'); ?>">พัสดุ</a></li>
            <li><a href="<?php echo $this->createUrl('vaccined/performance'); ?>">สิ่งปลูกสร้าง</a></li>
        </div>
    </div>


    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">กิจกรรมบริการ</h3>
        </div>
        <div class="panel-body">
             <li><a href="<?php echo $this->createUrl('labfu/hba1c'); ?>">ระบบงานโรคเรื้อรัง</a></li>
            <li><a href="<?php echo $this->createUrl('labfu/hba1c'); ?>">ผู้ป่วยนอก</a></li>
            <li><a href="<?php echo $this->createUrl('labfu/hba1c'); ?>">ผู้ป่วยใน</a></li>
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
<!--   

<script>
function install(){
    document.form1.submit(); // เก็บตัวแปรหลังกดsubmit โดยค่าจะถูกส่งไป Site/Index.php
}

</script>


<div class="panel panel-primary">
    <div class="panel-heading">Install</div>
    <div class="panel-body">
        <form name="form1" method="POST" class="form-inline">
            <div>
                <label>Host</label>
                <input type="text" name="host" class="form-control"
                       style="width: 200px" />
            </div>
            <div>
                <label>Username</label>
                <input type="text" name="username" class="form-control"
                       style="width: 200px" />
            </div>
            <div>
                <label>Password</label>
                <input type="text" name="password" class="form-control"
                       style="width: 200px" />
            </div>
            <div>
                <label>Database</label>
                <input type="text" name="database" class="form-control"
                       style="width: 200px" />
            </div>
            <div>
                <label></label>
                <a href="#" class="btn btn-primary" onclick="install()">
                    Install Now
                </a>
            </div> 
        </form>
    </div>
</div>

-->