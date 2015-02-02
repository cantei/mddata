<div id="container1" class="container">
    <div class='well' align="center">
        <form method='get'>
         <select name="vacctype" >
                    <option value="" disabled="disabled" selected="selected">เลือกชนิดวัคซีน</option>
                    <option value="010">BCG</option>
                    <option value="041">HB1</option>
                    <option value="061">MMR1</option>
          </select>
          <button type='submit' class='btn btn-primary'>ประมวลผล</button>
        </form>
    </div>




    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'mseason-grid',
         'dataProvider' => $dataProvider,
       
        'columns' => array(
            array(
                'name' => 'HOSPCODE',
                'header' => 'รหัสตำบล',
                'htmlOptions' => array('style' => 'width:150px;'),
            ),

            array(
                'name' => 'n',
                'header' => 'จำนวน',
                'htmlOptions' => array('style' => 'width:80px;'),
            ),


        ),
    ));
    ?>
</div>