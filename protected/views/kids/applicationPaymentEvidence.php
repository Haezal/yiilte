<?php
/* @var $this KidsController */
/* @var $model Kids */

$this->breadcrumbs=array(
	'Kids'=>array('index'),
	'Kemaskini Pembayaran',
);

$this->menu=array(
	array('label'=>'Senarai Anak', 'url'=>array('admin')),
	array('label'=>'Create Kids', 'url'=>array('create'), 'visible'=>Yii::app()->user->checkAccess('parent')),
);
?>