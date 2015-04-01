<?php

class BranchsController extends Controller
{
	/**
	* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	* using two-column layout. See 'protected/views/layouts/column2.php'.
	*/
	public $layout='//layouts/column1';
	public $defaultAction="admin";

	/**
	* @return array action filters
	*/
	public function filters()
	{
		return array(
	
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			));
	}

	/**
	* Creates a new model.
	* If creation is successful, the browser will be redirected to the 'view' page.
	*/
	public function actionCreate()
	{
		$model=new Branchs;
		$owner=new BranchOwners;

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

		if(isset($_POST['Branchs']))
		{
			$model->attributes=$_POST['Branchs'];
			$owner->attributes=$_POST['BranchOwners'];
			
			$owner->branch_id = 0;

			$valid = $model->validate();
			$valid = $owner->validate() & $valid;

			if($valid){
				try {
					$transaction=$model->getDbConnection()->beginTransaction();

					$model->save();

					$owner->branch_id=$model->id;
					$owner->save();

					$transaction->commit();
					Yii::app()->user->setFlash('success', 'Saved');
					$this->redirect(array('admin'));
				} catch (Exception $e) {
					$transaction->rollback();
					Yii::app()->user->setFlash('error', 'Invalid save');
				}
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'owner'=>$owner
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

		$owner=$model->branchOwners;
		if(!$owner){
			$owner=new BranchOwners;
		}

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

		if(isset($_POST['Branchs']))
		{
			$model->attributes=$_POST['Branchs'];
			$owner->attributes=$_POST['BranchOwners'];
			$owner->branch_id = 0;

			$valid = $model->validate();
			$valid = $owner->validate() & $valid;

			if($valid){
				try {
					$transaction=$model->getDbConnection()->beginTransaction();

					$model->save();

					$owner->branch_id=$model->id;
					$owner->save();

					$transaction->commit();
					Yii::app()->user->setFlash('success', 'Saved');
					$this->redirect(array('admin'));
				} catch (Exception $e) {
					$transaction->rollback();
					Yii::app()->user->setFlash('error', 'Invalid save');
				}
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'owner'=>$owner,
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
		$dataProvider=new CActiveDataProvider('Branchs');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			));
	}

	/**
	* Manages all models.
	*/
	public function actionAdmin($id=null)
	{
		$this->pageTitle=Yii::app()->name. ' - Senarai Tadika';
		$this->layout="//layouts/column1";
		$model=new Branchs('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Branchs']))
			$model->attributes=$_GET['Branchs'];

		if(!Yii::app()->user->checkAccess('Administrator')){
			$model->owner=Yii::app()->user->id;
		}

		if($id!=NULL){
			$model->brand_id=$id;
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Create branch Owner
	 *
	 * @return void
	 * @author haezal
	 **/
	public function actionOwner($id)
	{
		$branch = $this->loadModel($id);

		$model = new BranchOwners;

		$this->render('owner', array(
			'branch'=>$branch,
		));
	}

	/**
	* Returns the data model based on the primary key given in the GET variable.
	* If the data model is not found, an HTTP exception will be raised.
	* @param integer the ID of the model to be loaded
	*/
	public function loadModel($id)
	{
		$model=Branchs::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='branchs-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
