<?php
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
$this->breadcrumbs=array(
  UserModule::t("Login"),
);
?>

<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>

<div class="success">
  <?php echo Yii::app()->user->getFlash('loginMessage'); ?>
</div>

<?php endif; ?>


<?php echo CHtml::beginForm(); ?>
  
  <?php echo CHtml::errorSummary($model); ?>
  
  <div class="form-group has-feedback">
    <?php echo CHtml::activeLabelEx($model,'username'); ?>
    <?php echo CHtml::activeTextField($model,'username', array('class'=>'form-control', 'placeHolder'=>'Username or Email')) ?>
    
  </div>
  
  <div class="form-group has-feedback">
    <?php echo CHtml::activeLabelEx($model,'password'); ?>
    <?php echo CHtml::activePasswordField($model,'password', array('class'=>'form-control')) ?>
    
  </div>
  

  <div class="row">
    <div class="col-xs-9">    
      <div class="checkbox icheck">
        <label>
          <?php echo CHtml::activeLabelEx($model,'rememberMe'); ?> <?php echo CHtml::activeCheckBox($model,'rememberMe'); ?>
        </label>
      </div>                        
    </div><!-- /.col -->
    <div class="col-xs-3">
      <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
    </div><!-- /.col -->
  </div>

  
<?php echo CHtml::endForm(); ?>

<?php
$form = new CForm(array(
    'elements'=>array(
        'username'=>array(
            'type'=>'text',
            'maxlength'=>32,
        ),
        'password'=>array(
            'type'=>'password',
            'maxlength'=>32,
        ),
        'rememberMe'=>array(
            'type'=>'checkbox',
        )
    ),

    'buttons'=>array(
        'login'=>array(
            'type'=>'submit',
            'label'=>'Login',
        ),
    ),
), $model);
?>