<?php

class SiteController extends Controller
{
	public $layout='//layouts/column_zero';

	public function accessRules()
	{
		return array(
				array('allow',  // allow all users to perform 'index' and 'view' actions
						'actions'=>array( 'index','login','error'),
						'users'=>array('*'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions'=>array('logout'),
						'users'=>array('@'),
				),
				array('deny',  // deny all users
						'users'=>array('*'),
				),
		);
	}
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	 public function actionIndex()
 	{
 		$this->layout = false;
 		if(Yii::app()->user->isGuest) {
 				$this->redirect($this->createUrl('/site/login'));
 		} else{
 				$this->redirect($this->createUrl('/jobs/index'));
 		}
 	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		if(Yii::app()->user->isGuest)
		{
		//	$this->layout='login_layout';
			$model=new LoginForm;

			// if it is ajax validation request
			if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
			{
				echo CActiveForm::validate($model);
				Yii::app()->end();
			}

			// collect user input data
			if(isset($_POST['LoginForm']))
			{
				$model->attributes=$_POST['LoginForm'];
				// validate user input and redirect to the previous page if valid
				if($model->authenticate($model->username, $model->password) && $model->getOTPUser()) {
					$user = $model->getOTPUser();
					Yii::app()->session['pwd'] = $model->password;
					$user->otp = mt_rand(10000, 10000000);
					
					$user->save(false);
					
					$msg = $this->renderPartial('application.views.mails.send-otp', array('data' => ['otp' => $user->otp]), true);
					$info = array(
						'email' => $user->email,
						'subject' => 'Jobs portal OTP',
					);
					$mail = new Mail();
					$mail->sendOtp(['info' => $info, 'msg' => $msg]);

					$this->redirect(array('/site/otp', 'token' => $user->activkey));
				}
			}
			// display the login form
			$this->render('login',array('model'=>$model));
		} else {
			$this->redirect(array('/jobs/index'));
		}

	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionOtp()
	{
		$login = new LoginForm();
		if(isset($_POST['yt0']) && $_POST['yt0']) {
			if(!$user = $login->otpUserAuth($_POST['token'], $_POST['otp'])) {
				$this->redirect(array('/site/otp', 'token' => $_POST['token']));
			}
			$user->lastvisit_at = date('Y-m-d H:i:s');
			$user->save(false);
			$auth = new LoginForm;
			$auth->attributes = ['username' => $user->username, 'password' => Yii::app()->session['pwd']];
			$auth->validate();
			$auth->login();
			unset(Yii::app()->session['pwd']);
			Yii::app()->user->setState('username', $user->username);
			$this->redirect(array('/jobs/index'));
		}
		else {

			$otpDetails = $login->otpDetails($_GET['token']);
		}

		$this->render('otp', array('data'=>$otpDetails));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();

		$this->redirect(Yii::app()->homeUrl);
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest) {
				echo $error['message'];
			}
			else {
				$this->render('error', $error);
			}
		}
	}

}
