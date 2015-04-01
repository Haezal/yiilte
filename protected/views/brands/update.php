<?php
$this->breadcrumbs=array(
	'Brands'=>array('admin'),
	'Kemaskini Branding',
);

$this->menu=array(
	array('label'=>'Create Brands','url'=>array('create')),
	array('label'=>'View Brands','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Brands','url'=>array('admin')),
	);
?>

<div class="box box-danger">
	<div class="box-header">
		<h3 class="box-title">Kemaskini Branding</h3>
	</div>
	<div class="box-body">
		<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>