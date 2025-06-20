<?php

class PricingController extends Controller
{
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha' => array(
				'class' => 'CaptchaExtendedAction',
				'maxLength' => 4,
				'padding'   => 0,
				// if needed, modify settings
				'mode' => CaptchaExtendedAction::MODE_MATH,
			),
		);
	}

	public function actionIndex()
	{
		$model = new Bundles;
		if (Yii::app()->request->isAjaxRequest) {
			$min 		= Yii::app()->getRequest()->getPost('min');
			$max 		= Yii::app()->getRequest()->getPost('max');
			$price 	= Yii::app()->getRequest()->getPost('price');

			$data = array('price' => $price, 'max' => $max, 'min' => $min);
			Yii::app()->session['_bundles'] = serialize($data);

			if (Yii::app()->session['_bundles']) {
				echo CJSON::encode(array(
					'status'  => 'failure',
					'redirect' => $this->createUrl('/pricing/buy'),
				));
				exit;
			}
		} else
			//throw new CHttpException(500, Yii::t('base', 'Invalid request.'));
			$this->render('index', array());
	}

	public function actionBuy()
	{

		$model = new Bundles;

		$model->scenario = 'bundlez';
		if (Yii::app()->request->isPostRequest && isset($_POST['Bundles'])) {
			$model->attributes = Yii::app()->getRequest()->getPost('Bundles');

			$units 	= (int)$model->sms_bundle;
			$total 	= $model->sms_price * $units;
			$sender = 'Not included';
			if ($model->sender_id == 1) {
				$total += 7000;
				$sender = "Inc of sender Id Branding";
			}

			//$json = array();
			if ($model->validate()) {
				$data = array(
					'order'  => 1,
					'amount' => $total,
					'price'  => $model->sms_price,
					'name'   => $model->name,
					'email'  => $model->email,
					'phone'  => $model->phone,
					'units'  => $units,
					'sendid' => $sender,
				);

				Yii::app()->user->setState('selfcare', $data);

				$admin = $this->renderPartial('application.mails.lead', array('data' => $data), true);

				$info = array();
				$info['name']  = $model->name;
				$info['email'] = $model->email;

				$mail = new Mail;
				//$mail->newLead(array('info'=>$info, 'msg'=>$admin));
				if (Yii::app()->user->getState('selfcare')) {
					$this->redirect(array('/pricing/payment'));
				}
			}
		}
		$data = unserialize(Yii::app()->session['_bundles']);

		$model->sms_price = $data['price'];
		$model->max_sms 	= $data['max'];
		$model->min_sms 	= $data['min'];

		$this->render('buy', array('model' => $model));
	}

	public function actionPostpay()
	{
		Yii::app()->clientScript->registerMetaTag('NOINDEX, NOFOLLOW', 'robots');
		$txn_id 	 = Yii::app()->request->getPost('txn_id');
		$amount		 = Yii::app()->request->getPost('payment_gross');
		$currency  = Yii::app()->request->getPost('mc_currency');
		$status 	 = Yii::app()->request->getPost('payment_status');

		if (Yii::app()->user->hasState('bundles')) {
			$info = Yii::app()->user->getState('bundles');
		} elseif (Yii::app()->user->hasState('selfcare')) {
			$info = Yii::app()->user->getState('selfcare');
		}


		$data = array(
			'customer' => $info['name'],
			'email'		=> $info['email'],
			'phone'		=> $info['phone'],
			'status'	=> $status,
			'amount'  => $amount,
			'method'  => 'Paypal',
			'tracking' => $txn_id,
		);

		$client = $this->renderPartial('application.views.mails.paid_client', array('data' => $data), true);
		$admin  = $this->renderPartial('application.views.mails.paid_admin', array('data' => $data), true);

		$info = array();
		$info['name']  = $info['name'];
		$info['email'] = $info['email'];

		$mail = new Mail;
		$mail->paymentClient(array('info' => $info, 'msg' => $tpl_client));
		$mail->paymentAdmin(array('info' => $info,  'msg' => $tpl_admin));

		Yii::app()->user->setFlash('success', 'Payment accepted, awaiting confirmation');
		$this->redirect(array('/pricing/success'));
	}

	public function actionPayment()
	{
		Yii::app()->clientScript->registerMetaTag('NOINDEX, NOFOLLOW', 'robots');
		$model = new Methods;

		if (isset($_POST['Methods'])) {
			$model->attributes = $_POST['Methods'];
			// validation
			if ($model->validate()) {
				$method_id = $model->code;

				switch ($method_id) {
					case 'PayPal':
						Yii::app()->paypal->buyBundles();
						break;
					case 'IPAY':
						Yii::app()->ipays->buyBundles();
						break;
				}
				/*******user to accept terms *********/
			}
		}

		$this->render('payment', array('model' => $model));
	}


	public function actionIpay()
	{
		Yii::app()->clientScript->registerMetaTag('NOINDEX, NOFOLLOW', 'robots');
		$request	= 'vendor=' . urlencode(Yii::app()->ipays->vendorId);
		$request 	.= '&id=' . urlencode(Yii::app()->request->getParam('id'));
		$request	.= '&ivm=' . urlencode(Yii::app()->request->getParam('ivm'));
		$request	.= '&qwh=' . urlencode(Yii::app()->request->getParam('qwh'));
		$request	.= '&afd=' . urlencode(Yii::app()->request->getParam('afd'));
		$request	.= '&poi=' . urlencode(Yii::app()->request->getParam('poi'));
		$request	.= '&uyt=' . urlencode(Yii::app()->request->getParam('uyt'));
		$request	.= '&ifd=' . urlencode(Yii::app()->request->getParam('ifd'));

		$ipnurl 	= Yii::app()->ipays->ipnUrl . $request;
		/**
		 * If the payment mode is LIVE, it gets the payment status.
		 * If the plugin is on test mode, it always gives a successful response.
		 */
		if (Yii::app()->ipays->apiMode == '0') {
			$fp 			= fopen($ipnurl, "rb");
			$response	= stream_get_contents($fp, -1, -1);
			fclose($fp);
		} else {
			$response 	= "aei7p7yrx4ae34";
		}
		/**
		 * Success
		 * The transaction is valid. Therefore you can update this transaction.
		 */
		if ($response === 'fe2707etr5s4wq') {
			$status = 'Failed';
			$msg = 'Failed transaction. Not all parameters fulfilled. A notification of this transaction sent to the merchant.';
		}
		if ($response === 'aei7p7yrx4ae34') {
			$status = 'Success';
			$msg    = 'The transaction is valid. Therefore you can update this transaction.';
		}
		if ($response === 'bdi6p2yy76etrs') {
			$status = 'Pending';
			$msg    = 'Incoming Mobile Money Transaction Not found. Please try again in 5 minutes.';
		}
		if ($response === 'cr5i3pgy9867e1') {
			$status = 'Used';
			$msg    = 'This code has been used already. A notification of this transaction sent to the merchant.';
		}
		if ($response === 'dtfi4p7yty45wq') {
			$status = 'Less';
			$msg    = 'The amount that you have sent via mobile money is LESS than what was required to validate this transaction.';
		}
		if ($response === 'eq3i7p5yt7645e') {
			$status = 'More';
			$msg    = 'The amount that you have sent via mobile money is MORE than what was required to validate this transaction. (Up to the merchant to decide what to do with this transaction; whether to pass it or not)';
		}


		if (Yii::app()->user->hasState('bundles')) {
			$info = Yii::app()->user->getState('bundles');
		} elseif (Yii::app()->user->hasState('selfcare')) {
			$info = Yii::app()->user->getState('selfcare');
		}

		$data = array(
			'customer' => $info['name'],
			'email'		=> $info['email'],
			'phone'		=> $info['phone'],
			'status'	=> $status,
			'amount'  => Yii::app()->request->getParam('mc'),
			'method'  => Yii::app()->request->getParam('channel'),
			'tracking' => Yii::app()->request->getParam('txncd'),
		);

		$client = $this->renderPartial('application.mails.paid_client', array('data' => $data), true);
		$admin  = $this->renderPartial('application.mails.paid_admin', array('data' => $data), true);

		$usr = array();
		$usr['name']  = $info['name'];
		$usr['email'] = $info['email'];

		$mail = new Mail;
		$mail->paymentClient(array('info' => $usr, 'msg' => $tpl_client));
		$mail->paymentAdmin(array('info' => $usr,  'msg' => $tpl_admin));

		Yii::app()->user->setFlash('success', 'Payment accepted, awaiting confirmation');
		$this->redirect(array('/pricing/success'));
	}

	public function actionSuccess()
	{
		Yii::app()->clientScript->registerMetaTag('NOINDEX, NOFOLLOW', 'robots');
		if (Yii::app()->user->hasState('bundles')) {
			Yii::app()->user->setState('bundles', null);
		}

		if (Yii::app()->user->hasState('selfcare')) {
			Yii::app()->user->setState('selfcare', null);
		}

		$this->render('success');
	}
	/**
	 * Performs the AJAX validation.
	 * @param Classifieds $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'bundles-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionPaypal()
	{
		if (!isset($_GET['token']) || (isset($_GET['token']) && $_GET['token'] != 'z4sluvJ7UHdpRHtd')) {
			echo 'invalid token';
			$myfile = fopen("response-error.json", "w") or die("Unable to open file!");
			// $json = file_get_contents('php://input');
			fwrite($myfile, "Invalid Token");
			fclose($myfile);
		} else {
			// $myfile = fopen("response5.json", "w") or die("Unable to open file!");
			$json = file_get_contents('php://input');
			// fwrite($myfile, $json);
			// fclose($myfile);
			// exit();
			// return;
			$data = json_decode($json, true);
			// print_r($data['resource']['purch174379ase_units']);
			// return;
			$d = $data['resource']['purchase_units'];

			$mail = new Mail;
			$mail->sendPaypalNotification(array('payment' => $d[0]));
		}
	}

	public function actionsendstkpush()
	{
		$live = 0;
		$authUrl = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
		$stkUrl = "https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest";
		// if($live) {
		// 	$authUrl = "https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
		// 	$stkUrl = "https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest";
		// }

		$consumerKey = "I56X2AZhG1qSF4h2nN77z2437Ey4JGOc";
		$consumerSecret = "NwBCAlKfaCRIz8o8";
		$bearer  = base64_encode($consumerKey . ':' . $consumerSecret);

		$chAuth = curl_init($authUrl);
		curl_setopt($chAuth, CURLOPT_HTTPHEADER, ['Authorization: Basic ' . $bearer]);
		curl_setopt($chAuth, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($chAuth);
		curl_close($chAuth);

		$credentials = json_decode($response, true);

		$json = file_get_contents('php://input');
		$data = json_decode($json, true);
		$passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
		$senderIDBought = $data['senderid'] ? ' & senderid' : '';

		$req = [
			'BusinessShortCode' => 174379,
			'Timestamp' => $data['timestamp'],
			'TransactionType' => 'CustomerPayBillOnline',
			// 'Amount' => floatval($data['total']),
			'Amount' => 1,
			'PartyA' => $data['phone'],
			'PartyB' => 174379,
			'PhoneNumber' => $data['phone'],
			'CallBackURL' => 'https://b084-197-232-67-112.ngrok.io/pricing/mpesacallback',
			'AccountReference' => $data['account'],
			'TransactionDesc' => 'SMSes(' . $data["smses"] . ')' . $senderIDBought,
		];

		$req['Password'] = base64_encode($req['BusinessShortCode'] . $passkey . $data['timestamp']);

		$ch = curl_init($stkUrl);
		curl_setopt($ch, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $credentials['access_token'],
			'Content-Type: application/json'
		]);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($req));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);
		echo ($response);
		curl_close($ch);
	}

	public function actionMpesacallback()
	{
		$json = file_get_contents('php://input');

		$data = json_decode($json, true);

		if ($data['Body']['stkCallback']['ResultCode'] == 0) {
			$details = $data['Body']['stkCallback']['CallbackMetadata'];
			foreach ($details['Item'] as $item) {
				if ($item['Name'] == 'PhoneNumber') {
					$msg = 'Your payment has been received. Customercare will call you shortly. Thank you.';

					Yii::app()->sms->sendSMS($item['Value'], $msg);
				}
			}
		}
	}
}
