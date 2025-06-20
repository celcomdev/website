<?php
/**
 * UserChangePassword class.
 * UserChangePassword is the data structure for keeping
 * user change password form data. It is used by the 'changepassword' action of 'UserController'.
 */
class UserChangePassword extends CFormModel {
	public $oldPassword;
	public $password;
	public $verifyPassword;

	public function rules() 
	{
		return
		array(
			array('oldPassword, password, verifyPassword', 'required'),
			array('oldPassword, password, verifyPassword', 'length', 'max'=>128, 'min' => 4,'message' => "Incorrect password (minimal length 4 symbols)"),
			array('verifyPassword', 'compare', 'compareAttribute'=>'password', 'message' => "Retype Password is incorrect"),
			//array('oldPassword', 'verifyOldPassword'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'oldPassword'=>"Old Password",
			'password'=>"password",
			'verifyPassword'=>"Retype Password",
		);
	}

	/**
	 * Verify Old Password
	 */
	 public function verifyOldPassword($attribute, $params)
	 {
	 	 if (User::model()->notsafe()->findByPk(Yii::app()->user->getId())->password != User::model()->validatePassword($this->$attribute))
     	{
			 $this->addError($attribute, "Old Password is incorrect");
	 	}

	}

	public function update($newPassword, $userId) 
	{
		$user = Yii::app()->db->createCommand()
    		->update('users', 
    		    array(
    		        'password'=>$newPassword,
    		    ),
    		    'id=:id',
    		    array(':id'=>$userId)
    		);
		return $user;
	}
}
