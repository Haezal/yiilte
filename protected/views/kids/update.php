<?php
/* @var $this KidsController */
/* @var $model Kids */

$this->breadcrumbs=array(
	'Kids'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Kids', 'url'=>array('index')),
	array('label'=>'Create Kids', 'url'=>array('create')),
	array('label'=>'View Kids', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Kids', 'url'=>array('admin')),
);
?>

<div class="box box-solid box-default">
    <div class="box-header">
        <h3 class="box-title">Kemaskini Maklumat Anak (<?php echo $model->fullname ?>)</h3>
    </div><!-- end box-header -->
    <div class="box-body">
		<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>