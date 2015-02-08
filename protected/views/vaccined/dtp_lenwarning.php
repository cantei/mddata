
<div id="container1" class="container">
<h4 align="center"><?php  // echo "การได้รับวัคซีน"."  ".$vaccinetype."เร็วกว่าอายุที่กำหนด" ; ?></h4>
<h5 align="center"><?php  // echo $msg;?></h5>

<hr>
    
        <form method='post'>
          <select name="vaccinename" style="height:34px;width:120px" >
                        <option value="" disabled="disabled" selected="selected">เลือกชนิดวัคซีน</option>
                    <option value="01">DHBV</option>
                    <option value="02">JE</option>
                    <option value="03">DTP</option>
          </select>
          <button type='submit' class='btn btn-primary'>ประมวลผล</button>
        </form>
 

<hr>


    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'mseason-grid',
        'dataProvider' => $dataProvider,

       
        'columns' => array(
            
            array(
                'name' => 'HOSPCODE',
                'header' => 'รหัสหน่วยบริการ',
                
            ),
            array(
                'name' => 'hosname',
                'header' => 'หน่วยบริการ',
           
            ),
            array(
                'name' => 'lendtp',
                'header' => 'จำนวน',
                
            ),


        ),
    ));
    ?>
</div>
<?php // echo $sql;?>
