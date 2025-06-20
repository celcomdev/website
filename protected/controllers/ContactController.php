<?php

class ContactController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0x118dcb,
				'foreColor' => 0xffffff,
				'minLength' => 4,
				'maxLength' => 4,
				'width' => 70,
				'height' => 30,
				'offset' => 2,
				'padding' => 2,
				'testLimit' => 1,
			),
		);
	}

	public function actionIndex()
	{
		$model=new Contact('contact');
		
		if(isset($_POST['Contact']))
		{
			$model->attributes=$_POST['Contact'];
			if($model->validate())
			{
				$data = array(
					'name'=> $model->name,
					'email'=>$model->email,
					'phone'=>$model->phone,
					'msg' =>$model->body,
				);

				$msg= $this->renderPartial('application.mails.contact', array('data'=>$data), true );
				$info = array(
					'name' =>$model->name,
					'email'=>$model->email,
				);

				$mail = new Mail;
				$mail->enquiryMail(array('info'=>$info, 'msg'=>$msg));

				$flash ='<div class="flash-notice"><h1 class="text-center"><i class="fa fa-check-circle"></i>  Thank you '.$model->name.' for getting in touch</h1><h2 class="text-center">We will respond to you as soon as possible.</h2></div>';
				Yii::app()->user->setFlash('success', $flash);
				$this->redirect(array('/site/page', 'view'=>'success'));

			}
		}
		$this->render('index', array('model'=>$model));
	}

}