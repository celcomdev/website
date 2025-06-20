<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.png" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/login.css" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<style>
		.mt-4 {
			margin-top: 2rem;
		}
	</style>
</head>
<body>
	<div class="login-grid-row">
		<div class="container">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-grid-inner row  text-center">
					<div class="header col-md-12 text-center">
						<div class="title"><h1>Login</h1></div>
						<!-- <div class="logo"><img src="<?php // echo Yii::app()->baseUrl.'/images/logo.jpg'?>" alt="ifarm360.com"></div> -->
					</div>
					<?php echo $content; ?>
				</div>

			</div><!-- content -->
		</div>
	</div>
</body>
</html>
