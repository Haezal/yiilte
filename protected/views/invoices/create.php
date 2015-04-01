<?php
$this->breadcrumbs=array(
	'Invoices'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Invoices','url'=>array('index')),
array('label'=>'Manage Invoices','url'=>array('admin')),
);
?>

<h1>Create Invoices</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>