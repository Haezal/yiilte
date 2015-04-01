<?php
/* @var $this BranchManagersController */
/* @var $model BranchManagers */

$this->breadcrumbs=array(
	'Branch Managers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BranchManagers', 'url'=>array('index')),
	array('label'=>'Create BranchManagers', 'url'=>array('create')),
	array('label'=>'View BranchManagers', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BranchManagers', 'url'=>array('admin')),
);
?>

<h1>Update BranchManagers <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>