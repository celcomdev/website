<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="main-grid">
	<div class="fluid-grid-inner">
		<div class="-col-md-3 sidebar">
			<div class="sidebar-nav">
				<nav id="side_fixed_nav">

					<?php $this->widget('zii.widgets.CMenu', array(
						'activeCssClass'=>'active',
					  'htmlOptions'=>array('class'=>'pull-right menu', 'id'=>'text_nav_side_fixed'),
					  'submenuHtmlOptions'=>array('class'=>''),
					  'activateParents'=>true,
					  'encodeLabel'=>false,
					  'items'=>array(
							array('label'=>'Banner Images', 'url'=>array('/banners')),
							array('label'=>'<i class="fa fa-map-marker"></i> Manage Real Estates', 'url'=>'javascript: void(0);',
								//'itemOptions'=>	array('class'=>''),
						  	'items' =>array(
									array('label'=>'Properties', 'url'=>array('/properties'), array()),
									array('label'=>'Property Types', 'url'=>array('/propertypes')),
									array('label'=>'Listing Type', 'url'=>array('/types')),
									array('label'=>'Features', 'url'=>array('/features')),
								)),
							array('label'=>'Locations', 'url'=>array('/locations'), array(

								'active'=> ((Yii::app()->controller->id=='locations')  ) ? true : false
							)),
							array('label'=>'Pages', 'url'=>array('/pages')),
							array('label'=>'Widgets', 'url'=>array('/widgets')),
							array('label'=>'Blog Articles', 'url'=>array('/blog')),
							array('label'=>'Testimonials', 'url'=>array('/feedback')),
							array('label'=>'Users', 'url'=>array('/user/admin')),
							array('label'=>'Agents', 'url'=>array('/user/agents')),
							array('label'=>'Settings', 'url'=>array('/settings')),
						),
					));?>


				</nav>

			<script type="text/javascript">
				/*$(document).ready(function () {
				    //Hide the second level menu
				    $('.sidebar-nav ul li ul').hide();
				    //Show the second level menu if an item inside it active
				    $('li.active').parent("ul").show();

				    $('.sidebar-nav').children('ul').children('li').children('a').click(function ()
						{
				         if($(this).parent().children('ul').length>0)
								 {
				            $(this).parent().children('ul').toggle();
				         }
				    });

				});*/
    	</script>

			<script type="text/javascript">
			// $(document).ready(function(){
			// 	$(".has_submenu > a").click(function(e){
			// 	e.preventDefault();
			// 	var menu_li = $(this).parent("li");
			// 	var menu_ul = $(this).next("ul");
			//
			// 	if(menu_li.hasClass("active")){
			// 	  menu_ul.slideUp(350);
			// 	  menu_li.removeClass("active")
			// 	}
			// 	else{
			// 	  $(".menu > li > ul").slideUp(350);
			// 	  $(".menu > li").removeClass("active");
			// 	  menu_ul.slideDown(350);
			// 	  menu_li.addClass("active");
			// 	}
			// 	});
			//
			// });
		</script>


			</div>
		</div><!--/ sidebar-->
		<div class="col-md-9 body-grid">
			<div class="main-wrapper">
			  <!-- Include content pages -->
			  <?php echo $content; ?>
			</div>
		</div><!--/span-->
	</div><!--/fluid container-->
  <div class="clearfix"></div>
</div>

<?php $this->endContent(); ?>
