<?php

/**
 * This is the model class for table "invoice_details".
 *
 * The followings are the available columns in table 'invoice_details':
 * @property string $id
 * @property integer $invoice_id
 * @property integer $invoice_status_id
 * @property string $date
 * @property integer $updated_by
 *
 * The followings are the available model relations:
 * @property Users $updatedBy
 * @property Invoices $invoice
 * @property InvoiceStatus $invoiceStatus
 */
class InvoiceDetails extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'invoice_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('invoice_id, invoice_status_id, updated_by', 'numerical', 'integerOnly'=>true),
			array('date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, invoice_id, invoice_status_id, date, updated_by', 'safe', 'on'=>'search'),
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
			'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
			'invoice' => array(self::BELONGS_TO, 'Invoices', 'invoice_id'),
			'invoiceStatus' => array(self::BELONGS_TO, 'InvoiceStatus', 'invoice_status_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'invoice_id' => 'Invoice',
			'invoice_status_id' => 'Invoice Status',
			'date' => 'Date',
			'updated_by' => 'Updated By',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('invoice_id',$this->invoice_id);
		$criteria->compare('invoice_status_id',$this->invoice_status_id);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('updated_by',$this->updated_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return InvoiceDetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
