<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'branchs-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary(array($model, $owner)); ?>

	<?php echo $form->textFieldGroup($model,'name',array('widgetOptions'=>array('htmlOptions'=>array('maxlength'=>255)))); ?>

	<?php //echo $form->textFieldGroup($model,'owner_id',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

	<?php echo $form->textFieldGroup($model,'capacity',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

	<?php echo $form->textFieldGroup($model,'fees',array('widgetOptions'=>array('htmlOptions'=>array('maxlength'=>255)))); ?>

	<?php 
	$list = CHtml::listData(Brands::model()->findAll(), 'id', 'name');
	echo $form->dropDownListGroup($model,'brand_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'empty'=>'- Pilih -'), 'data'=>$list))); 
	?>
	<?php 
	$list = CHtml::listData(User::model()->findAll(), 'id', 'username');
	echo $form->dropDownListGroup($owner,'user_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'empty'=>'- Pilih -'), 'data'=>$list))); 
	?>

	<?php echo $form->textAreaGroup($model,'address', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50)))); ?>

	<?php echo $form->textFieldGroup($model,'city',array('widgetOptions'=>array('htmlOptions'=>array('maxlength'=>40)))); ?>

	<?php echo $form->textFieldGroup($model,'state',array('widgetOptions'=>array('htmlOptions'=>array('maxlength'=>3)))); ?>

	<?php echo $form->textAreaGroup($model,'gmaps', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50)))); ?>

	<?php echo $form->textAreaGroup($model,'description', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50)))); ?>

	<?php echo $form->textFieldGroup($model,'changetime',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

	<?php echo $form->textFieldGroup($model,'tel',array('widgetOptions'=>array('htmlOptions'=>array('maxlength'=>255)))); ?>

	<?php echo $form->textFieldGroup($model,'latlong',array('widgetOptions'=>array('htmlOptions'=>array('maxlength'=>40)))); ?>

	<?php echo $form->textFieldGroup($model,'status',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

	<?php echo $form->textFieldGroup($model,'image',array('widgetOptions'=>array('htmlOptions'=>array('maxlength'=>40)))); ?>

	<?php echo $form->textFieldGroup($model,'account',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

	<?php echo $form->textFieldGroup($model,'bank',array('widgetOptions'=>array('htmlOptions'=>array('maxlength'=>20)))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
