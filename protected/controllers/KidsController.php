<?php

class KidsController extends Controller
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
			// 'rights',
			// 'accessControl', // perform access control for CRUD operations
			// 'postOnly + delete', // we only allow deletion via POST request
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
		$model=new Kids;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Kids']))
		{
			$model->attributes=$_POST['Kids'];

			// kalau user tu role parent, by default pilih parent_id sebagai user yang login 
			if(Yii::app()->user->checkAccess('parent') && !Yii::app()->getModule('user')->isAdmin()){
				$model->parent_id = Yii::app()->user->id;
				$model->status_id = 1; // pendaftaran baru
			}

			if($model->save()){

				// upload handler
				if(isset($_FILES['files'])) {

					$photoPath = 'upload/photo';
					if(!file_exists($photoPath)){
						mkdir($photoPath,0777, true);
					}

					$uploadPath = $photoPath.'/'.$model->id;
					if(!file_exists($uploadPath)){
						mkdir($uploadPath, 0777, true);
					}

					//upload new files
					foreach($_FILES['files']['name'] as $key=>$filename){
						move_uploaded_file($_FILES['files']['tmp_name'][$key], $uploadPath.'/'.$filename);

						$photo = new KidPhotos;
						// insert value into database
						$photo->kid_id = $model->id; // kid id
						$photo->filename=$filename;
						$photo->filepath=$uploadPath.'/'.$filename;
						$photo->save();
					}
				}

				$this->redirect(array('view','id'=>$model->id));
			}
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

		if(isset($_POST['Kids']))
		{
			$model->attributes=$_POST['Kids'];
			if($model->save()){
				// upload handler
				if(isset($_FILES['files'])) {

					$photoPath = 'upload/photo';
					if(!file_exists($photoPath)){
						mkdir($photoPath,0777, true);
					}

					$uploadPath = $photoPath.'/'.$model->id;
					if(!file_exists($uploadPath)){
						mkdir($uploadPath, 0777, true);
					}

					//upload new files
					foreach($_FILES['files']['name'] as $key=>$filename){
						move_uploaded_file($_FILES['files']['tmp_name'][$key], $uploadPath.'/'.$filename);

						$photo = KidPhotos::model()->findByAttributes(array('kid_id'=>$model->id));

						if(!$photo) $photo = new KidPhotos;
						// insert value into database
						$photo->kid_id = $model->id; // kid id
						$photo->filename=$filename;
						$photo->filepath=$uploadPath.'/'.$filename;
						$photo->save();
					}
				}
				Yii::app()->user->setFlash('success', 'Maklumat pelajar telah dikemaskini');
				$this->redirect(array('view','id'=>$model->id));
			}
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
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Kids');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Kids('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Kids']))
			$model->attributes=$_GET['Kids'];

		if (!Yii::app()->getModule('user')->isAdmin()) {
			
			if(Yii::app()->user->checkAccess('parent')){
				// get list by parent sahaja
				$model->parent_id = Yii::app()->user->id;
				$this->render('byParent',array(
					'model'=>$model,
				));
			}
			elseif (Yii::app()->user->checkAccess('branch_owner')) {
				$branch = BranchOwners::model()->findAllByAttributes(array('user_id'=>Yii::app()->user->id));

				$id = array();
				foreach ($branch as $key => $value) {
					$id[] = $value->branch_id;
				}
				$model->branch_id=$id;
				$this->render('admin',array(
					'model'=>$model,
					'branch_id'=>$id,
				));
			}
			elseif (Yii::app()->user->checkAccess('branch_manager')) {

				$branch = BranchManagers::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));

				$model->branch_id=$branch->branch_id;
				$this->render('admin',array(
					'model'=>$model,
					'branch_id'=>$branch->branch_id,
				));
			}
			elseif (Yii::app()->user->checkAccess('teacher')) {
				$branch = BranchTeachers::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
				$model->branch_id=$branch->branch_id;
				$this->render('admin',array(
					'model'=>$model,
					'branch_id'=>$branch->branch_id,
				));
			}
		}
		else{
			$branchs = Branchs::model()->findAll();
			$id = array();
			foreach ($branchs as $key => $value) {
				$id[]=$value->id;
			}
			$this->render('admin',array(
				'model'=>$model,
				'branch_id'=>$id,
			));
		}
	}

	/**
	 * List of student by branchs
	 *
	 * @return void
	 * @author 
	 **/
	public function actionByBranchs($id)
	{
		$model = new Kids;
		$model->unsetAttributes();

		if (isset($_GET['Kids'])) {
			$model->attributes=$_GET['Kids'];
		}

		// filter kids by branch
		$model->branch_id = $id;

		$this->render('byBranchs', array('model'=>$model, 'branch_id'=>$id));
	} // end function byBranchs

	/**
	 * Penerimaan pelajar baru
	 *
	 * @return void
	 * @author Haezal
	 **/
	public function actionApprove($id)
	{
		$model = $this->loadModel($id);// kids details

		// save data into invoice
		$invoice = new Invoices;
		$invoice->invoice_type_id=1; // yuran permohonan
		$invoice->to_id = $model->parent->id;
		$invoice->from_id = Yii::app()->user->id; // dari user yang login (Branch Manager)
		$invoice->rm_total = $model->branch->fees; // dapatkan fees dari maklumat branchs
		$invoice->status = 1; // new invoice
		$invoice->kid_id = $id;
		$invoice->save();

		// add invoice details
		$invoiceDetails = new InvoiceDetails;
		$invoiceDetails->invoice_id = $invoice->id;
		$invoiceDetails->invoice_status_id=$invoice->status;
		$invoiceDetails->save();
		$invoiceDetails->updated_by = Yii::app()->user->id;
		$invoiceDetails->save();

		// send email
		// Yii::app()->getModule('user')->sendMail($to, $subject, $body);

		$model->status_id = 4; // pending bayaran yuran permohonan baru
		$model->save();

		Yii::app()->user->setFlash('success', 'Permohonan baru pelajar telah diterima');
		$this->redirect(array('/kids/view', 'id'=>$model->id));
	}

	/**
	 * Menolak permohonan daftar murid baru
	 *
	 * @return void
	 * @author 
	 **/
	public function actionDisapprove($id)
	{
		$model = $this->loadModel($id);// kids details

		// send email
		// Yii::app()->getModule('user')->sendMail($to, $subject, $body);

		$model->status_id = 5; // Status permohonan ditolak
		$model->save();

		Yii::app()->user->setFlash('success', 'Permohonan baru pelajar telah ditolak');
		$this->redirect(array('/kids/view', 'id'=>$model->id));
	}

	/**
	 * Check approve payment yang parent dah buat untuk yuran permohonan sahaja
	 *
	 * @return void
	 * @author haezal
	 **/
	public function actionCheckApprovePayment($id)
	{
		$model=$this->loadModel($id); //kids details
	}

	/**
	 * Kemaskini bukti pembayaran yuran permohonan sahaja
	 *
	 * @return void
	 * @author haezal
	 **/
	public function actionApplicationPaymentEvidence($id)
	{
		$model = $this->loadModel($id);

		// get invoice details
		$invoice = Invoices::model()->findByAttributes(array(
			'kid_id'=>$model->id,
			'invoice_type_id'=>1, // untuk yuran permohonan sahaja
			'to_id'=>Yii::app()->user->id, // check invoice untuk parent ini sahaja
			'status'=>array(1,2), // untuk new invoice sahaja
		));

		if (!$invoice) {
			// tiada maklumat invoice
			Yii::app()->user->setFlash('error', 'Maklumat invoice tidak ditemui');
			$this->redirect(array('kids/admin'));
		}
		else{
			// handle post data

			$this->render('applicationPaymentEvidence', array(
				'model'=>$model, 
				'invoice'=>$invoice,
			));
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Kids the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Kids::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Kids $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='kids-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
