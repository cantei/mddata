<div class="view">
 
    <li><?php echo CHtml::encode($data->getAttributeLabel('HOSPCODE')); ?>:
    <?php echo CHtml::link(CHtml::encode($data->HOSPCODE), array('view', 'id'=>$data->HOSPCODE)); ?>
    </li>
 <tr>
    <?php echo CHtml::encode($data->getAttributeLabel('PID')); ?>:
    <?php echo CHtml::encode($data->PID); ?>
    <?php echo $data->PID; ?>
    
  </tr>
 <tr>

    <?php echo CHtml::encode($data->getAttributeLabel('SEX')); ?>:
    <?php echo CHtml::encode($data->SEX); ?>
   
     </tr>
 <tr>

    <?php echo CHtml::encode($data->getAttributeLabel('BIRTH')); ?>:
    <?php echo CHtml::encode($data->BIRTH); ?>
   
  </tr>

    
 
 
</div>