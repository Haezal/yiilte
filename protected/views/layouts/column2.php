<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row">
	<div class="col-md-3">
        <div class="well well-small">
            <?php
//            $this->widget(
//                'booster.widgets.TbMenu',
//                array(
//                    'type' => 'pill',
//                    'items' => array(
//                        array(
//                            'label' => 'List header',
//                            'itemOptions' => array('class' => 'nav-header')
//                        ),
//                        array(
//                            'label' => 'Home',
//                            'url' => '#',
//                            'itemOptions' => array('class' => 'active')
//                        ),
//                        array('label' => 'Library', 'url' => '#'),
//                        array('label' => 'Applications', 'url' => '#'),
//                        array(
//                            'label' => 'Another list header',
//                            'itemOptions' => array('class' => 'nav-header')
//                        ),
//                        array('label' => 'Profile', 'url' => '#'),
//                        array('label' => 'Settings', 'url' => '#'),
//                        '',
//                        array('label' => 'Help', 'url' => '#'),
//                    )
//                )
//            );
            ?>
		<?php
			$this->widget('booster.widgets.TbMenu', array(
                'type' => 'lists',
				'items'=>$this->menu,
//				'htmlOptions'=>array('class'=>'operations'),
			));
		?>
        </div>
	</div>
	<div class="col-sm-9">
		<?php echo $content; ?>
	</div>
</div>
<?php $this->endContent(); ?>