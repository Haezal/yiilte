<ul class="sidebar-menu">
	<li class="header">MENU UTAMA</li>
	<!-- Optionally, you can add icons to the links -->

    <!-- menu for admin sahaja -->
    <?php if (Yii::app()->getModule('user')->isAdmin()){ ?>
        
        <li class="treeview <?php echo (in_array(Yii::app()->controller->id, array('admin')))?"active":"" ?>">
            <a href="#"><i class="fa fa-user"></i> <span>Users</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="<?php echo Yii::app()->createUrl('/user/admin/create') ?>"><i class="fa fa-plus"></i> Create</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('/user/admin') ?>"><i class="fa fa-th"></i> List</a></li>
            </ul>
        </li>

        <li class=" <?php echo (in_array(Yii::app()->controller->id, array('brands')))?"active":"" ?>">
            <a href="<?php echo Yii::app()->createUrl('/rights') ?>"><i class="fa fa-desktop"></i> <span>Role Management</span></a>
        </li>

    <?php } else { ?>
        <!-- selain dari admin -->

    <?php } ?>
  <?php if (Yii::app()->user->isGuest): ?>
        <li><a href="<?php echo Yii::app()->createUrl('/') ?>"><span>Homepage</span></a></li>
        <li><a href="<?php echo Yii::app()->createUrl('/site/page?view=about') ?>"><span>About Us</span></a></li>
        <li><a href="<?php echo Yii::app()->createUrl('/site/contact') ?>"><span>Contact Us</span></a></li>
        <li><a href="<?php echo Yii::app()->createUrl('/user/login') ?>"><span>Login</span></a></li>
        <li><a href="<?php echo Yii::app()->createUrl('/user/registration') ?>"><span>Register</span></a></li>
  <?php endif ?>
</ul><!-- /.sidebar-menu -->