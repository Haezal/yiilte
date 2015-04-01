<?php

/**
 * This is the model class for table "{{profiles}}".
 *
 * The followings are the available columns in table '{{profiles}}':
 * @property integer $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $ic
 * @property string $no_kwsp
 * @property string $permit
 * @property string $salary
 *
 * The followings are the available model relations:
 * @property Users $user
 */
class TblProfiles extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{profiles}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, last_name', 'length', 'max'=>255),
			array('ic', 'length', 'max'=>12),
			array('no_kwsp', 'length', 'max'=>20),
			array('permit', 'length', 'max'=>30),
			array('salary', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_id, first_name, last_name, ic, no_kwsp, permit, salary', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'ic' => 'Ic',
			'no_kwsp' => 'No Kwsp',
			'permit' => 'Permit',
			'salary' => 'Salary',
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

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('ic',$this->ic,true);
		$criteria->compare('no_kwsp',$this->no_kwsp,true);
		$criteria->compare('permit',$this->permit,true);
		$criteria->compare('salary',$this->salary,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblProfiles the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
