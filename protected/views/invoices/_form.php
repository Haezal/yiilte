<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'invoices-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'invoice_type_id',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

	<?php echo $form->textFieldGroup($model,'to_id',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

	<?php echo $form->textFieldGroup($model,'from_id',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

	<?php echo $form->textFieldGroup($model,'rm_total',array('widgetOptions'=>array('htmlOptions'=>array('maxlength'=>19)))); ?>

	<?php echo $form->textAreaGroup($model,'resit_details', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50)))); ?>

	<?php echo $form->textAreaGroup($model,'other_details', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50)))); ?>

	<?php echo $form->textAreaGroup($model,'remarks', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50)))); ?>

	<?php 
	$list = CHtml::listData(InvoiceStatus::model()->findAll(), 'id', 'name');
	echo $form->dropDownListGroup($model,'status',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'empty'=>'- Pilih -'), 'data'=>$list))); 
	?>

	<?php //echo $form->textFieldGroup($model,'status',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

	<?php //echo $form->textFieldGroup($model,'timestamp',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

	<?php //echo $form->textFieldGroup($model,'kid_id',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
