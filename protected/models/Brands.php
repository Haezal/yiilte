<?php

/**
 * This is the model class for table "brands".
 *
 * The followings are the available columns in table 'brands':
 * @property integer $id
 * @property string $name
 * @property string $logo
 * @property string $owner_id
 * @property string $description
 * @property string $changetime
 *
 * The followings are the available model relations:
 * @property Branchs[] $branchs
 */
class Brands extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'brands';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description', 'required'),
			array('logo', 'file', 'types'=>'jpg, gif, png','allowEmpty'=>true),
			array('name, logo, owner_id', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, logo, owner_id, description, changetime', 'safe', 'on'=>'search'),
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
			'branchs' => array(self::HAS_MANY, 'Branchs', 'brand_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'logo' => 'Logo',
			'owner_id' => 'Owner',
			'description' => 'Description',
			'changetime' => 'Changetime',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('owner_id',$this->owner_id,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('changetime',$this->changetime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Brands the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
