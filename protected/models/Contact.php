<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class Contact extends CFormModel
{
	public $name;
	public $email;
	public $phone;
	public $city;
	public $subject;
	public $body;
	public $amount;
	public $verifyCode;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('name, email, phone, body', 'required', 'on'=>'contact'),
			array('name, email, phone, amount', 'required', 'on'=>'payon'),
			array('phone', 'required', 'on'=>'callbk'),
			array('name, email, phone', 'required', 'on'=>'singup'),
			array('name', 'length', 'max'=>125),
			array('phone', 'length', 'max'=>12),
			array('body', 'length', 'max'=>750),
			array('phone', 'numerical', 'integerOnly'=>true),
			// email has to be a valid email address
			array('email', 'email'),
			// verifyCode needs to be entered correctly
		//	array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		 //array('verifyCode', 'captcha', 'on'=>'payon'),
		 array('verifyCode', 'CaptchaExtendedValidator', 'allowEmpty'=>!CCaptcha::checkRequirements(),  'on'=>'payon')
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'verifyCode'=>'Verification Code',
		);
	}
}
