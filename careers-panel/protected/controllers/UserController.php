<?php

class UserController extends RController
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
			'rights', // perform access control for CRUD operations
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
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','view','profile','change','update','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{
		$id = Yii::app()->user->getId();
		if((int)$id == 1 )
		{
			$model = Mtawala::model()->loadAdmin($id);
			if(isset($_POST['User']))
		  {
				 $model->attributes=$_POST['User'];
				 if($model->validate())
				 {
						 // form inputs are valid, do something here
						 return;
				 }
		 	}
			$this->render('index',array('model'=>$model));
		}
		 // $admin = loadAdmin($id)
	}

	public function actionChange($id)
	{
		$user = Yii::app()->user->getId();

		if((int)$user == 1 &&  $id == $user)
		{
			$model = new UserChangePassword;

			$this->performAjaxValidation($model);

		if(isset($_POST['UserChangePassword']))
		  {
			
			
				 $model->attributes=$_POST['UserChangePassword'];
				//  $hash = CPasswordHelper::hashPassword($password);
				 if($model->validate())
				 {
					$hash = md5($_POST['UserChangePassword']['password']);
					$update = $model->update($hash, $user);
						 // form inputs are valid, do something here
					Yii::app()->user->setFlash('profileMessage',"New password is saved.");
					$this->redirect(array("site/logout"));
				 }
		 	}
			$this->render('change',array('model'=>$model));
		}
		 // $admin = loadAdmin($id)
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
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Users the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Users $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='Users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	protected function gridDataColumn($data,$row)
	{
	    // ... generate the output for the column
			if ($data->status ==1) {
				$results = CHtml::ajaxLink("<i class='fa fa-check-circle-o'></i>", Yii::app()->createUrl("/users/status", array("id"=>$data->id)),
									array("type"=>"POST", "success" => "js:$.fn.yiiGridView.update('users-grid')"), array("title"=>"Enabled"));
			} elseif ($data->status ==0) {
				$results = CHtml::ajaxLink("<i class='fa fa-close'></i>", Yii::app()->createUrl("/users/status", array("id"=>$data->id)),
									array("type"=>"POST", "success" => "js:$.fn.yiiGridView.update('users-grid')"), array("title"=>"Disabled")
								);
			}

	   return $results;
	}

	public function actionStatus($id)
	{
		$model = User::model()->findByPk($id);  // use whatever the correct class name is
		if ($model->status == 0) {
			$status = 1;
		} elseif($model->status == 1)
		{
			$status = 0;
		}
    //$model->save(false);
		Yii::app()->db->createCommand("UPDATE users SET status = '".$status."' WHERE id = '" . (int)$id . "'")->query();
		return true;
	}
}
