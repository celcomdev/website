<?php

class TwocheckoutController extends RController
{
	public function actionIndex()
	{


		$this->render('index', array('data'=>$data));
	}

	public function actionCallback()
	{
		$order_number = '1';
		
		// $secret  = Yii::app()->config->getData('CONFIG_WEBSITE_CURRENCY');
		// $account = Yii::app()->config->getData('CONFIG_WEBSITE_CURRENCY');
		// $secret = Yii::app()->config->getData('CONFIG_WEBSITE_CURRENCY');



	}

}
