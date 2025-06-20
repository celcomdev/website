<?php
/**
 * Paypal.php
 * @package PayPal
 * @version 1.0
 */
class PayPal extends CComponent
{
  //public $paypalEmail =
  public $paypalUrl;
  public $paymentAction;
  public $returnUrl;
  public $cancelUrl;
  public $notifyUrl;
  public $shopReturnUrl;
  public $shopCancelUrl;
  public $shopNotifyUrl;
  public $currency = 'USD';
  public $defaultQty = '1';
  public $apiMode;
  public $bizEmail;
  public $itemName = '';

  public function init()
  {
		//Whether we are in sandbox or in live environment
		if ($this->apiMode == 1)
    {
      //live
      $this->paypalUrl = '#';
    }else{
      //sandbox
      $this->paypalUrl = '#';
    }
    //set return and cancel urls
    $this->returnUrl = Yii::app()->createAbsoluteUrl($this->returnUrl);
    $this->cancelUrl = Yii::app()->createAbsoluteUrl($this->cancelUrl);
    $this->shopReturnUrl= Yii::app()->createAbsoluteUrl($this->shopReturnUrl);
    $this->shopCancelUrl = Yii::app()->createAbsoluteUrl($this->shopCancelUrl);
  }

  public function buyBundles()
  {
    $data   = Yii::app()->user->getState('selfcare');

    $amount = round ($data['amount'] * 0.00938833);
    $units  = $data['units'];

    $is_paypal_sandbox = $this->apiMode;//live or test

    $querystring  = "?business=".urlencode($this->bizEmail)."&";
    $querystring .= "cmd=".urlencode("_xclick")."&";
    $querystring .= "currency_code=".urlencode($this->currency)."&";
    $querystring .= "return=".urlencode(stripslashes($this->returnUrl))."&";
    $querystring .= "cancel_return=".urlencode(stripslashes($this->cancelUrl))."&";
    $querystring .= "notify_url=".urlencode(stripslashes($this->notifyUrl))."&";
    $querystring .= "rm=".urlencode(2)."&";
    $querystring .= "paymentaction=".urlencode(stripslashes($this->paymentAction))."&";
    $querystring .= "item_name=".urlencode($units.' Bulk SMS Units')."&";
    $querystring .= "amount=".urlencode(stripslashes($amount))."&";
    $querystring .= "quantity=1&";
    $querystring .= "email=".urlencode(stripslashes($data['email']))."&";
    header('location:'.$this->paypalUrl.$querystring);
    exit;
  }


  public function payNow()
  {
    $data   = Yii::app()->user->getState('_pay_now');

    $amount = round ($data['amount'] * 0.00938833);
    $is_paypal_sandbox = $this->apiMode;//live or test

    $querystring  = "?business=".urlencode($this->bizEmail)."&";
    $querystring .= "cmd=".urlencode("_xclick")."&";
    $querystring .= "currency_code=".urlencode($this->currency)."&";
    $querystring .= "return=".urlencode(stripslashes($this->returnUrl))."&";
    $querystring .= "cancel_return=".urlencode(stripslashes($this->cancelUrl))."&";
    $querystring .= "notify_url=".urlencode(stripslashes($this->notifyUrl))."&";
    $querystring .= "rm=".urlencode(2)."&";
    $querystring .= "paymentaction=".urlencode(stripslashes($this->paymentAction))."&";
    $querystring .= "item_name=".urlencode(' Custom Service Payment')."&";
    $querystring .= "amount=".urlencode(stripslashes($amount))."&";
    $querystring .= "quantity=1&";
    $querystring .= "email=".urlencode(stripslashes($data['email']))."&";
    header('location:'.$this->paypalUrl.$querystring);
    exit;
  }
}
