<?php
$this->breadcrumbs=array(
	'Branchs'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Branchs','url'=>array('index')),
	array('label'=>'Create Branchs','url'=>array('create')),
	array('label'=>'View Branchs','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Branchs','url'=>array('admin')),
	);
	?>

	<h1>Update Branchs <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model, 'owner'=>$owner)); ?>