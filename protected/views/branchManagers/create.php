<?php
/* @var $this BranchManagersController */
/* @var $model BranchManagers */

$this->breadcrumbs=array(
	'Branch Managers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BranchManagers', 'url'=>array('index')),
	array('label'=>'Manage BranchManagers', 'url'=>array('admin')),
);
?>

<h1>Create BranchManagers</h1>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$branch,
	'attributes'=>array(
		'name',
	),
)); ?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>