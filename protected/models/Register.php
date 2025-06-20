<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class Register extends CFormModel
{
	public $name;
	public $company;
	public $mobile;
	public $email;
	public $username;
	public $country;
	public $senderid;
	//public $verifyCode;


	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('name, mobile, email', 'required'),
			// email has to be a valid email address
			array('email', 'email'),
			array('senderid','length',  'max'=>11),
			array('name','length',  'max'=>156),
			array('mobile', 'match', 'pattern' => '/^([+]?[0-9 ]+)$/', 'message' => 'Enter valid mobile number.'),
			array('mobile', 'length', 'max'=>15),
			array('name, country, senderid', 'match', 'pattern' => '/^[A-Za-z0-9]+$/u', 'message' => 'Invalid name.Avoid special characters($,@,_ etc..)'),
			array('username', 'match', 'pattern' => '/^[A-Za-z0-9]+$/u', 'message' => 'Invalid name.Avoid special characters($,@,_ etc..)'),

			// verifyCode needs to be entered correctly
			//array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
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
			//'verifyCode'=>'Verification Code',
			'firstname'=>'First Name',
			'lastname'=>'Last Name',
			'company'=>'Name of your organisation',
			'mobile'=>'Mobile Number',
			'email'=>'Your email address',
			'username'=>'Desired User name',
			'country'=>'Your Country',
			'senderid'=>'Preferred Sender Id(not exceeding 11 chars) 	',

		);
	}
}
