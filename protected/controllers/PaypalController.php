<?php

class PaypalController extends CController
{
	public function actionIndex()
	{
		if(Yii::app()->user->isGuest)
		{
			Yii::app()->user->loginRequired();
		}

		//f(!isset(Yii::app()->session['payment_method']))

		if (!isset(Yii::app()->session['investment_id']))
		{
			$this->redirect(array('/project'));
		}

		$info = Invest::model()->getInvestment(Yii::app()->session['investment_id']);

		$data =array();

		if ($info)
		{
			$mode = Yii::app()->config->getData('PAYPAL_MODE');
			$data['action_url'] = $mode == 1 ? '#' :'#';
			$data['item_name']			= 'Ifarm Agritech Limited';
			$data['business'] 			= Yii::app()->config->getData('PAYPAL_BUSINESS_EMAIL');

			$project = Yii::app()->cart->getProjects();
			foreach ($project as $k)
			{
				$data['project']  	= $k['project_name'];
				$data['price']		  = Yii::app()->currency->convert($k['price'], Yii::app()->config->getData('CONFIG_WEBSITE_CURRENCY'), "USD");
				//$data['price']			=  Yii::app()->currency->format($k['price'], Yii::app()->currency->getCode(), false, false);
				$data['quantity']   = $k['no_units'];
			}

			$data['invoice']				= Yii::app()->session['investment_id'].'-'.$info['lastname'].'-'.$info['firstname'];
			$data['return_url'] 		= Yii::app()->createAbsoluteUrl('/paypal/postpay');
			$data['notify_url'] 		= Yii::app()->createAbsoluteUrl('/paypal/callback');
			$data['cancel_url'] 		= Yii::app()->createAbsoluteUrl('/paypal/canceled');
			$data['paymentaction']  = 'sale';

			$data['custom'] 				= Yii::app()->session['investment_id'];
			$data['currency']				= "USD";
			$data['firstname'] 			= $info['firstname'];
			$data['lastname'] 			= $info['lastname'];
			$data['email']					= $info['email'];

			//$data['logo'] 				=	 $this->config->get('config_url') . 'image/' . $this->config->get('config_logo');
			//echo "<pre>"; print_r($data); echo "</pre>"; exit;
			$this->render('/checkout/paypal/index', array('data'=>$data));
		}

	}

	public function actionPostpay()
	{
		if(Yii::app()->user->isGuest)
		{
			Yii::app()->user->loginRequired();
		}

		//$invest_id = Yii::app()->request->getParam('item_number');
		$invest_id = Yii::app()->request->getPost('custom');
		$txn_id 	 = Yii::app()->request->getPost('txn_id');
		$amount		 = Yii::app()->request->getPost('payment_gross');
		$currency  = Yii::app()->request->getPost('mc_currency');
		$status 	 = Yii::app()->request->getPost('payment_status');

		$model = Invest::model()->findByPk($invest_id);

		if($model)
		{
			$pal = new Transactions;

			$pal->user_id  				= Yii::app()->user->id;
			$pal->currency  			= $currency;
			$pal->amount    			= $amount;
			$pal->status 	  			= $status;
			$pal->order_id  			= $invest_id;
			$pal->tracking_id 		= $txn_id;
			$pal->payment_method 	= "PayPal";

			$pal->save();

			$status_q = InvestStatus::model()->findByAttributes(array('name'=>$status));

			$model->invest_status_name = $status_q->name;
			$model->invest_status_id   = $status_q->id;
			$model->amount						 = $amount;
			$model->currency           = $currency;
			$model->payment_method 		 = "PayPal";
			$model->date_created			 = date('Y-m-d H:i:s');

			$project = Project::model()->getProject($model->project_id);

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
					'tracking'=>$txn_id,
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

		$this->render('/checkout/paypal/postpay');
	}

	public function actionCallback()
	{
		if(Yii::app()->user->isGuest)
		{
			Yii::app()->user->loginRequired();
		}
		//f(!isset(Yii::app()->session['payment_method']))
		if (Yii::app()->request->getParam('custom'))
		{
			$invest_id= Yii::app()->request->getParam('order_id');
		} else {
			$invest_id = 0;
		}

		$invest = Invest::model()->getInvestment($order_id);

	if ($invest) {
		$request = 'cmd=_notify-validate';

	}
		foreach (Yii::app()->request()->getPost() as $key => $value) {
			echo "<pre>"; print_r($key); echo "</pre>";
		}
		exit;

		$mode = Yii::app()->config->getData('PAYPAL_MODE');
		$data['action_url'] = $mode == 1 ? 'https://www.paypal.com/cgi-bin/webscr' :'https://www.sandbox.paypal.com/cgi-bin/webscr';

		$verified = true;
		// md5sig validation
		if (Yii::app()->config->getData('SKRILL_SECRET'))
		{
			$hash  = Yii::app()->request->getParam('merchant_id');
			$hash .= Yii::app()->request->getParam('transaction_id');
			$hash .= strtoupper(md5(Yii::app()->config->getData('SKRILL_SECRET')));
			$hash .= Yii::app()->request->getParam('mb_amount');
			$hash .= Yii::app()->request->getParam('mb_currency');
			$hash .= Yii::app()->request->getParam('status');

			$md5hash = strtoupper(md5($hash));
			$md5sig = Yii::app()->request->getParam('md5sig');

			if ($md5hash != $md5sig)
			{
				$verified = false;
			}
		}

		if ($verified)
		{
			switch(Yii::app()->request->getParam('status'))
			{
				case '2':
					Yii::app()->order->update(array('order_id'=>$order_id, 'status'=>Yii::app()->config->getData('SKRILL_ORDER_STATUS_ID')));
					//$this->model_checkout_order->addOrderHistory($order_id, $this->config->get('skrill_order_status_id'), '', true);
					break;
				case '0':
					Yii::app()->order->update(array('order_id'=>$order_id, 'status'=>Yii::app()->config->getData('SKRILL_PENDING_STATUS_ID')));
				//	$this->model_checkout_order->addOrderHistory($order_id, $this->config->get('skrill_pending_status_id'), '', true);
					break;
				case '-1':
					Yii::app()->order->update(array('order_id'=>$order_id, 'status'=>Yii::app()->config->getData('SKRILL_CANCELED_STATUS_ID')));
					//$this->model_checkout_order->addOrderHistory($order_id, $this->config->get('skrill_canceled_status_id'), '', true);
					break;
				case '-2':
					Yii::app()->order->update(array('order_id'=>$order_id, 'status'=>Yii::app()->config->getData('SKRILL_FAILED_STATUS_ID')));
					//$this->model_checkout_order->addOrderHistory($order_id, $this->config->get('skrill_failed_status_id'), '', true);
					break;
				case '-3':
					Yii::app()->order->update(array('order_id'=>$order_id, 'status'=>Yii::app()->config->getData('SKRILL_CHANGEBACK_STATUS_ID')));
					//$this->model_checkout_order->addOrderHistory($order_id, $this->config->get('skrill_chargeback_status_id'), '', true);
					break;
			}

			$this->redirect(array('/client/order/success'));
		}
		else {
			$this->redirect(array('/client/order/oops'));
		}
		//$this->render('callback');
	}


	public function actionCanceled()
	{

		$this->render('canceled');
	}

		/*public function actionCallback($value='')
		{
			// STEP 1: Read POST data

					// reading posted data from directly from $_POST causes serialization
					// issues with array data in POST
					// reading raw POST data from input stream instead.
					$raw_post_data = file_get_contents('php://input');
					$raw_post_array = explode('&', $raw_post_data);
					$myPost = array();
					foreach ($raw_post_array as $keyval) {
					  $keyval = explode ('=', $keyval);
					  if (count($keyval) == 2)
					     $myPost[$keyval[0]] = urldecode($keyval[1]);
					}
					// read the post from PayPal system and add 'cmd'
					$req = 'cmd=_notify-validate';
					if(function_exists('get_magic_quotes_gpc')) {
					   $get_magic_quotes_exists = true;
					}
					foreach ($myPost as $key => $value) {
					   if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
					        $value = urlencode(stripslashes($value));
					   } else {
					        $value = urlencode($value);
					   }
					   $req .= "&$key=$value";
					}


					// STEP 2: Post IPN data back to paypal to validate

					$ch = curl_init('https://www.sandbox.paypal.com/cgi-bin/webscr');
					curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
					curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
					curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
					curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));

					// In wamp like environments that do not come bundled with root authority certificates,
					// please download 'cacert.pem' from "http://curl.haxx.se/docs/caextract.html" and set the directory path
					// of the certificate as shown below.
					// curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/cacert.pem');
					if( !($res = curl_exec($ch)) ) {
					    // error_log("Got " . curl_error($ch) . " when processing IPN data");
					    curl_close($ch);
					    exit;
					}
					curl_close($ch);


					// STEP 3: Inspect IPN validation result and act accordingly

					if (strcmp ($res, "VERIFIED") == 0) {
					    // check whether the payment_status is Completed
					    // check that txn_id has not been previously processed
					    // check that receiver_email is your Primary PayPal email
					    // check that payment_amount/payment_currency are correct
					    // process payment

					    // assign posted variables to local variables
					    $item_name = $_POST['item_name'];
					    $item_number = $_POST['item_number'];
					    $payment_status = $_POST['payment_status'];
					    $payment_amount = $_POST['mc_gross'];
					    $payment_currency = $_POST['mc_currency'];
					    $txn_id = $_POST['txn_id'];
					    $receiver_email = $_POST['receiver_email'];
					    $payer_email = $_POST['payer_email'];

					}
					else if (strcmp ($res, "INVALID") == 0) {
    // log for manual investigation
		}
		*/
}
