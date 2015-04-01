<?php

/**
 * This is the model class for table "kid_photos".
 *
 * The followings are the available columns in table 'kid_photos':
 * @property integer $id
 * @property integer $kid_id
 * @property string $filename
 * @property string $filepath
 * @property string $filesize
 * @property string $filetype
 *
 * The followings are the available model relations:
 * @property Kids $kid
 */
class KidPhotos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'kid_photos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kid_id', 'numerical', 'integerOnly'=>true),
			array('filename', 'length', 'max'=>100),
			array('filepath', 'length', 'max'=>200),
			array('filesize, filetype', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, kid_id, filename, filepath, filesize, filetype', 'safe', 'on'=>'search'),
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
			'kid' => array(self::BELONGS_TO, 'Kids', 'kid_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'kid_id' => 'Kid',
			'filename' => 'Filename',
			'filepath' => 'Filepath',
			'filesize' => 'Filesize',
			'filetype' => 'Filetype',
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
		$criteria->compare('kid_id',$this->kid_id);
		$criteria->compare('filename',$this->filename,true);
		$criteria->compare('filepath',$this->filepath,true);
		$criteria->compare('filesize',$this->filesize,true);
		$criteria->compare('filetype',$this->filetype,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return KidPhotos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
