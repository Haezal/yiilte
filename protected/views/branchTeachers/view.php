<?php
/* @var $this BranchTeachersController */
/* @var $model BranchTeachers */

$this->breadcrumbs=array(
	'Branch Teachers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List BranchTeachers', 'url'=>array('index')),
	array('label'=>'Create BranchTeachers', 'url'=>array('create')),
	array('label'=>'Update BranchTeachers', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BranchTeachers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BranchTeachers', 'url'=>array('admin')),
);
?>

<h1>View BranchTeachers #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'branch_id',
		'user_id',
	),
)); ?>
