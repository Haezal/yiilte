<?php
$this->breadcrumbs=array(
	'Invoices'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Invoices','url'=>array('index')),
array('label'=>'Create Invoices','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('invoices-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<div class="box box-danger">
    <div class="box-header">
        <h3 class="box-title"><?php echo BaseFunctions::icon('th-list') ?> Senarai Invois</h3>
    </div><!-- end box-header -->
    <div class="box-body no-padding table-responsive">
		<?php $this->widget('booster.widgets.TbGridView',array(
			'id'=>'invoices-grid',
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
		       		'name'=>'invoice_type_id',
		       		'value'=>'(isset($data->invoiceType))? $data->invoiceType->name:""',
		       	), 
		       	array(
		       		'name'=>'from_id', 
		       		'value'=>'(isset($data->from))? $data->from->profile->first_name:""',
		       	),
		       	array(
		       		'name'=>'to_id', 
		       		'value'=>'(isset($data->to))? $data->to->profile->first_name:""',
		       	),
				'rm_total',
				array(
					'name'=>'status', 
					'value'=>'(isset($data->invoiceStatus))?$data->invoiceStatus->name:""',
				),
				/*
				'resit_details',
				'other_details',
				'remarks',
				'timestamp',
				'kid_id',
				*/
				array(
					'class'=>'CButtonColumn',
					'template'=>'{payment}',
					'buttons'=>array(
						'payment'=>array(
							'label'=>'Kemaskini Pembayaran', 
							'url'=>'Yii::app()->createUrl("/invoices/payment", array("id"=>$data->id))',
							'options'=>array('class'=>'btn btn-success btn-sm'),
							'visible'=>'($data->status==1 || $data->status==5)'
						),
					),
					'visible'=>Yii::app()->user->checkAccess("parent"), 
				),
				array(
					'class'=>'CButtonColumn',
					'template'=>'{lihat}',
					'buttons'=>array(
						'lihat'=>array(
							'label'=>'Lihat', 
							'url'=>'Yii::app()->createUrl("/invoices/view", array("id"=>$data->id))',
							'options'=>array('class'=>'btn btn-primary btn-sm'),
						),
					),
				),
			),
		)); ?>
	</div>
</div>
<?php echo CHtml::link('Senarai Anak', array('/kids/admin'), array('class'=>'btn btn-primary')); ?>
