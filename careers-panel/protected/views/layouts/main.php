<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <?php
  $baseUrl = Yii::app()->baseUrl;
  $cs = Yii::app()->getClientScript();
  $cs->registerCoreScript('jquery');
  //$cs->registerCoreScript('jquery.ui');
  ?>
  <!-- Fav and Touch and touch icons -->
  <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/bootstrap.css">
  <link rel="shortcut icon" href="<?php echo $baseUrl; ?>/img/icons/favicon.ico">
  <?php
  $cs->registerCssFile(Library::getSiteBasePath() . 'css/font-awesome.min.css');
  $cs->registerCssFile($baseUrl . '/css/real.css');
  ?>
  <style>
    .mt-4 {
      margin-top: 2rem;
    }
  </style>
</head>

<body>

  <div class="header">
    <div class="container">
      <div class="row">
        <div class="top-nav">
          <div class="logo">
            <h2 class="brand">Job Portal</h2>
          </div>
          <div class="actions">
            <div class="action-links">
              <?php $this->widget('zii.widgets.CMenu', array(
                'htmlOptions' => array('class' => 'pull-right'),
                'encodeLabel' => false,
                'items' => array(
                  array(
                    'label' => 'Logout (' . Yii::app()->user->name . ')',
                    'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest,  'itemOptions' => array('class' => ''),
                    'linkOptions' => array('class' => 'btn btn-primary')
                  ),
                ),
              )); ?>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="main-menubar">
          <div class="mainnav">
            <nav class="navbar navbar-default">
              <div class="navbar-header navbar-left">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#agents">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse navbar-right" id="agents">
                <?php require_once('tpl_navigation.php') ?>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>


  <div class="body-grid">
    <div class="container">
      <div class="row">
        <?php echo $content; ?>
      </div>
    </div>
  </div>
  <!-- Require the footer -->
  <?php //require_once('tpl_footer.php')
  ?>
  <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/bootstrap.min.js"></script>

  <!-- Require the footer -->
  <?php require_once('tpl_footer.php') ?>
</body>

</html>