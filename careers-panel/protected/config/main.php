<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Administrator',
	'defaultController'=>"site/login",

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.rights.*',
		'application.modules.rights.components.*',
		'application.extensions.EPhpThumb.*',
		'application.helpers.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool

		//Modules Rights
		 'rights'=>array(
			//'debug'=>true,
			//'install'=>true,
			//'cssFile'=>'style.css',
			//'enableBizRuleData'=>true,
			'superuserName'=>'Admin', // Name of the role with super user privileges.
			 'authenticatedName'=>'Authenticated',  // Name of the authenticated user role.
			 'userIdColumn'=>'id', // Name of the user id column in the database.
			 'userNameColumn'=>'username',  // Name of the user name column in the database.
			 'enableBizRule'=>true,  // Whether to enable authorization item business rules.
			 'enableBizRuleData'=>true,   // Whether to enable data for business rules.
			 'displayDescription'=>true,  // Whether to use item description instead of name.
			 'flashSuccessKey'=>'RightsSuccess', // Key to use for setting success flash messages.
			 'flashErrorKey'=>'RightsError', // Key to use for setting error flash messages.
			 //'install'=>true,  // Whether to install rights.
			 'baseUrl'=>'/rights', // Base URL for Rights. Change if module is nested.
			 'layout'=>'rights.views.layouts.main',  // Layout to use for displaying Rights.
			 'appLayout'=>'application.views.layouts.main', // Application layout.
			 'cssFile'=>'rights.css', // Style sheet file to use for Rights.
			 'install'=>false,  // Whether to enable installer.
			 'debug'=>false,
		),

	),

	// application components
	'components'=>array(

		'user'=>array(
			'class'=>'RWebUser',
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'authManager'=>array(
			'class'=>'RDbAuthManager',
			'connectionID'=>'db',
			'itemTable'=>'authitem',
			'itemChildTable'=>'authitemchild',
			'assignmentTable'=>'authassignment',
			'rightsTable'=>'rights',
		),

		'thumbs'=>array(
		   'class'=>'ext.EPhpThumb.EPhpThumb',
			 'options'=>array('jpegQuality'=>75, 'resizeUp' => true),
		),
		// imagine drivers
		'thumb'=>array(
			'class' => 'application.components.Thumbnailer',
		),
		'config' => array(
			'class' => 'application.components.Config',
		),
		// uncomment the following to enable URLs in path-format

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>YII_DEBUG ? null : 'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				// array(
				// 	'class'=>'CFileLogRoute',
				// 	'levels'=>'error, trace',
				// ),
				// uncomment the following to show log messages on web pages

				array(
					'class'=>'CWebLogRoute',
				),

			),
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
		'document_root'=>$_SERVER['DOCUMENT_ROOT'].'/',
		'upload_path'=>'images/',//'uploads/catalog/',//directory path to the catalog folder
	),
);
