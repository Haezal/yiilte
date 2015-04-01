<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/AdminLTE/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/AdminLTE/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/AdminLTE/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="register-page">
    <div class="register-box" style="margin-top:-5px; width:550px;">
      <div class="register-logo">
        <a href="<?php echo Yii::app()->createUrl('/');?>"><b>Tadika</b> ABS</a>

      </div>

      <div class="register-box-body">
        <p class="login-box-msg">Pendaftaran Ibu Bapa</p>
        <?php echo $content; ?>
        <a href="<?php echo Yii::app()->createUrl('/user/login') ?>" class="text-center">Saya telah mempunyai akaun</a>
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->

    <!-- jQuery 2.1.3 -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/AdminLTE/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/AdminLTE/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/AdminLTE/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>