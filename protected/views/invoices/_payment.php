<div class="row">
	<div class="col-md-5">
		<div class="box box-warning">
			<div class="box-header">
				<h3 class="box-title">Maklumat Invois</h3>
			</div>
			<div class="box-body no-padding">
				<?php $this->widget('booster.widgets.TbDetailView',array(
					'data'=>$model,
					'type'=>'',
					'attributes'=>array(
						'invoiceType.name',
						'rm_total',
						array(
							'name'=>'Kepada',
							'value'=>(isset($model->to->profile->first_name))?$model->to->profile->first_name:"",
						),
						array(
							'name'=>'Daripada',
							'value'=>(isset($model->from->profile->first_name))?$model->from->profile->first_name:"",
						),
					),
				)); ?>
			</div>
		</div>
	</div><!-- end col -->
	<div class="col-md-7">
		<div class="box box-danger">
			<div class="box-header">
				<h3 class="box-title">Kemaskini Maklumat Pembayaran</h3>
			</div>
			<div class="box-body">
				<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
					'id'=>'invoices-form',
					'enableAjaxValidation'=>false,
				)); ?>

				<p class="help-block">Medan bertanda <span class="required">*</span> tidak boleh dibiarkan kosong.</p>

				<?php echo $form->errorSummary($model); ?>

					<?php echo $form->textAreaGroup($model,'resit_details', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50)))); ?>

					<?php echo $form->textAreaGroup($model,'other_details', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50)))); ?>

					<div class="form-actions">
						<?php $this->widget('booster.widgets.TbButton', array(
								'buttonType'=>'submit',
								'context'=>'primary',
								'label'=>$model->isNewRecord ? 'Simpan' : 'Kemaskini',
								'disabled'=>($model->status!=1),
							)); ?>
					</div>

				<?php $this->endWidget(); ?>
			</div>
		</div>
	</div>
</div><!-- end row -->