<?php
/* @var $this KidsController */
/* @var $model Kids */

$this->breadcrumbs=array(
	'Kids'=>array('index'),
	$model->id,
);

$this->menu=array(
	// array('label'=>'List Kids', 'url'=>array('index')),
	array('label'=>'Create Kids', 'url'=>array('create'), 'icon'=>'plus'),
	array('label'=>'Update Kids', 'url'=>array('update', 'id'=>$model->id), 'icon'=>'pencil'),
	array('label'=>'Delete Kids', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'), 'icon'=>'trash'),
	array('label'=>'Manage Kids', 'url'=>array('admin'),'icon'=>'th-list'),
);
?>

<h2 style="border-bottom:1px dashed #000;">Profil Pelajar</h2>

<div class="box box-danger">
	<div class="box-body">
		<div class="row">
			<div class="col-md-9">
				<h3><?php echo $model->fullname ?></h3>
				(<?php echo CHtml::link($model->branch->name, array('branchs/view', 'id'=>$model->branch_id)); ?>)
				<p><?php echo ($model->gender=="L")?"Lelaki":"Perempuan" ?></p>

				<p><?php echo $model->mykids; ?></p>
				<p><?php echo date('d-m-Y', strtotime($model->birthday)) ?></p>
				<address>
					<b>Alergi</b><br>
					<?php echo nl2br($model->alergic_to) ?>
				</address>
				<address>
					<b>Sekolah Terdahulu</b><br>
					<?php echo nl2br($model->previous_school) ?>
				</address>
				<p></p>
			</div>
			<div class="col-md-3">
				<?php if (file_exists($model->kidPhoto->filepath)): ?>
					<?php $baseUrl=Yii::app()->request->baseUrl; ?>
					<img src="<?php echo $baseUrl.'/'.$model->kidPhoto->filepath; ?>" alt="Gambar Passport" class="img-thumbnail img-responsive">
				<?php endif ?>
			</div>
		</div>	<!-- end row -->

		<div class="row">
			<div class="col-md-12">
				<?php echo CHtml::link('Kemaskini Profil', array('kids/update', 'id'=>$model->id), array('class'=>'btn btn-primary btn-lg')) ?>
				<?php echo CHtml::link('Senarai Invois', array('invoices/byKids', 'id'=>$model->id), array('class'=>'btn btn-primary btn-lg')) ?>
			</div>
		</div><!-- end row -->
		<br><br>
		<div class="row">
			<div class="col-md-12">
				<div role="tabpanel">

				  <!-- Nav tabs -->
				  <ul class="nav nav-tabs" role="tablist">
				    <li role="presentation" class="active"><a href="#record" aria-controls="record" role="tab" data-toggle="tab">Rekod Pelajar</a></li>
				    <li role="presentation"><a href="#behavior" aria-controls="behavior" role="tab" data-toggle="tab">Tingkah Laku</a></li>
				    <li role="presentation"><a href="#parent" aria-controls="parent" role="tab" data-toggle="tab">IbuBapa / Penjaga</a></li>
				    <li role="presentation"><a href="#message" aria-controls="message" role="tab" data-toggle="tab">Mesej</a></li>
				  </ul>

				  <!-- Tab panes -->
				  <div class="tab-content" style="margin-bottom:10px;">
				    <div role="tabpanel" class="tab-pane active" id="record">
				    	<h3 style="border-bottom:1px dashed #000;">Bahasa Melayu</h3>
				    	<div class="alert alert-warning">
				    		<p>Tiada Rekod</p>
				    	</div>
				    	<h3 style="border-bottom:1px dashed #000;">Bahasa Inggeris</h3>
				    	<div class="alert alert-warning">
				    		<p>Tiada Rekod</p>
				    	</div>
				    	<h3 style="border-bottom:1px dashed #000;">Mengaji</h3>
				    	<div class="alert alert-warning">
				    		<p>Tiada Rekod</p>
				    	</div>
				    </div>
				    <div role="tabpanel" class="tab-pane" id="behavior">
				    	<div class="alert alert-warning">
				    		<p>Tiada Rekod</p>
				    	</div>
				    </div>
				    <div role="tabpanel" class="tab-pane" id="parent">
				    	<div class="row">
				    		<div class="col-md-6">
				    			<h4 style="border-bottom: 1px dashed #000; margin-bottom:10p; padding:10px;">Maklumat IbuBapa / Penjaga</h4>
						    	<?php  
						    	$parent = $model->parent;
						    	?>
						    	<h4><?php echo $parent->profile->first_name ?></h4>
						    	<address>
						    		<b>Email</b><br>
						    		<?php echo $parent->email; ?>
						    	</address>
						    	<address>
						    		<b>No Kad Pengenalan</b><br>
						    		<?php echo $parent->profile->ic; ?>
						    	</address>
				    		</div>
				    		<div class="col-md-6">
				    			<h4 style="border-bottom: 1px dashed #000; margin-bottom:10p; padding:10px;">Pasangan</h4>
				    		</div>
				    	</div>
				    </div>
				    <div role="tabpanel" class="tab-pane" id="message">
				    	<div class="alert alert-warning">
				    		<p>Tiada Rekod</p>
				    	</div>
				    </div>
				  </div>

				</div>
			</div>
		</div><!-- end row -->
	</div> <!-- end box-body -->
</div><!-- end box -->
