<?php
$this->breadcrumbs=array(
	'Branchs'=>array('index'),
	$model->name,
);

$this->menu=array(
// array('label'=>'List Branchs','url'=>array('index')),
array('label'=>'Create Branchs','url'=>array('create'), 'visible'=>Yii::app()->user->checkAccess('Administrator')),
array('label'=>'Update Branchs','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Branchs','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'), 'visible'=>Yii::app()->user->checkAccess('Administrator')),
array('label'=>'Manage Branchs','url'=>array('admin')),
array('label'=>'Add Manager','url'=>array('branchManagers/index', 'id'=>$model->id)),
array('label'=>'Add Teacher','url'=>array('branchTeachers/index', 'id'=>$model->id)),
);
?>

<h1>View Branchs #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'name',
		'branchOwners.user_id',
		'capacity',
		'fees',
		'brand_id',
		'address',
		'city',
		'state',
		'gmaps',
		'description',
		'changetime',
		'tel',
		'latlong',
		'status',
		'image',
		'account',
		'bank',
),
)); ?>
