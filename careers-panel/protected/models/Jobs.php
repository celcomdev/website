<?php

/**
 * This is the model class for table "jobs".
 *
 * The followings are the available columns in table 'jobs':
 * @property integer $id
 * @property string $title
 * @property string $alias
 * @property string $category
 * @property string $type
 * @property integer $status
 * @property string $salary_range
 * @property string $introduction
 * @property string $description
 * @property string $qualifications
 * @property string $apply_info
 * @property string $hits
 * @property string $created_on
 * @property string $apply_by
 */
class Jobs extends CActiveRecord
{
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
		return array(
			array('title, status, introduction, description, apply_info, apply_by', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('title, alias, category, salary_range', 'length', 'max'=>255),
			array('type', 'length', 'max'=>100),
			array('introduction', 'length', 'max'=>256),
			array('hits', 'length', 'max'=>11),
			array('description, qualifications, apply_info', 'safe'),
			array('created_on', 'default', 'value'=>new CDbExpression('NOW()'),'setOnEmpty'=>false,'on'=>'insert'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, alias, category, type', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'alias' => 'Alias',
			'category' => 'Category',
			'type' => 'Type',
			'status' => 'Status',
			'salary_range' => 'Salary Range',
			'introduction' => 'Introduction',
			'description' => 'Description',
			'qualifications' => 'Qualifications',
			'apply_info' => 'Apply Info',
			'hits' => 'Hits',
			'created_on' => 'Created On',
			'apply_by' => 'Apply By',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('salary_range',$this->salary_range,true);
		$criteria->compare('introduction',$this->introduction,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('qualifications',$this->qualifications,true);
		$criteria->compare('apply_info',$this->apply_info,true);
		$criteria->compare('hits',$this->hits,true);
		$criteria->compare('created_on',$this->created_on,true);
		$criteria->compare('apply_by',$this->apply_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Jobs the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
