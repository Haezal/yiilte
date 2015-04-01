<?php
$this->breadcrumbs=array(
	'Brands',
);

$this->menu=array(
array('label'=>'Create Brands','url'=>array('create')),
array('label'=>'Manage Brands','url'=>array('admin')),
);
?>

<h1>Brands</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
