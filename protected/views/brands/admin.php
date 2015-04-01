<?php
$this->breadcrumbs=array(
	'Branding'
);

$this->menu=array(
	array('label'=>'Tambah Branding','url'=>array('create'), 'icon'=>'plus'),
);

Yii::app()->clientScript->registerScript('search', "
	$('.search-button').click(function(){
		$('.search-form').toggle();
			return false;
	});

	$('.search-form form').submit(function(){
		$.fn.yiiGridView.update('brands-grid', {
		data: $(this).serialize()
		});
		return false;
	});
");
?>

<div class='box box-danger'>
	<div class='box-header'>
		<h3 class='box-title'>Branding</h3>
	</div>
	<div class='box-body no-padding table-responsive'>
		<?php $this->widget('booster.widgets.TbGridView',array(
			'id'=>'brands-grid',
			'type'=>'bordered condensed',
			'dataProvider'=>$model->search(),
			// 'filter'=>$model,
			'columns'=>array(
				array(
					'header'=>'Bil',
		           	'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',       //  row is zero based
		           	'htmlOptions'=>array('style'=>'width:30px;'),
		       	),
				'name',
				'owner_id',
				'description',
				array(
					'header'=>'Bil Tadika', 
					'type'=>'raw',
					'value'=>'BaseFunctions::totalBranchs($data->id)',
					'htmlOptions'=>array('style'=>'text-align:center;'), 
				),
				array(
					'class'=>'booster.widgets.TbButtonColumn',
				),
			),
		)); ?>
	</div>
</div>
