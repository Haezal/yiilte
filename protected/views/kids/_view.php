<?php
/* @var $this KidsController */
/* @var $data Kids */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fullname')); ?>:</b>
	<?php echo CHtml::encode($data->fullname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</b>
	<?php echo CHtml::encode($data->gender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pics')); ?>:</b>
	<?php echo CHtml::encode($data->pics); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ic')); ?>:</b>
	<?php echo CHtml::encode($data->ic); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('birthplace')); ?>:</b>
	<?php echo CHtml::encode($data->birthplace); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('previous_school')); ?>:</b>
	<?php echo CHtml::encode($data->previous_school); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('mykids')); ?>:</b>
	<?php echo CHtml::encode($data->mykids); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('birthday')); ?>:</b>
	<?php echo CHtml::encode($data->birthday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alergic_to')); ?>:</b>
	<?php echo CHtml::encode($data->alergic_to); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_id')); ?>:</b>
	<?php echo CHtml::encode($data->parent_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('branch_id')); ?>:</b>
	<?php echo CHtml::encode($data->branch_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('changetime')); ?>:</b>
	<?php echo CHtml::encode($data->changetime); ?>
	<br />

	*/ ?>

</div>