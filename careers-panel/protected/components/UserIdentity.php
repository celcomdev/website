<?php

/**

 * UserIdentity represents the data needed to identity a user.

 * It contains the authentication method that checks if the provided

 * data can identity the user.

 */

class UserIdentity extends CUserIdentity

{

	const ERROR_EMAIL_INVALID=3;
	const ERROR_STATUS_NOTACTIV=4;
	const ERROR_STATUS_BAN=5;
	private $_id;



	/**

	 * Authenticates a user.

	 * The example implementation makes sure if the username and password

	 * are both 'demo'.

	 * In practical applications, this should be changed to authenticate

	 * against some persistent user identity storage (e.g. database).

	 * @return boolean whether authentication succeeds.

	 */

	public function authenticate()
	{

		$user = Mtawala::model()->notsafe()->findByAttributes(array('username' => $this->username));

		if($user===null) {
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}
		else if(!$user->validatePassword($this->password)) {
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}
		else if($user->status==0) {
			$this->errorCode=self::ERROR_STATUS_NOTACTIV;
		}
		else {

			$this->_id=$user->id;
			Yii::app()->user->setState('username', $user->username);
			$this->username=$user->username;

			$this->errorCode=self::ERROR_NONE;
		}

		return $this->errorCode==self::ERROR_NONE;
	}



	/**

	 * @return integer the ID of the user record

	 */

	public function getId()

	{

		return $this->_id;

	}

}
