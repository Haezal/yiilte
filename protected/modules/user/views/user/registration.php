<?php $form=$this->beginWidget('UActiveForm', array(
          'id'=>'registration-form',
          'enableAjaxValidation'=>true,
          'disableAjaxValidationAttributes'=>array('RegistrationForm_verifyCode'),
          'clientOptions'=>array(
            'validateOnSubmit'=>true,
          ),
          'htmlOptions' => array('enctype'=>'multipart/form-data'),
        )); ?>

          <p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
          
          <?php echo $form->errorSummary(array($model,$profile)); ?>
          
          <div class="form-group has-feedback">
          <?php echo $form->labelEx($model,'username'); ?>
          <?php echo $form->textField($model,'username', array('class'=>'form-control')); ?>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
          <?php echo $form->error($model,'username'); ?>
          </div>
          
          <div class="form-group has-feedback">
          <?php echo $form->labelEx($model,'password'); ?>
          <?php echo $form->passwordField($model,'password', array('class'=>'form-control')); ?>
          <?php echo $form->error($model,'password'); ?>
          <p class="hint">
          <?php echo UserModule::t("Minimal password length 4 symbols."); ?>
          </p>
          </div>
          
          <div class="form-group has-feedback">
          <?php echo $form->labelEx($model,'verifyPassword'); ?>
          <?php echo $form->passwordField($model,'verifyPassword', array('class'=>'form-control')); ?>
          <?php echo $form->error($model,'verifyPassword'); ?>
          </div>

          <div class="form-group has-feedback">
          <?php echo $form->labelEx($model,'email'); ?>
          <?php echo $form->textField($model,'email', array('class'=>'form-control')); ?>
          <?php echo $form->error($model,'email'); ?>
          </div>
          
        <?php 
            $profileFields=$profile->getFields();
            if ($profileFields) {
              foreach($profileFields as $field) {
              ?>
          <div class="form-group has-feedback">
            <?php echo $form->labelEx($profile,$field->varname); ?>
            <?php 
            if ($widgetEdit = $field->widgetEdit($profile)) {
              echo $widgetEdit;
            } elseif ($field->range) {
              echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
            } elseif ($field->field_type=="TEXT") {
              echo$form->textArea($profile,$field->varname,array('rows'=>6, 'cols'=>50, 'class'=>'form-control'));
            } else {
              echo $form->textField($profile,$field->varname,array('size'=>60, 'class'=>'form-control','maxlength'=>(($field->field_size)?$field->field_size:255)));
            }
             ?>
            <?php echo $form->error($profile,$field->varname); ?>
          </div>  
              <?php
              }
            }
        ?>
          <?php if (UserModule::doCaptcha('registration')): ?>
          <div class="form-group has-feedback">
            <?php echo $form->labelEx($model,'verifyCode'); ?><br>
            
            <?php $this->widget('CCaptcha'); ?>
            <?php echo $form->textField($model,'verifyCode', array('class'=>'')); ?>
            <?php echo $form->error($model,'verifyCode'); ?>
            
            <p class="hint"><?php echo UserModule::t("Please enter the letters as they are shown in the image above."); ?>
            <br/><?php echo UserModule::t("Letters are not case-sensitive."); ?></p>
          </div>
          <?php endif; ?>
          
          <div class="row">
            <div class="col-xs-8">    
                                   
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Daftar Akaun Baharu</button>
            </div> <!-- /.col -->
          </div>

        <?php $this->endWidget(); ?> 