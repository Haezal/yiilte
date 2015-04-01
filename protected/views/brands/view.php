<?php
$this->breadcrumbs=array(
	'Brands'=>array('index'),
	$model->name,
);

$this->menu=array(
array('label'=>'Create Brands','url'=>array('create')),
array('label'=>'Update Brands','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Brands','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Brands','url'=>array('admin')),
);
?>

<div class="row">
	<div class="col-md-3">
		<?php 
		$baseUrl=Yii::app()->request->baseUrl; 
		$path = 'upload/brandLogo/'.$model->id.'/'.$model->logo;
		

		if(!file_exists($path)){
			$filePath = $baseUrl.'/images/no-images.png';
		}
		else{
			$filePath = $baseUrl.'/'.$path;
		}

		?>

		<img src="<?php echo $filePath ?>" class="img-thumbnail">
	</div>
	<div class="col-md-9">
		<h1><?php echo $model->name; ?></h1>
		<?php echo $model->description ?>
	</div>
</div>

<div class="box box-danger" style="margin-top:20px;">
	<div class="box-header">
		<h3 class="box-title">Senarai Tadika</h3>
	</div>
	<div class="box-body no-padding table-responsive">
		<?php $this->widget('booster.widgets.TbGridView',array(
			'type'=>'bordered striped',
			'id'=>'branchs-grid',
			'dataProvider'=>$branchs->search(),
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
			),
		)); ?>
	</div>
</div>