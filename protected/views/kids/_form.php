<?php
/* @var $this KidsController */
/* @var $model Kids */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'id'=>'kids-form',
	// 'type'=>'horizontal',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'fullname',array('size'=>60,'maxlength'=>255)); ?>
	
	<?php echo $form->radioButtonListGroup(
		$model,
		'gender',
		array(
			'widgetOptions' => array(
				'data' => array(
					'L'=>'Lelaki',
					'P'=>'Perempuan',
				)
			)
		)
	); ?>
	
	<?php echo $form->textFieldGroup($model,'birthplace',array('size'=>60,'maxlength'=>255)); ?>
	
	<?php echo $form->textAreaGroup($model,'previous_school',array('rows'=>6, 'cols'=>50)); ?>
	
	<?php echo $form->textFieldGroup($model,'mykids',array('size'=>60,'maxlength'=>255)); ?>
	
	<?php echo $form->textFieldGroup($model,'birthday',array('size'=>60,'maxlength'=>255)); ?>
	
	<?php echo $form->textAreaGroup($model,'alergic_to',array('rows'=>6, 'cols'=>50)); ?>

	<?php 
	$list = CHtml::listData(Branchs::model()->findAll(), 'id', 'name');
	echo $form->dropDownListGroup($model,'branch_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'empty'=>'- Pilih -'), 'data'=>$list))); 
	?>

	<?php if (Yii::app()->user->checkAccess('branch_manager') || Yii::app()->user->checkAccess('branch_owner')): ?>
		<?php if ($model->isNewRecord): ?>
			<?php 
			$list = CHtml::listData(User::model()->findAll(), 'id', 'username');
			echo $form->dropDownListGroup($model,'parent_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'empty'=>'- Pilih -'), 'data'=>$list))); 
			?>
		<?php endif ?>

		<?php 
		$list = CHtml::listData(KidStatus::model()->findAll(), 'id', 'name');
		echo $form->dropDownListGroup($model,'status_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'empty'=>'- Pilih -'), 'data'=>$list))); 
		?>
	<?php endif ?>

	
	<?php $this->widget('CMultiFileUpload',array(
		'name'=>'files',
		'accept'=>'jpg|png|gif',
		'max'=>1,
		'remove'=>Yii::t('ui','[Padam]'),
		//'denied'=>'', message that is displayed when a file type is not allowed
		'duplicate'=>'Fail yang sama telah dipilih. Sila pilih fail lain.', // message that is displayed when a file appears twice
		'htmlOptions'=>array('size'=>25),
	)); ?>

	<div class="form-actions" style="margin-top:20px;">
		<?php $this->widget('booster.widgets.TbButton', array(
				'buttonType'=>'submit',
				'context'=>'primary',
				'label'=>$model->isNewRecord ? 'Daftar' : 'Kemaskini',
			)); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->