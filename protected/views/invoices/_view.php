<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('invoice_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->invoice_type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('to_id')); ?>:</b>
	<?php echo CHtml::encode($data->to_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('from_id')); ?>:</b>
	<?php echo CHtml::encode($data->from_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rm_total')); ?>:</b>
	<?php echo CHtml::encode($data->rm_total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('resit_details')); ?>:</b>
	<?php echo CHtml::encode($data->resit_details); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('other_details')); ?>:</b>
	<?php echo CHtml::encode($data->other_details); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remarks')); ?>:</b>
	<?php echo CHtml::encode($data->remarks); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('timestamp')); ?>:</b>
	<?php echo CHtml::encode($data->timestamp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kid_id')); ?>:</b>
	<?php echo CHtml::encode($data->kid_id); ?>
	<br />

	*/ ?>

</div>
