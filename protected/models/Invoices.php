<?php

/**
 * This is the model class for table "invoices".
 *
 * The followings are the available columns in table 'invoices':
 * @property integer $id
 * @property string $title
 * @property integer $invoice_type_id
 * @property integer $to_id
 * @property integer $from_id
 * @property string $rm_total
 * @property string $resit_details
 * @property string $other_details
 * @property string $remarks
 * @property integer $status
 * @property string $timestamp
 * @property integer $kid_id
 *
 * The followings are the available model relations:
 * @property InvoiceDetails[] $invoiceDetails
 * @property InvoiceType $invoiceType
 * @property Users $to
 * @property Users $from
 * @property Kids $kid
 * @property InvoiceStatus $status0
 */
class Invoices extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'invoices';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('to_id, from_id, rm_total', 'required'),
			array('invoice_type_id, to_id, from_id, status, kid_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('rm_total', 'length', 'max'=>19),
			array('resit_details, other_details, remarks', 'safe'),
			array('resit_details','required',  'on'=>'pay'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, invoice_type_id, to_id, from_id, rm_total, resit_details, other_details, remarks, status, timestamp, kid_id', 'safe', 'on'=>'search'),
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
			'invoiceDetails' => array(self::HAS_MANY, 'InvoiceDetails', 'invoice_id'),
			'invoiceType' => array(self::BELONGS_TO, 'InvoiceType', 'invoice_type_id'),
			'to' => array(self::BELONGS_TO, 'User', 'to_id'),
			'from' => array(self::BELONGS_TO, 'User', 'from_id'),
			'kid' => array(self::BELONGS_TO, 'Kids', 'kid_id'),
			'invoiceStatus' => array(self::BELONGS_TO, 'InvoiceStatus', 'status'),
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
			'invoice_type_id' => 'Invoice Type',
			'to_id' => 'To',
			'from_id' => 'From',
			'rm_total' => 'Rm Total',
			'resit_details' => 'Resit Details',
			'other_details' => 'Other Details',
			'remarks' => 'Remarks',
			'status' => 'Status',
			'timestamp' => 'Timestamp',
			'kid_id' => 'Kid',
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
		$criteria->compare('invoice_type_id',$this->invoice_type_id);
		$criteria->compare('to_id',$this->to_id);
		$criteria->compare('from_id',$this->from_id);
		$criteria->compare('rm_total',$this->rm_total,true);
		$criteria->compare('resit_details',$this->resit_details,true);
		$criteria->compare('other_details',$this->other_details,true);
		$criteria->compare('remarks',$this->remarks,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('timestamp',$this->timestamp,true);
		$criteria->compare('kid_id',$this->kid_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Invoices the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
