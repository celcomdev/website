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
class Orders extends CActiveRecord
{
	public $min;
	public $max;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'orders';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, telephone, email, units', 'required'),
			array('invoice_no, min, max, product_id, units, currency_id, order_status_id', 'numerical', 'integerOnly'=>true),
			array('invoice_prefix', 'length', 'max'=>30),
			array('name, email, payment_method', 'length', 'max'=>150),
			array('telephone', 'length', 'max'=>50),
			array('price, min, max', 'length', 'max'=>6),
			array('total, ip_address', 'length', 'max'=>20),
			array('payment_method_code, order_status_name', 'length', 'max'=>100),
			array('currency_code', 'length', 'max'=>3),
			array('remarks', 'length', 'max'=>360),
			array('currency_value', 'length', 'max'=>15),
			array('date_created', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, invoice_no, invoice_prefix, product_id, name, telephone, email, units, price, total, payment_method, payment_method_code, currency_id, currency_code, order_status_id, order_status_name, remarks, ip_address, currency_value, date_modified, date_created', 'safe', 'on'=>'search'),
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
			'invoice_no' => 'Invoice No',
			'invoice_prefix' => 'Invoice Prefix',
			'product_id' => 'Product',
			'name' => 'Name',
			'telephone' => 'Telephone',
			'email' => 'Email',
			'units' => 'Units',
			'price' => 'Price',
			'total' => 'Total',
			'payment_method' => 'Payment Method',
			'payment_method_code' => 'Payment Method Code',
			'currency_id' => 'Currency',
			'currency_code' => 'Currency Code',
			'order_status_id' => 'Order Status',
			'order_status_name' => 'Order Status Name',
			'remarks' => 'Remarks',
			'ip_address' => 'Ip Address',
			'currency_value' => 'Currency Value',
			'date_modified' => 'Date Modified',
			'date_created' => 'Date Created',
		);
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
