<?php

class BranchTeachersController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
		$model=new BranchTeachers;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BranchTeachers']))
		{
			$model->attributes=$_POST['BranchTeachers'];
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

		if(isset($_POST['BranchTeachers']))
		{
			$model->attributes=$_POST['BranchTeachers'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
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
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	/**
	 * Lists all models.
	 */
	public function actionIndex($id=null)
	{
		if (Yii::app()->session['branch_id']&&$id==null) {
			$id = Yii::app()->session['branch_id'];
		}

		$branch = $this->loadModelBranchs($id);
		if(!$branch){
			Yii::app()->user->setFlash('error', 'Tiada tadika yang dipilih');
			$this->redirect(array('/branchs'));
		}

		Yii::app()->session['branch_id']=$id;
		// $dataProvider=new CActiveDataProvider('BranchTeachers', array('criteria'=>array(
		// 	'condition'=>'branch_id=:branch_id', 
		// 	'params'=>array(":branch_id"=>$id),
		// )));

		$user=new User;
		$profile=new Profile;
		// $this->performAjaxValidation(array($user,$profile));
		if(isset($_POST['User']))
		{

			$user->attributes=$_POST['User'];
			$user->activkey=Yii::app()->getModule('user')->encrypting(microtime().$user->password);
			$profile->attributes=$_POST['Profile'];
			$profile->user_id=0;
			if($user->validate()&&$profile->validate()) {
				$user->password=Yii::app()->getModule('user')->encrypting($user->password);
				$user->status=1; // default active
				if($user->save()) {
					$profile->user_id=$user->id;
					$profile->save();

					// add on table branch manager
					$manager = new BranchTeachers;
					$manager->branch_id=$id;
					$manager->user_id = $user->id;
					$manager->save();

					// add on table authassignment
					$authorizer = Yii::app()->getModule("rights")->getAuthorizer();
					$authorizer->authManager->assign('teacher', $user->id);
				}
				$this->redirect(array('index','id'=>$id));
			} else $profile->validate();
		}

		$model=new BranchTeachers('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BranchTeachers']))
			$model->attributes=$_GET['BranchTeachers'];

		$model->branch_id=$id;

		$this->render('index',array(
			'model'=>$model,
			'branch'=>$branch,
			'user'=>$user, 
			'profile'=>$profile
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new BranchTeachers('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BranchTeachers']))
			$model->attributes=$_GET['BranchTeachers'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return BranchTeachers the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=BranchTeachers::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelBranchs($id)
	{
		$model=Branchs::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param BranchTeachers $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='branch-teachers-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
