<!-- <nav> -->
<?php $this->widget('zii.widgets.CMenu',array(
'htmlOptions'=>array('class'=>'nav navbar-nav collapse navbar-collapse'),
'submenuHtmlOptions'=>array('class'=>'sub-menu'),
'itemCssClass'=>'item-test',
'activeCssClass'=>'active',
'activateParents'=>true,
'encodeLabel'=>false,
'items'=>array(
	array('label'=>'Careers', 'url'=>array('/jobs')),
	array('label'=>'Users', 'url'=> array('/users')),
	array('label'=>'<i class="fa fa-user"></i> My Account', 'url'=>'#','itemOptions'=>array('class'=>'dropdown'),'linkOptions'=>array('class'=>'dropdown-toggle'),
		'items'=>array(
			array('label'=>'Logout', 'url'=> array('/site/logout')),
	)),
),
)); ?>
<!-- </nav> -->
