<?php

/**
 * This is the model class for table "kids".
 *
 * The followings are the available columns in table 'kids':
 * @property integer $id
 * @property string $fullname
 * @property string $gender
 * @property string $pics
 * @property string $ic
 * @property string $birthplace
 * @property string $previous_school
 * @property string $mykids
 * @property string $birthday
 * @property string $alergic_to
 * @property integer $parent_id
 * @property integer $branch_id
 * @property string $status
 * @property integer $status_id
 * @property string $changetime
 *
 * The followings are the available model relations:
 * @property Invoices[] $invoices
 * @property KidPhotos[] $kidPhotoses
 * @property KidStatus $status0
 * @property Branchs $branch
 * @property Users $parent
 */
class Kids extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'kids';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fullname, gender, birthplace, previous_school, mykids, birthday, alergic_to, parent_id', 'required'),
			array('parent_id, branch_id, status_id', 'numerical', 'integerOnly'=>true),
			array('mykids', 'unique'),
			array('fullname, gender, pics, ic, birthplace, mykids, birthday, status', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fullname, gender, pics, ic, birthplace, previous_school, mykids, birthday, alergic_to, parent_id, branch_id, status, status_id, changetime', 'safe', 'on'=>'search'),
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
			'invoices' => array(self::HAS_MANY, 'Invoices', 'kid_id'),
			'kidPhoto' => array(self::HAS_ONE, 'KidPhotos', 'kid_id'),
			'kidStatus' => array(self::BELONGS_TO, 'KidStatus', 'status_id'),
			'branch' => array(self::BELONGS_TO, 'Branchs', 'branch_id'),
			'parent' => array(self::BELONGS_TO, 'User', 'parent_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fullname' => 'Nama Murid',
			'gender' => 'Gender',
			'pics' => 'Pics',
			'ic' => 'Ic',
			'birthplace' => 'Birthplace',
			'previous_school' => 'Previous School',
			'mykids' => 'Mykids',
			'birthday' => 'Birthday',
			'alergic_to' => 'Alergic To',
			'parent_id' => 'Parent',
			'branch_id' => 'Branch',
			'status' => 'Status',
			'status_id' => 'Status',
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
		$criteria->compare('fullname',$this->fullname,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('pics',$this->pics,true);
		$criteria->compare('ic',$this->ic,true);
		$criteria->compare('birthplace',$this->birthplace,true);
		$criteria->compare('previous_school',$this->previous_school,true);
		$criteria->compare('mykids',$this->mykids,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('alergic_to',$this->alergic_to,true);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('branch_id',$this->branch_id);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('changetime',$this->changetime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Kids the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
