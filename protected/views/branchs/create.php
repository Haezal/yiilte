<?php
$this->breadcrumbs=array(
	'Branchs'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Branchs','url'=>array('index')),
array('label'=>'Manage Branchs','url'=>array('admin')),
);
?>

<h1>Create Branchs</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'owner'=>$owner)); ?>