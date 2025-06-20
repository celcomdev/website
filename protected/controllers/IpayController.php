<?php

class IpayController extends Controller
{
	public function actionIndex()
	{
		if(Yii::app()->user->isGuest)
		{
			Yii::app()->user->loginRequired();
		}

		/**
		 * these values below are picked from the incoming URL and assigned to variables
		 * that wewill use in our security check URL
		 *
		 * The value of the parameter “vendor”, in the url being opened above, is your iPay assigned Vendor ID
		 */
		$request	 = 'vendor='.urlencode(Yii::app()->config->getData('IPAY_VENDOR_ID'));
		$request 	.= '&id='.urlencode(Yii::app()->request->getParam('id'));
		$request	.= '&ivm='.urlencode(Yii::app()->request->getParam('ivm'));
		$request	.= '&qwh='.urlencode(Yii::app()->request->getParam('qwh'));
		$request	.= '&afd='.urlencode(Yii::app()->request->getParam('afd'));
		$request	.= '&poi='.urlencode(Yii::app()->request->getParam('poi'));
		$request	.= '&uyt='.urlencode(Yii::app()->request->getParam('uyt'));
		$request	.= '&ifd='.urlencode(Yii::app()->request->getParam('ifd'));

		$ipnurl 	= Yii::app()->ipays->ipnUrl.$request;
		//$ipnurl 	= 'https://www.ipayafrica.com/ipn/?'.$request;

		/**
		 * If the payment mode is LIVE, it gets the payment status.
		 * If the plugin is on test mode, it always gives a successful response.
		 */
		if(Yii::app()->config->getData('IPAY_MODE') == '0')
		{
			$fp 			= fopen($ipnurl, "rb");
			$response	= stream_get_contents($fp, -1, -1);
			fclose($fp);
		}else{
			$response 	= "aei7p7yrx4ae34";
		}
		$order_id		= $_SESSION['investment_id'];
		/**
		 * Success
		 * The transaction is valid. Therefore you can update this transaction.
		 */
		if ($response ==='fe2707etr5s4wq')
		{
			$status = 'Failed';
			$msg = 'Failed transaction. Not all parameters fulfilled. A notification of this transaction sent to the merchant.';
		}
		if ($response ==='aei7p7yrx4ae34')
		{
			$status ='Success';
			$msg    ='The transaction is valid. Therefore you can update this transaction.';
		}
		if ($response === 'bdi6p2yy76etrs')
		{
			$status ='Pending';
			$msg    ='Incoming Mobile Money Transaction Not found. Please try again in 5 minutes.';
		}
		if ($response ==='cr5i3pgy9867e1')
		{
			$status ='Used';
			$msg    ='This code has been used already. A notification of this transaction sent to the merchant.';
		}
		if ($response ==='dtfi4p7yty45wq')
		{
			$status ='Less';
			$msg    ='The amount that you have sent via mobile money is LESS than what was required to validate this transaction.';
		}
		if ($response ==='eq3i7p5yt7645e')
		{
			$status ='More';
			$msg    ='The amount that you have sent via mobile money is MORE than what was required to validate this transaction. (Up to the merchant to decide what to do with this transaction; whether to pass it or not)';
		}
		$method = urlencode(Yii::app()->request->getParam('channel'));

		// $order_info = Invest::model()->findByPk($invest_id);
		// $order_info = Yii::app()->order->getOrderDetails($_SESSION['investment_id']);

		$model = Invest::model()->findByPk($_SESSION['investment_id']);

		if($model)
		{
			$pal = new Transactions;

			$pal->user_id  				= Yii::app()->user->id;
			$pal->currency  			= $_SESSION['currency'];
			$pal->amount    			= Yii::app()->request->getParam('mc');
			$pal->status 	  			= $status;
			$pal->order_id  			= $order_id;
			$pal->tracking_id 		= Yii::app()->request->getParam('txncd');
			$pal->payment_method 	= urlencode(Yii::app()->request->getParam('channel'));

			$pal->save();

			$status_q = InvestStatus::model()->findByAttributes(array('name'=>$status));

			$model->invest_status_name = $status_q->name;
			$model->invest_status_id   = $status_q->id;
			$model->amount						 = $pal->amount;
			$model->currency           = $pal->currency;
			$model->payment_method 		 = $pal->payment_method;
			$model->date_created			 = date('Y-m-d H:i:s');

			$project = Projects::model()->findByPk($model->project_id);

			$project->taken_units += $model->no_units;
			$project->update();

			if ($model->update())
			{
				$data = array(
					'prj_id' =>$project->id,
					'prj_name'=>$model['project_name'],
					'image'=>$project->image,
					'returns'=>$project->returns.' per '.$project->contract_duration,
					'units'=>$model['no_units'],
					'unit_cost'=>Yii::app()->currency->format($model['unit_cost'], $model['currency']),
					'total'=>Yii::app()->currency->format($model['amount'], $model['currency'], 1),
					'invoice'=>$model->invoice_no,
					'customer'=>$model['lastname'].' '.$model['firstname'],
					'email'=>$model['email'],
					'phone'=>$model['telephone'],
					'status'=>$model['invest_status_name'],
					'date'=>date("Y-m-d", strtotime($model['date_created'])),
					'tracking'=>$pal->tracking_id,
				);

				$tpl_client = $this->renderPartial('application.views.mails._confirm_client', array('model'=>$data), true );
				$tpl_admin = $this->renderPartial('application.views.mails._confirm_admin', array('model'=>$data), true );

				$info = array();
				$info['name']  = $model->lastname.' '.$model->firstname;
				$info['email'] = $model->email;

				$mail = new Mail;
				$mail->paymentCompleteClient(array('info'=>$info, 'msg'=>$tpl_client));
				$mail->paymentCompleteAdmin(array('info'=>$info,  'msg'=>$tpl_admin));
				//exit;
				Yii::app()->user->setFlash('success','Payment accepted, awaiting confirmation');
				$this->redirect(array('/checkout/success'));
			}
		}

		//
		//
		// $model = new IpayTransactions;
		//
		// $model->user_id  			 = $order_info['invest_id'];
		// $model->currency 			 = $_SESSION['currency'];
		// $model->amount   			 = Yii::app()->request->getParam('mc');
		// $model->status  			 = $status;
		// $model->order_id 			 = $order_info['id'];
		// $model->customer 			 = Yii::app()->request->getParam('msisdn_id');
		// $model->telephone		 	 = Yii::app()->request->getParam('msisdn_idnum');
		// $model->invoice_no 		 = Yii::app()->request->getParam('ivm');
		// $model->tracking_id 	 = Yii::app()->request->getParam('txncd');
		// $model->payment_method = $method;
		//
		// $model->save();
		//
		// Yii::app()->order->update(array('invest_id'=>Yii::app()->session['investment_id'], 'status'=>'success', 'method'=>$method));
		//
		// $this->redirect(array('/checkout/success'));
	}


}
