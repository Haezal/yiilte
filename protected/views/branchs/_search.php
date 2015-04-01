<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<div class="row">
	<div class="col-md-5">
		<?php echo $form->textFieldGroup($model,'name',array('widgetOptions'=>array('htmlOptions'=>array('maxlength'=>255)))); ?>
	</div>
	<div class="col-md-5">
		<?php echo $form->textFieldGroup($model,'state',array('widgetOptions'=>array('htmlOptions'=>array('maxlength'=>3)))); ?>
	</div>
	<div class="col-md-2">
		<div style="margin-top:25px;">
			<?php $this->widget('booster.widgets.TbButton', array(
				'buttonType' => 'submit',
				'context'=>'primary',
				'icon'=>'search',
				'label'=>'Cari',
			)); ?>
		</div>
	</div>
</div>



<?php $this->endWidget(); ?>
