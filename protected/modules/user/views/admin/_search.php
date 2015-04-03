<div class="box box-solid box-default">
<div class="box-header">
    <h3 class="box-title">Carian</h3>
</div>
<div class="box-body">

    <?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
        'action'=>Yii::app()->createUrl($this->route),
        'method'=>'get',
    )); ?>
            <?php echo $form->textFieldGroup($model,'username',array('size'=>20,'maxlength'=>20)); ?>
            <?php echo $form->textFieldGroup($model,'email',array('size'=>60,'maxlength'=>128)); ?>

            <?php $list = $model->itemAlias('UserStatus');
            echo $form->dropDownListGroup($model,'status',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'empty'=>'- Pilih -'), 'data'=>$list)));  ?>

        <div class="form-actions">
            <?php $this->widget('booster.widgets.TbButton', array(
                'buttonType' => 'submit',
                'context'=>'primary',
                'label'=>'Carian',
            )); ?>
        </div>

    <?php $this->endWidget(); ?>

</div><!-- box-body -->
</div><!-- box -->