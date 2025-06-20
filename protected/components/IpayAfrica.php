<?php
/**
 *
 */
class IpayAfrica extends CComponent
{
  public $ipayUrl;
  public $apiMode;
  public $ipnUrl;
  public $returnUrl;
  public $vendorId;
  public $ipaySec;
  public $live;
  public $currency;

  public function init()
  {
    //Whether we are in sandbox or in live environment
    if ($this->apiMode == 1)
    {
      $this->live = 1;
    }else{
      //sandbox
      $this->live = 0;
    }
  }

  public function buyBundles()
  {
    $data  = Yii::app()->user->getState('selfcare');
    $mm		= 1;
    $mb		= 1;
    $dc		= 1;
    $cc		= 1;

    $invoice_no = intval( "0" . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) );

    $oid 	= $invoice_no;
    $inv 	= $invoice_no;
    $ttl 	= round($data['amount']);
    $tel 	= $data['phone'];
    $eml 	= $data['email'];

    /**
     * incase of any dashes in the telephone number the code below removes them
     * @var [string]
    */
    $tel 	= str_replace("-", "", $tel);
    $tel 	= str_replace( array(' ', '<', '>', '&', '{', '}', '*', "+", '!', '@', '#', "$", '%', '^', '&'), "", $tel );

    //Vendor ID
    $vid	= $this->vendorId;
    $curr	= $this->currency;

    /**
     * $p1, $p2, $p3, $p4  are optional fields. Allow sending & receiving your custom parameters
     */
    $p1		= '';
    $p2 	= '';
    $p3 	= '';
    $p4 	= '';

    /* [$callbk holds the callback URL]*/
    $callbk =  Yii::app()->createAbsoluteUrl($this->returnUrl);

    $cst 	= 1;
    $crl 	= 0;

    /**
    * [$hsh holds the merchant's secret key]
    */
    //$hsh =  $this->ipaySec;
    $hsh =  'hdsj56CeLcOm145AX';

    //The data string values
    $datastring =$this->live.$oid.$inv.$ttl.$tel.$eml.$vid.$curr.$p1.$p2.$p3.$p4.$callbk.$cst.$crl;

    //Setting the hashing algorithm to SHA1
    $hashid = hash_hmac('sha1', $datastring, $hsh);

    //URLENCODE
    $cbk =  urlencode(stripslashes($this->returnUrl));

    $data = $this->ipayUrl.'?live='.$this->live.'&oid='.$oid.'&inv='.$inv.'&ttl='.$ttl.'&tel='.$tel.'&eml='.$eml.'&vid='.$vid.'&p1='.$p1.'&p2='.$p2.'&p3='.$p3.'&p4='.$p4.'&crl='.$crl.'&cbk='.$cbk.'&cst='.$cst.'&curr='.$curr.'&hsh='.$hashid.'';

    header('location:'.$data);
    exit;
  }
}

 ?>
