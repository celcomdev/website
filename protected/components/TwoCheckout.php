<?php
/**
 * Paypal.php
 * @package PayPal
 * @version 1.0
 */
class TwoCheckout extends CComponent
{
  //public $paypalEmail =
  public $payUrl;
  public $returnUrl;
  public $cancelUrl;
  public $currency = 'Kes';
  public $apiMode;
  public $itemName = '';

  public function init()
  {
		//Whether we are in sandbox or in live environment
		if ($this->apiMode == 1)
    {
      //live
      $this->payUrl = 'https://www.2checkout.com/checkout/purchase?';
    }else{
      //sandbox
      $this->payUrl = '  https://www.2checkout.com/checkout/purchase?';
    }
    //set return and cancel urls
    $this->returnUrl = Yii::app()->createAbsoluteUrl($this->returnUrl);
  }

  public function buyBundles()
  {
    $data   = Yii::app()->user->getState('selfcare');
    $amount = $data['amount'] * 0.00938833;
    $units  = $data['units'];

    $mode  = $this->apiMode;//live or test

    $args  = array(
      //'sid' => Yii::app()->config->getData('TWOCHECKOUT_ACCOUNT'),
      'sid'                 => '250540516273',
      //'privateKey'          => 'FDB5B5D4-D629-49E4-B4FC-4BDBA3F2C325',
      'demo'                => 'Y',
      'mode'                => '2CO',
      // 'cart_order_id'       => $data['order'],
      'purchase_step'       => 'payment-method',
      'currency_code'       => $this->currency,
      // 'first_name'	        => $data['name'],
			// 'last_name'		        => $data['name'],
      //'total'               => $amount,
      'li_0_price'          => Yii::app()->format->number($amount),
      'li_0_name'           => 'Purchase of '. $data['units'] .' SMS Units',
      /*'return_url'          =>  $this->cancelUrl,
      'x_receipt_link_url'  =>  $this->returnUrl,
      'card_holder_name'    =>  $data['name'],
      */
      //'street_address'=>,
      'city'                =>   'Nairobi',
      'state'               =>  'Kenya',
      'zip'                 =>  '0254',
      'country'             =>  'Kenya',
      'phone'               =>  $data['phone'],
      'email'               =>  $data['email'],
    );

    $url = $this->payUrl.http_build_query($args, '', '&amp;');

    header('location:'.$url);
    exit;
  }

}
