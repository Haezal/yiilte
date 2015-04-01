<ul class="sidebar-menu">
	<li class="header">MENU UTAMA</li>
	<!-- Optionally, you can add icons to the links -->

    <!-- menu for admin sahaja -->
    <?php if (Yii::app()->getModule('user')->isAdmin()){ ?>
        
        <li class="treeview <?php echo (in_array(Yii::app()->controller->id, array('admin')))?"active":"" ?>">
            <a href="#"><i class="fa fa-user"></i> <span>Pengguna Sistem</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="<?php echo Yii::app()->createUrl('/user/admin/create') ?>"><i class="fa fa-plus"></i> Daftar Pengguna</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('/user/admin') ?>"><i class="fa fa-th"></i> Senarai Pengguna</a></li>
            </ul>
        </li>

        <li class=" <?php echo (in_array(Yii::app()->controller->id, array('brands')))?"active":"" ?>">
            <a href="<?php echo Yii::app()->createUrl('brands/admin') ?>"><i class="fa fa-desktop"></i> <span>Branding</span></a>
        </li>

        <li class="treeview <?php echo (in_array(Yii::app()->controller->id, array('branchs', 'branchManagers', 'branchTeachers')))?"active":"" ?>">
            <a href="#"><i class="fa fa-cube"></i> <span>Tadika</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="<?php echo Yii::app()->createUrl('/branchs/create') ?>"><i class="fa fa-plus"></i> Daftar Tadika</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('/branchs/admin') ?>"><i class="fa fa-th"></i> Senarai Tadika</a></li>
            </ul>
        </li>
        
    <?php } else { ?>
        <!-- selain dari admin -->

        <!-- parent -->
        <?php if (Yii::app()->user->checkAccess('parent')): ?>
            <li class="treeview <?php echo (in_array(Yii::app()->controller->id, array('kids', 'invoices')))?"active":"" ?>">
                <a href="#"><i class="fa fa-user"></i> <span>Maklumat Anak</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo Yii::app()->createUrl('/kids/create') ?>"><i class="fa fa-plus"></i> Daftar Anak</a></li>
                    <li><a href="<?php echo Yii::app()->createUrl('/kids/admin') ?>"><i class="fa fa-th"></i> Senarai Anak</a></li>
                </ul>
            </li>
        <?php endif ?>
        <!-- end parent -->

        <!-- branch owner -->
        <?php if (Yii::app()->user->checkAccess('branch_owner')): ?>
            <li class=" <?php echo (in_array(Yii::app()->controller->id, array('branchs', 'branchManagers', 'branchTeachers')))?"active":"" ?>">
                <a href="<?php echo Yii::app()->createUrl('branchs/admin') ?>"><i class="fa fa-desktop"></i> <span>Senarai Tadika</span></a>
            </li>
        <?php endif ?>
        <!-- end branch owner -->

        <!-- branch manager -->
        <?php if (Yii::app()->user->checkAccess('branch_manager')): ?>
            <li class=" <?php echo (in_array(Yii::app()->controller->id, array('kids')))?"active":"" ?>">
                <a href="<?php echo Yii::app()->createUrl('/kids/admin'); ?>"><i class="fa fa-user"></i> <span>Senarai Murid</span></a>
            </li>
        <?php endif ?>
        <!-- end branch manager -->

        <!-- teacher -->
        <!-- end teacher -->
    <?php } ?>
  <!-- end menu parent -->
  <?php if (Yii::app()->user->isGuest): ?>
        <li><a href="#"><span>Halaman Utama</span></a></li>
        <li><a href="#"><span>Hubungi Kami</span></a></li>
        <li><a href="#"><span>Tentang Kami</span></a></li>
        <li><a href="<?php echo Yii::app()->createUrl('/user/login') ?>"><span>Log Masuk</span></a></li>
        <li><a href="<?php echo Yii::app()->createUrl('/user/registration') ?>"><span>Daftar Akaun</span></a></li>
  <?php endif ?>
	<!-- <li>
		<a href="pages/widgets.html">
		<i class="fa fa-th"></i> <span>Widgets</span> <small class="label pull-right bg-green">new</small>
		</a>
	</li> 
	<li class="treeview">
		<a href="#"><span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
		<ul class="treeview-menu">
			<li><a href="#">Link in level 2</a></li>
			<li><a href="#">Link in level 2</a></li>
		</ul>
	</li>-->
</ul><!-- /.sidebar-menu -->