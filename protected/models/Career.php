<?php

/**
 * This is the model class for table "orders".
 *
 * The followings are the available columns in table 'orders':
 * @property integer $id
 * @property integer $invoice_no
 * @property string $invoice_prefix
 * @property integer $product_id
 * @property string $name
 * @property string $telephone
 * @property string $email
 * @property integer $units
 * @property string $price
 * @property string $total
 * @property string $payment_method
 * @property string $payment_method_code
 * @property integer $currency_id
 * @property string $currency_code
 * @property integer $order_status_id
 * @property string $order_status_name
 * @property string $remarks
 * @property string $ip_address
 * @property string $currency_value
 * @property string $date_modified
 * @property string $date_created
 */
class Career extends CActiveRecord
{
	public $min;
	public $max;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'jobs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array();
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array();
	}

    public function all()
	{
		$jobs = Career::model()->findAll(array('select'=> '*', 'condition' => 'status=1', 'order' => 'created_on DESC'));


		return $jobs;
	}

    public function details($slug)
	{
		$job = Career::model()->findAll(array('select'=> '*', 
                        'condition' => "status=1 AND alias = '{$slug}'", 
                        'order' => 'created_on DESC'));

		return $job;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Orders the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
