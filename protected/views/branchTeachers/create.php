<?php
/* @var $this BranchTeachersController */
/* @var $model BranchTeachers */

$this->breadcrumbs=array(
	'Branch Teachers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BranchTeachers', 'url'=>array('index')),
	array('label'=>'Manage BranchTeachers', 'url'=>array('admin')),
);
?>

<h1>Create BranchTeachers</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>