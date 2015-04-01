<?php
$this->breadcrumbs=array(
	'Invoices',
);

$this->menu=array(
array('label'=>'Create Invoices','url'=>array('create')),
array('label'=>'Manage Invoices','url'=>array('admin')),
);
?>

<h1>Invoices</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
