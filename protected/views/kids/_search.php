<?php
/* @var $this KidsController */
/* @var $model Kids */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<!-- first row -->
<?php if (Yii::app()->user->checkAccess('branch_owner')): ?>
	
	<div class="row">
		<div class="col-md-12">
			<?php 
			$list = CHtml::listData(Branchs::model()->findAllByAttributes(array('id'=>$branch_id)), 'id', 'name');
			echo $form->dropDownListGroup($model,'branch_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'empty'=>'- Pilih -'), 'data'=>$list))); 
			?>
		</div><!-- end col -->
	</div><!-- end row -->
<?php endif ?>

<div class="row">
	<div class="col-md-12">
		<?php echo $form->textFieldGroup($model,'fullname',array('size'=>60,'maxlength'=>255)); ?>
	</div><!-- end col -->
</div><!-- end row -->
<div class="row">
	<div class="col-md-6">
		<?php echo $form->textFieldGroup($model,'mykids',array('size'=>60,'maxlength'=>255)); ?>
	</div><!-- end col -->
	<div class="col-md-6">
		<?php 
		$list = CHtml::listData(KidStatus::model()->findAll(), 'id', 'name');
		echo $form->dropDownListGroup($model,'status_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'empty'=>'- Pilih -'), 'data'=>$list))); 
		?>
	</div><!-- end col -->
</div><!-- end row -->

	<div class="form-actions">
		<?php echo CHtml::submitButton('Carian', array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>
