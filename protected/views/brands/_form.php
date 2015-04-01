<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'brands-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'name',array('widgetOptions'=>array('htmlOptions'=>array('maxlength'=>255)))); ?>

	<?php echo $form->fileFieldGroup($model,'logo',array('widgetOptions'=>array('htmlOptions'=>array('maxlength'=>255)))); ?>

	<?php //echo $form->textFieldGroup($model,'owner_id',array('widgetOptions'=>array('htmlOptions'=>array('maxlength'=>255)))); ?>

	<?php echo $form->textAreaGroup($model,'description', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50)))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
