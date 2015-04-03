<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>
<div class="box box-primary box-solid">
	<div class="box-header">
		<h3 class="box-title">Contact Us</h3>
	</div>
	<div class="box-body">
		<?php if(Yii::app()->user->hasFlash('contact')): ?>

		<div class="flash-success">
			<?php echo Yii::app()->user->getFlash('contact'); ?>
		</div>

		<?php else: ?>

		<p>
		If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
		</p>

		<div class="row">
			<div class="col-md-12">
				<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
					'id'=>'contact-form',
					'type'=>'horizontal',
					'enableClientValidation'=>true,
					'clientOptions'=>array(
						'validateOnSubmit'=>true,
					),
				)); ?>

					<p class="note">Fields with <span class="required">*</span> are required.</p>

					<?php echo $form->errorSummary($model); ?>

						<?php echo $form->textFieldGroup($model,'name'); ?>
						<?php echo $form->textFieldGroup($model,'email'); ?>
						<?php echo $form->textFieldGroup($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
						<?php echo $form->textAreaGroup($model,'body',array('rows'=>6, 'cols'=>50)); ?>
					

					<?php if(CCaptcha::checkRequirements()): ?>
					
					<div class="form-group">
						<label class="control-label col-md-4">&nbsp;</label>
						<div>
						
						<?php $this->widget('CCaptcha'); ?>
						</div>
					</div>
						<?php echo $form->textFieldGroup($model,'verifyCode'); ?>
						<div class="alert alert-info">Please enter the letters as they are shown in the image above.
						<br/>Letters are not case-sensitive.</div>

					<?php endif; ?>

					<div class="form-actions">
						<div class="col-md-offset-3">
							<?php echo CHtml::submitButton('Submit', array('class'=>'btn btn-primary')); ?>
						</div>
					</div>

				<?php $this->endWidget(); ?>
			</div>
		</div><!-- row -->

		<?php endif; ?>
	</div>
</div>
		