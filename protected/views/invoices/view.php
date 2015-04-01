<?php
$this->breadcrumbs=array(
	'Invoices'=>array('index'),
	$model->title,
);

$this->menu=array(
array('label'=>'List Invoices','url'=>array('index')),
array('label'=>'Create Invoices','url'=>array('create')),
array('label'=>'Update Invoices','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Invoices','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Invoices','url'=>array('admin')),
);
?>
<div class="row">
	<div class="col-md-4">	
		<div class="box box-danger">
			<div class="box-header">
				<h3 class="box-title">Invois</h3>
			</div>
			<div class="box-body">
				<div class="alert alert-warning">
					<h3>RM <?php echo $model->rm_total; ?></h3>
				</div>
				<?php $this->widget('booster.widgets.TbDetailView',array(
				'data'=>$model,
				'type'=>'condensed',
				'attributes'=>array(
						'invoiceType.name',
						array(
							'name'=>'Kepada',
							'value'=>(isset($model->to->profile->first_name))?$model->to->profile->first_name:"",
						),
						array(
							'name'=>'Daripada',
							'value'=>(isset($model->from->profile->first_name))?$model->from->profile->first_name:"",
						),
						'invoiceStatus.name',
						array(
							'name'=>'Nama Murid', 
							'type'=>'raw',
							'value'=>CHtml::link($model->kid->fullname, array('kids/view', 'id'=>$model->kid_id)),
						),
				),
				)); ?>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Maklumat Pembayaran</h3>
			</div>
			<div class="box-body no-padding">
				<?php $this->widget('booster.widgets.TbDetailView',array(
				'data'=>$model,
				'type'=>'condensed',
				'attributes'=>array(
						'resit_details',
						'other_details',
				),
				)); ?>
			</div>
		</div>
	</div>
	<?php if (Yii::app()->user->checkAccess('branch_manager') || Yii::app()->user->checkAccess('branch_owner')): ?>
		<div class="col-md-4">
			<div class="box box-success">
				<div class="box-header">
					<h3 class="box-title">Penerimaan Pembayaran</h3>
				</div><!-- end box-header -->
				<div class="box-body">
					<?php if ($model->status==2 || $model->status==4){ ?>
						<!-- papar hanya yang status diterima atau ditolak sahaja -->
						<?php $this->widget('booster.widgets.TbDetailView',array(
							'data'=>$model,
							'type'=>'condensed',
							'attributes'=>array(
									'remarks',
							),
						)); ?>
					<?php }elseif($model->status==1){ ?>
						<div class="alert alert-danger"><h3>Tiada Pembayaran Dilakukan</h3></div>
					<?php }else{ ?>
						<?php echo CHtml::link(BaseFunctions::icon('ok').' Terima', array('approval', 'id'=>$model->id, 'status'=>'Y'), array('class'=>'btn btn-success btn-lg')); ?>
						<?php echo CHtml::link(BaseFunctions::icon('remove').' Tolak', array('approval', 'id'=>$model->id, 'status'=>'T'), array('class'=>'btn btn-danger btn-lg')); ?>
					<?php } ?>
				</div><!-- end box-body -->
			</div><!-- end box -->
		</div><!-- end col -->
	<?php endif ?>
</div>


<div class="box box-solid box-danger">
	<div class="box-header">
		<h3 class="box-title">Butiran Status Invois</h3>
	</div>
	<div class="box-body no-padding">
		<?php $this->widget('booster.widgets.TbGridView',array(
			'id'=>'invoices-grid',
			'type'=>'bordered condensed',
			'dataProvider'=>$details->search(),
			// 'filter'=>$model,
			'columns'=>array(
				array(
					'header'=>'Bil',
		           	'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',       //  row is zero based
		           	'htmlOptions'=>array('style'=>'width:30px;'),
		       	),
				array(
					'name'=>'invoice_status_id', 
					'value'=>'(isset($data->invoiceStatus))?$data->invoiceStatus->name:""',
				),
				'date',
				array(
					'name'=>'updated_by',
					'value'=>'(isset($data->updatedBy))?$data->updatedBy->profile->first_name:""',
				),
			),
		)); ?>
	</div>
</div>