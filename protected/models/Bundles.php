<?php

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property integer $id
 * @property integer $min_sms
 * @property integer $max_sms
 * @property integer $vendor_id
 * @property string $sms_bundle
 * @property string $price
 * @property integer $status
 */
class Bundles extends CFormModel
{
	public $min_sms;
	public $max_sms;
	public $name;
	public $email;
	public $phone;
	public $sender_id;
	public $sms_bundle;
	public $sms_price;
	public $amount;

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, email, phone, sms_bundle', 'required', 'on'=>'bundlez'),
			array('name, email, phone, amount', 'required', 'on'=>'payon'),
			array('min_sms, max_sms', 'numerical', 'integerOnly'=>true),
			array('amount, sms_price', 'numerical'),
			array('email', 'email', 'message'=>'Invalid email addresss'),
			array('sms_bundle, phone', 'length', 'max'=>12),
			array('sms_bundle', 'checkBundles'),
			array('name, email', 'length', 'max'=>128),
			array('sms_price', 'length', 'max'=>16),
		);
	}


	/**
	* @Author: ANH DUNG Jun 27, 2014
	*/
	public function checkBundles($attributes=null, $clearErrors=true)
	{
		if($this->sms_bundle)
		{
			if($this->sms_bundle < $this->min_sms || $this->sms_bundle > $this->max_sms)
			{
			  $this->addError('sms_bundle', "Enter SMS Units between ".$this->min_sms ." & ".$this->max_sms);
			}
		}
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'min_sms' => 'Min Sms',
			'max_sms' => 'Max Sms',
			'sender_id' => 'Sender Id Branding?',
			'sms_bundle' => 'Sms Bundle',
			'status' => 'Status',
		);
	}

}
