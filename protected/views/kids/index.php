<?php
/* @var $this KidsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kids',
);

$this->menu=array(
	array('label'=>'Create Kids', 'url'=>array('create')),
	array('label'=>'Manage Kids', 'url'=>array('admin')),
);
?>

<h1>Kids</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
