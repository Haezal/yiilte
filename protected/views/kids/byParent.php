<?php
/* @var $this KidsController */
/* @var $model Kids */

$this->breadcrumbs=array(
	'Kids'=>array('index'),
	'Manage',
);

$this->menu=array(
	// array('label'=>'List Kids', 'url'=>array('index')),
	array('label'=>'Create Kids', 'url'=>array('create'), 'visible'=>Yii::app()->user->checkAccess('parent'), 'icon'=>'plus'),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#kids-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php if (!Yii::app()->user->checkAccess('parent')): ?>
	<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
	<div class="search-form" style="display:block">
	<?php $this->renderPartial('_search',array(
		'model'=>$model,
	)); ?>
	</div><!-- search-form -->
<?php endif ?>


<div class="box box-danger">
    <div class="box-header">
        <h3 class="box-title">Senanai Anak</h3>
    </div><!-- end box-header -->
    <div class="box-body table-responsive no-padding">
		<?php $this->widget('booster.widgets.TbGridView', array(
			'id'=>'kids-grid',
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
		       		'name'=>'fullname',		
					'type'=>'raw',
					'value' => 'CHtml::link(UHtml::markSearch($data,"fullname"),array("kids/view","id"=>$data->id))',
		       	),
				array(
					'name'=>'gender',
					'value'=>'($data->gender=="L")?"Lelaki":"Perempuan"',
				),
				'mykids',
				'birthplace',
				array(
					'name'=>'branch_id', 
					'value'=>'(isset($data->branch->name))? $data->branch->name:""',
				),
				array(
					'name'=>'status_id', 
					'value'=> '(isset($data->kidStatus)) ? $data->kidStatus->name:""',
				),
				array(
					'class'=>'CButtonColumn',
					'template'=>'{invoice}',
					'buttons'=>array(
						'invoice'=>array(
							'label'=>'Invoice',
							'options'=>array('class'=>'btn btn-primary btn-sm'),
							// 'visible'=>'Yii::app()->user->checkAccess("parent")',
							'url'=>'Yii::app()->createUrl("/invoices/byKids", array("id"=>$data->id))',
							'visible'=>'$data->status_id!=1',
						),
					),
				),
				array(
					'class'=>'booster.widgets.TbButtonColumn',
				),
			),
		)); ?>
	</div>
</div>