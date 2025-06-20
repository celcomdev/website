<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $activkey
 * @property string $create_at
 * @property string $lastvisit_at
 * @property integer $superuser
 * @property integer $status
 * @property integer $is_suspended
 */
class Mtawala extends CActiveRecord
{
	const STATUS_NOACTIVE=0;
	const STATUS_ACTIVE=1;
	const STATUS_BANNED=-1;

	//TODO: Delete for next version (backward compatibility)
	const STATUS_BANED=-1;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email, create_at, phone, name, superuser, status, role, mail_verified', 'required'),
			array('superuser, status, role, mail_verified', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>200),
			array('password, email, activkey', 'length', 'max'=>128),
			array('lastvisit_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'activkey' => 'Activkey',
			'create_at' => 'Create At',
			'lastvisit_at' => 'Lastvisit At',
			'superuser' => 'Superuser',
			'status' => 'Status',
			'is_suspended' => 'Is Suspended',
		);
	}

	public function scopes()
  {
    return array(
      'active'=>array(
          'condition'=>'status='.self::STATUS_ACTIVE,
      ),
      'notactive'=>array(
          'condition'=>'status='.self::STATUS_NOACTIVE,
      ),
      'banned'=>array(
          'condition'=>'status='.self::STATUS_BANNED,
      ),
      'superuser'=>array(
          'condition'=>'superuser=1',
      ),
      'notsafe'=>array(
      	'select' => 'id, username, password, email, activkey, create_at, lastvisit_at, superuser, status',
      ),
    );
  }

	public function validatePassword($string)
	{
		return $this->hashPassword($string) === $this->password;
	}

	public function generateActivationCode($email)
	{
		return sha1(mt_rand(10000, 99999).time().$email);
	}

	/**
	 * Generates the password hash.
	 * @param string password
	 * @return string hash
	 */
	public function hashPassword($string)
	{
		return md5($string);
	}

	// public function generateSalt($cost = 13)
	// {
	// 	if (!is_numeric($cost) || $cost < 4 || $cost > 31) {
	// 		throw new Exception("cost parameter must be between 4 and 31");
	// 	}
	//
	// 	$rand = array();
	// 	for ($i = 0; $i < 8; $i += 1) {
	// 		$rand[] = pack('S', mt_rand(0, 0xffff));
	// 	}
	//
	// 	$rand[] = substr(microtime(), 2, 6);
	// 	$rand = sha1(implode('', $rand), true);
	// 	$salt = '$2a$' . str_pad((int) $cost, 2, '0', STR_PAD_RIGHT) . '$';
	// 	$salt .= strtr(substr(base64_encode($rand), 0, 22), array('+' => '.'));
	//
	// 	return $salt;
	// }

	public function encrypting($string)
	{
		return md5($string);
	}

	public function loadAdmin($id)
	{
		$model= Mtawala::model()->findByPk($id);

		if($model===null)
			throw new CHttpException(404,'Are you sure your are a legitimate user');

		return $model;
	}

	public function all() 
	{
		$query = Mtawala::model()->findAll(array('select'=>'id, username, email, name, phone','condition'=>'', 'order'=>'id DESC'));

		return $query;
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Mtawala the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
