<?php
$this->breadcrumbs=array(
	'Senarai Tadika',
);

$this->menu=array(
array('label'=>'List Branchs','url'=>array('index'), 'visible'=>Yii::app()->user->checkAccess('Administrator')),
array('label'=>'Create Branchs','url'=>array('create'), 'visible'=>Yii::app()->user->checkAccess('Administrator')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('branchs-grid', {
data: $(this).serialize()
});
return false;
});
");
?>


<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:block">
	<div class="box box-success">
		<div class="box-header">
			<h3 class="box-title">Carian</h3>
		</div>
		<div class="box-body">
			<?php $this->renderPartial('_search',array(
				'model'=>$model,
			)); ?>
		</div>
	</div>
</div><!-- search-form -->

<div class="box box-danger">
	<div class="box-header">
		<h3 class="box-title">Senarai Tadika</h3>
		<div class="box-tools pull-right">
			<!-- Buttons, labels, and many other things can be placed here! -->
			<?php echo CHtml::link(BaseFunctions::icon('plus').' Daftar Tadika', array('/branchs/create'), array('class'=>'btn btn-primary btn-lg')) ?>
	    </div><!-- /.box-tools -->
	</div>
	<div class="box-body no-padding table-responsive">
		<?php $this->widget('booster.widgets.TbGridView',array(
			'type'=>'bordered striped',
			'id'=>'branchs-grid',
			'dataProvider'=>$model->search(),
			// 'filter'=>$model,
			'columns'=>array(
				array(
					'header'=>'Bil',
		           	'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',       //  row is zero based
		           	'htmlOptions'=>array('style'=>'width:30px;'),
		       	),
				'name',
				array(
					'name'=>'owner_id',
					'type'=>'raw',
					'value'=>'(isset($data->branchOwners))? CHtml::link($data->branchOwners->user->profile->first_name, array("user/profile", "id"=>$data->branchOwners->user->id)):""',
				),
				'capacity',
				'fees',
				array(
					'name'=>'brand_id', 
					'value'=>'(isset($data->brand))?$data->brand->name:""',
				),
				'tel',
				array(
					'htmlOptions'=>array('nowrap'=>'nowrap'),
					'class'=>'CButtonColumn',
					'template'=>'{view} {update} {student} {invoice}',
					'buttons'=>array(
						'student'=>array(
							'label'=>'Pelajar',
							'options'=>array('class'=>'btn btn-primary btn-sm'),
							// 'visible'=>'Yii::app()->user->checkAccess("parent")',
							'url'=>'Yii::app()->createUrl("/kids/byBranchs", array("id"=>$data->id))',
						),
						'invoice'=>array(
							'label'=>'Invoice',
							'options'=>array('class'=>'btn btn-primary btn-sm'),
							// 'visible'=>'Yii::app()->user->checkAccess("parent")',
							'url'=>'Yii::app()->createUrl("/invoices/byBranchs", array("id"=>$data->id))',
						),
						'update'=>array(
							'label'=>'Kemaskini', 
							'imageUrl' => false,
							'options'=>array('class'=>'btn btn-success btn-sm'),
						),
						'view'=>array(
							'label'=>'Lihat Tadika', 
							'imageUrl' => false,
							'options'=>array('class'=>'btn btn-warning btn-sm'),
						),
					),
				),
				array(
					'class'=>'booster.widgets.TbButtonColumn',
					'template'=>'{delete}',
					'buttons'=>array('delete'=>array('visible'=>'Yii::app()->getModule("user")->isAdmin()')),
				),
			),
		)); ?>
	</div>
</div>