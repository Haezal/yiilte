<?php
$this->breadcrumbs=array(
	'Branchs'=>array('index'),
	'Create Owner',
);

$this->menu=array(
array('label'=>'List Branchs','url'=>array('index')),
array('label'=>'Manage Branchs','url'=>array('admin')),
);
?>

<h1>Create Branchs Owner</h1>

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'branchs-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php 
	$list = CHtml::listData(User::model()->findAll(), 'id', 'username');
	echo $form->dropDownListGroup($model,'user_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'empty'=>'- Pilih -'), 'data'=>$list))); 
	?>

<?php $this->endWidget(); ?>