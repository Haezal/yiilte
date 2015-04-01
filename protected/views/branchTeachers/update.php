<?php
/* @var $this BranchTeachersController */
/* @var $model BranchTeachers */

$this->breadcrumbs=array(
	'Branch Teachers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BranchTeachers', 'url'=>array('index')),
	array('label'=>'Create BranchTeachers', 'url'=>array('create')),
	array('label'=>'View BranchTeachers', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BranchTeachers', 'url'=>array('admin')),
);
?>

<h1>Update BranchTeachers <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>