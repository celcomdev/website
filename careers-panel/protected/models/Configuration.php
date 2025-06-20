<?php

/**
 * This is the model class for table "configuration".
 *
 * The followings are the available columns in table 'configuration':
 * @property integer $id_configuration
 * @property string $code
 * @property string $key
 * @property string $value
 */
class Configuration extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'configuration';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_configuration_group, code,key,value', 'safe'),
		);
	}

	public function getConfigurations()
	{
		return Configuration::model()->findAll();
  }
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Configuration the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
