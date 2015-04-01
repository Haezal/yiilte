<?php
/* @var $this BranchManagersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Branch Teachers',
);

$this->menu=array(
	array('label'=>'View Branch ', 'url'=>array('/branchs/view', 'id'=>$branch->id)),
	array('label'=>'Manage Branch Teachers', 'url'=>array('admin'), 'visible'=>Yii::app()->user->checkAccess('Administrator')),
);

Yii::app()->clientScript->registerScript('add_user', "
$('.btn_add_new_user').click(function(){

	$('.add_new_user').toggle();
	return false;
});
");
?>

<h1>Branch Teachers</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$branch,
	'attributes'=>array(
		'name',
	),
)); ?>

<?php /*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); */?>
<?php $this->widget('booster.widgets.TbGridView', array(
	'id'=>'branch-managers-grid',
	'type'=>'bordered striped condensed',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'columns'=>array(
		array(
			'header'=>'Bil',
           	'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',       //  row is zero based
           	'htmlOptions'=>array('style'=>'width:30px;'),
       	),
		array(
			'name'=>'user_id', 
			'value'=>'(isset($data->user->profile->first_name))? $data->user->profile->first_name:""'
		),
		array(
			'header'=>'email', 
			'value'=>'(isset($data->user->email))? $data->user->email:""'
		),
		array(
			'header'=>'No KWSP', 
			'value'=>'(isset($data->user->profile->no_kwsp))? $data->user->profile->no_kwsp:""'
		),
		array(
			'header'=>'Gaji', 
			'value'=>'(isset($data->user->profile->salary))? $data->user->profile->salary:""'
		),
		array(
			'class'=>'booster.widgets.TbButtonColumn',
			'template'=>'{delete}',
		),
	),
)); ?>

<?php //echo CHtml::link('Add new user','#',array('class'=>'btn_add_new_user')); ?>

<div class="add_new_user" style="display:block;">
<hr style="border:1px solid #000">
	<!-- Add new user -->
	<h4>Add new user</h4>
	<?php $this->renderPartial('_formUser', array('user'=>$user, 'profile'=>$profile)) ?>
</div>

