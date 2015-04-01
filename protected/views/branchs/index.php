<?php
$this->breadcrumbs=array(
	'Branchs',
);

$this->menu=array(
array('label'=>'Create Branchs','url'=>array('create'), 'visible'=>Yii::app()->user->checkAccess('Administrator')),
array('label'=>'Manage Branchs','url'=>array('admin'), 'visible'=>Yii::app()->user->checkAccess('Administrator')),
);
?>

<h1>Branchs</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
