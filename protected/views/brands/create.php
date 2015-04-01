<?php
$this->breadcrumbs=array(
	'Brands'=>array('admin'),
	'Tambah Branding',
);

$this->menu=array(
	array('label'=>'Senarai Branding','url'=>array('admin'), 'icon'=>'th-list'),
);
?>

<div class="box box-danger">
	<div class="box-header">
		<h3 class="box-title">Tambah Branding</h3>
	</div>
	<div class="box-body">
		<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>