<?php
/* @var $this BranchManagersController */
/* @var $model BranchManagers */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'id'=>'branch-managers-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<?php 
	$list = CHtml::listData(User::model()->findAll(), 'id', 'username');
	echo $form->dropDownListGroup($model,'user_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'empty'=>'- Pilih -'), 'data'=>$list))); 
	?>

	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
				'buttonType'=>'submit',
				'context'=>'primary',
				'label'=>$model->isNewRecord ? 'Create' : 'Save',
			)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->