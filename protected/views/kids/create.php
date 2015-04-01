<?php
/* @var $this KidsController */
/* @var $model Kids */

$this->breadcrumbs=array(
	'Kids'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Kids', 'url'=>array('index')),
	array('label'=>'Manage Kids', 'url'=>array('admin')),
);
?>

<div class="box box-solid box-default">
    <div class="box-header">
        <h3 class="box-title">Daftar Anak</h3>
    </div><!-- end box-header -->
    <div class="box-body">
		<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>