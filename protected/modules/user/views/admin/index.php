<?php
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('/user'),
	UserModule::t('Manage'),
);

$this->menu=array(
    array('label'=>UserModule::t('Create User'), 'url'=>array('create')),
    array('label'=>UserModule::t('Manage Users'), 'url'=>array('admin')),
    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin')),
    // array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle('fadein');
    return false;
});	
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('user-grid', {
        data: $(this).serialize()
    });
    return false;
});
");

?>
<h1><?php echo UserModule::t("Manage Users"); ?></h1>
<?php echo CHtml::link(UserModule::t(BaseFunctions::icon('search'). ' Carian terperinci'),'#',array('class'=>'search-button btn btn-primary btn-sm')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
    'model'=>$model,
)); ?>
</div><!-- search-form -->
<br>
<br>
<div class="box box-primary box-solid">
	<div class="box-header">
		<h3 class="box-title">Senarai Pengguna Sistem</h3>
	</div>
	<div class="box-body no-padding table-responsive">
		<?php $this->widget('booster.widgets.TbGridView', array(
			'id'=>'user-grid',
			'type'=>'bordered condensed',
			'dataProvider'=>$model->search(),
			// 'filter'=>$model,
			'columns'=>array(
				array(
					'name' => 'id',
					'type'=>'raw',
					'value' => 'CHtml::link(CHtml::encode($data->id),array("admin/update","id"=>$data->id))',
				),
				array(
					'name' => 'username',
					'type'=>'raw',
					'value' => 'CHtml::link(UHtml::markSearch($data,"username"),array("admin/view","id"=>$data->id))',
				),
				array(
					'name'=>'email',
					'type'=>'raw',
					'value'=>'CHtml::link(UHtml::markSearch($data,"email"), "mailto:".$data->email)',
				),
				'create_at',
				'lastvisit_at',
				array(
					'name'=>'superuser',
					'value'=>'User::itemAlias("AdminStatus",$data->superuser)',
					'filter'=>User::itemAlias("AdminStatus"),
				),
				array(
					'name'=>'status',
					'value'=>'User::itemAlias("UserStatus",$data->status)',
					'filter' => User::itemAlias("UserStatus"),
				),
				array(
					'class'=>'booster.widgets.TbButtonColumn',
				),
			),
		)); ?>
	</div>
</div>