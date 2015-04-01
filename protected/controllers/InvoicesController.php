<?php

class InvoicesController extends Controller
{
	/**
	* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	* using two-column layout. See 'protected/views/layouts/column2.php'.
	*/
	public $layout='//layouts/column1';

	/**
	* @return array action filters
	*/
	public function filters()
	{
		return array(
			// 'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	* Specifies the access control rules.
	* This method is used by the 'accessControl' filter.
	* @return array access control rules
	*/
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	* Displays a particular model.
	* @param integer $id the ID of the model to be displayed
	*/
	public function actionView($id)
	{
		$details = new InvoiceDetails('search');

		$details->unsetAttributes();  // clear any default values
		if(isset($_GET['InvoiceDetails']))
			$details->attributes=$_GET['InvoiceDetails'];

		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'details'=>$details,
		));
	}

	/**
	 * Approval status pembayaran 
	 *
	 * @return void
	 * @author haezal
	 **/
	public function actionApproval($id)
	{
		$model = $this->loadModel($id);

		$status = $_GET['status'];

		if(isset($_POST['Invoices'])){
			$model->attributes = $_POST['Invoices'];

			if ($status=="Y") {
				$model->status=2; // bayaran diterima
				$alert = "Maklumat bayaran telah diterima";
			}
			else{
				$model->status=4; // bayaran ditolak
				$alert = "Maklumat bayaran telah ditolak";
			}

			if ($model->save()) {
				// set invoice details
				$detail = new InvoiceDetails;
				$detail->invoice_id = $model->id;
				$detail->invoice_status_id=$model->status;
				$detail->updated_by=Yii::app()->user->id;
				$detail->save();

				$kid = Kids::model()->findByPk($model->kid_id);
				if ($model->status==2) {
					# update status murid kepada aktif
					$kid->status_id = 2; // status aktif;
				}
				else{
					$kid->status_id = 5; // status ditolak;	
				}
				$kid->save();

				Yii::app()->user->setFlash('success', $alert);
				$this->redirect(array('view', 'id'=>$model->id));
			}
		}

		$this->render('approval', array(
			'model'=>$model,
			'status'=>$status, 
		));
	}

	/**
	* Creates a new model.
	* If creation is successful, the browser will be redirected to the 'view' page.
	*/
	public function actionCreate()
	{
		$model=new Invoices;

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

		if(isset($_POST['Invoices']))
		{
			$model->attributes=$_POST['Invoices'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
			));
	}

	/**
	* Updates a particular model.
	* If update is successful, the browser will be redirected to the 'view' page.
	* @param integer $id the ID of the model to be updated
	*/
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

		if(isset($_POST['Invoices']))
		{
			$model->attributes=$_POST['Invoices'];
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			));
	}

	/**
	* Updates a particular model.
	* If update is successful, the browser will be redirected to the 'view' page.
	* @param integer $id the ID of the model to be updated
	*/
	public function actionPayment($id)
	{
		$model=$this->loadModel($id);

		$model->scenario="pay";

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

		if(isset($_POST['Invoices']))
		{
			$model->attributes=$_POST['Invoices'];
			$model->status=5; // automatik update sebagai bayar
			if($model->save()){

				// add invoice details
				$invoiceDetails = new InvoiceDetails;
				$invoiceDetails->invoice_id = $model->id;
				$invoiceDetails->invoice_status_id = $model->status;
				$invoiceDetails->updated_by = Yii::app()->user->id;
				$invoiceDetails->save();

				$this->redirect(array('byKids','id'=>$model->kid_id));
			}
		}

		$this->render('payment',array(
			'model'=>$model,
			));
	}

	/**
	* Deletes a particular model.
	* If deletion is successful, the browser will be redirected to the 'admin' page.
	* @param integer $id the ID of the model to be deleted
	*/
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
	// we only allow deletion via POST request
			$this->loadModel($id)->delete();

	// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	* Lists all models.
	*/
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Invoices');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			));
	}

	/**
	* Manages all models.
	*/
	public function actionAdmin()
	{
		$model=new Invoices('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Invoices']))
			$model->attributes=$_GET['Invoices'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Senarai Invoice By Kids
	 *
	 * @return void
	 * @author 
	 **/
	public function actionByKids($id)
	{
		$kid = $this->loadModelKids($id);
		$model=new Invoices('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Invoices']))
			$model->attributes=$_GET['Invoices'];

		$model->kid_id=$id;
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	* Returns the data model based on the primary key given in the GET variable.
	* If the data model is not found, an HTTP exception will be raised.
	* @param integer the ID of the model to be loaded
	*/
	public function loadModel($id)
	{
		$model=Invoices::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	public function loadModelKids($id)
	{
		$model=Kids::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	* Performs the AJAX validation.
	* @param CModel the model to be validated
	*/
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='invoices-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
