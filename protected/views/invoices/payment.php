<?php
$this->pageTitle=Yii::app()->name. ' - Kemaskini Maklumat Pembayaran';
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

<?php echo $this->renderPartial('_payment',array('model'=>$model)); ?>