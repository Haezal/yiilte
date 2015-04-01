<?php

/**
 * This is the model class for table "branchs".
 *
 * The followings are the available columns in table 'branchs':
 * @property integer $id
 * @property string $name
 * @property integer $owner_id
 * @property integer $capacity
 * @property string $fees
 * @property integer $brand_id
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $gmaps
 * @property string $description
 * @property string $changetime
 * @property string $tel
 * @property string $latlong
 * @property integer $status
 * @property string $image
 * @property integer $account
 * @property string $bank
 *
 * The followings are the available model relations:
 * @property BranchManagers[] $branchManagers
 * @property BranchTeachers[] $branchTeacher
 * @property BranchOwners[] $branchOwners
 * @property Brands $brand
 */
class Branchs extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */

	public $owner;
	public function tableName()
	{
		return 'branchs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, brand_id, address, gmaps, description, tel', 'required'),
			array('owner_id, capacity, brand_id, status, account', 'numerical', 'integerOnly'=>true),
			array('name, fees, tel', 'length', 'max'=>255),
			array('city, latlong, image', 'length', 'max'=>40),
			array('state', 'length', 'max'=>3),
			array('bank', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, owner_id, owner, capacity, fees, brand_id, address, city, state, gmaps, description, changetime, tel, latlong, status, image, account, bank', 'safe', 'on'=>'search'),
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
			'branchManagers' => array(self::HAS_MANY, 'BranchManagers', 'branch_id'),
			'kids' => array(self::HAS_MANY, 'Kids', 'branch_id'),
			'branchTeachers' => array(self::HAS_MANY, 'BranchTeachers', 'branch_id'),
			'branchOwners' => array(self::HAS_ONE, 'BranchOwners', 'branch_id'),
			'brand' => array(self::BELONGS_TO, 'Brands', 'brand_id'),
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
			'owner_id' => 'Owner',
			'capacity' => 'Capacity',
			'fees' => 'Fees',
			'brand_id' => 'Brand',
			'address' => 'Address',
			'city' => 'City',
			'state' => 'State',
			'gmaps' => 'Gmaps',
			'description' => 'Description',
			'changetime' => 'Changetime',
			'tel' => 'Tel',
			'latlong' => 'Latlong',
			'status' => 'Status',
			'image' => 'Image',
			'account' => 'Account',
			'bank' => 'Bank',
			'owner'=>'Owner',
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
		$criteria->compare('owner_id',$this->owner_id);
		$criteria->compare('capacity',$this->capacity);
		$criteria->compare('fees',$this->fees,true);
		$criteria->compare('brand_id',$this->brand_id);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('gmaps',$this->gmaps,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('changetime',$this->changetime,true);
		$criteria->compare('tel',$this->tel,true);
		$criteria->compare('latlong',$this->latlong,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('account',$this->account);
		$criteria->compare('bank',$this->bank,true);

		$criteria->with=array('branchOwners');
		$criteria->compare('user_id',$this->owner,true);


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Branchs the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
