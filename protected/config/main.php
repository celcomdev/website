<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => ' Cheap Bulk SMS Kenya|Bulk SMS Provider |SMS API Gateway',
    'theme' => 'celcom',

    // preloading 'log' component
    'preload' => array('log'),

    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),

    'modules' => array(),

    // application components
    'components' => array(

        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),

        // uncomment the following to enable URLs in path-format

        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array(
                '/' => 'site/index',
                'contact' => 'contact',
                'register' => '/register',
                'bulk-sms-pricing' => 'pricing',
                'buy-bulk-sms' => 'pricing/buy',
                'thanks' => 'site/thanks',
                'developers-center' => 'site/developers',
                'careers' => 'careers',
				'careers/view/<alias:[\w+\-]+>'=>'careers/view',
                '<view:[\w\-]+>' => 'site/page',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
            'showScriptName' => false,
        ),


        // database settings are configured in database.php
        'db' => require(dirname(__FILE__) . '/database.php'),

        'currency' => array(
            'class' => 'application.components.Currency',
        ),
        'payment' => array(
            'class' => 'application.components.Payment',
        ),
        'config' => array(
            'class' => 'application.components.Config',
        ),
        'sms' => array(
            'class' => 'application.components.SmsApi',
        ),
        'paypal' => array(
            'class' => 'application.components.PayPal',
            'apiMode' => 1,
            'paymentAction' => 'Sale',
            'returnUrl' => '/paypal/postpay',
            'cancelUrl' => '/paypal/canceled',
            'notifyUrl' => '/paypal/callback',
            'bizEmail' => 'rgachomo@celcomafrica.com',
        ),
        'twochek' => array(
            'class' => 'application.components.TwoCheckout',
            'apiMode' => 0,
            'returnUrl' => '/twocheckout',
            'cancelUrl' => '/twocheckout/canceled',
        ),

        'ipays' => array(
            'class' => 'application.components.IpayAfrica',
            'apiMode' => 0,
            'ipayUrl' => 'https://payments.ipayafrica.com/v3/ke',
            'ipnUrl' => 'https://www.ipayafrica.com/ipn/?',
            'returnUrl' => '/pricing/ipay',
            'ipaySec' => 'hdsj56CeLc0m145AX',
            'vendorId' => 'celcom',
            'currency' => 'KES',
            // 'merchant'=>
        ),

        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => YII_DEBUG ? null : 'site/error',
        ),

        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                // uncomment the following to show log messages on web pages


                array(
                    'class' => 'CWebLogRoute',
                ),

            ),
        ),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'enquiries@celcomafrica.com',
        // 		'apiKey'=> '70ca03ae7f803877016f5bc31bb691e3',
        'apiKey' => '69866f4f1374ddf01825b712bc15f989',
        // 		'partnerId'=>'77',
        'partnerId' => '239',
        // 		'shortCode'=>'CELCOM_SMS',
        'shortCode' => 'Celcom_API',
    ),
);