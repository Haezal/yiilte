<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldGroup($model,'id',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

		<?php echo $form->textFieldGroup($model,'title',array('widgetOptions'=>array('htmlOptions'=>array('maxlength'=>255)))); ?>

		<?php echo $form->textFieldGroup($model,'invoice_type_id',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

		<?php echo $form->textFieldGroup($model,'to_id',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

		<?php echo $form->textFieldGroup($model,'from_id',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

		<?php echo $form->textFieldGroup($model,'rm_total',array('widgetOptions'=>array('htmlOptions'=>array('maxlength'=>19)))); ?>

		<?php echo $form->textAreaGroup($model,'resit_details', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50)))); ?>

		<?php echo $form->textAreaGroup($model,'other_details', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50)))); ?>

		<?php echo $form->textAreaGroup($model,'remarks', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50)))); ?>

		<?php echo $form->textFieldGroup($model,'status',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

		<?php echo $form->textFieldGroup($model,'timestamp',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

		<?php echo $form->textFieldGroup($model,'kid_id',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType' => 'submit',
			'context'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
