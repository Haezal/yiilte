<?php
$this->breadcrumbs=array(
	'Invoices'=>array('index'),
	'Kemaskini Pembayaran', 
);

	$this->menu=array(
	array('label'=>'List Invoices','url'=>array('index')),
	array('label'=>'Create Invoices','url'=>array('create')),
	array('label'=>'View Invoices','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Invoices','url'=>array('admin')),
	);
	?>

	<h1>Kemaskini Penerimaan Pembayaran</h1>

	<?php if ($status=='Y'): ?>
		<div class="alert alert-success">
			<p>Maklumat pembayaran <b>DITERIMA</b></p>
		</div>
	<?php else: ?>
		<div class="alert alert-danger">
			<p>Maklumat pembayaran <b>DITOLAK</b></p>
		</div>
	<?php endif ?>

<?php echo $this->renderPartial('_formApproval',array('model'=>$model)); ?>