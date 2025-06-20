<?php

class UsersController extends RController
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
        $data = Mtawala::model()->all();

        $this->render('index', [
            'data' => $data,
        ]);
    }

    public function actionForm()
	{

        $this->render('form', [
            'data' => [],
        ]);
    }
    public function actionEdit($id)
	{
        $data = Mtawala::model()->findByPk($id);

        $this->render('edit', [
            'data' => $data,
        ]);
    }

    public function actionSave()
	{
        $data = new Mtawala();
        $userData = [
            'name' => trim($_POST['name']),
            'username' => trim($_POST['username']),
            'email' => trim($_POST['email']),
            'phone' => trim($_POST['phone']),
            'password' => $data->encrypting($_POST['password']),
            'activkey' => $data->encrypting(mt_rand(1000000,1000000000)),
            'status' => 1,
            'superuser' => 1,
            'role' => 1,
            'mail_verified' => 1,
        ];
        $errors = [];
        $existsUsername = Mtawala::model()->findAll(array('select'=>'id','condition'=>'username="'.$userData["username"].'"', 'order'=>'id DESC'));
        $existsEmail = Mtawala::model()->findAll(array('select'=>'id','condition'=>'email="'.$userData["email"].'"', 'order'=>'id DESC'));
        if(count($existsUsername)) {
            $errors[] = "Username already exists";
           
        }
        if(count($existsEmail)) {
            $errors[] = "Email already exists";
        }

        if(count($errors)) {

            return $this->render('form', [
                'data' => $userData,
                'errors' => $errors,
            ]);
        }
        
        $data->attributes = $userData;

        if($data->save(false)) {
            Yii::app()->user->setFlash('success', 'Saved Successfully.');

            $this->redirect(array('/users'));
        } else {
            $this->render('form', [
                'data' => $data,
            ]);
        }
    }

    public function actionUpdate($id)
	{
        $data = Mtawala::model()->findByPk($id);
        $userData = [
            'name' => trim($_POST['name']),
            'username' => trim($_POST['username']),
            'email' => trim($_POST['email']),
            'phone' => trim($_POST['phone']),
        ];

        if(isset($_POST['password']) && $_POST['password']) {
            $userData['password'] = $data->encrypting($_POST['password']);
        }

        $data->attributes = $userData;

        $errors = [];
        $existsUsername = Mtawala::model()->findAll(array('select'=>'id','condition'=>'username="'.$userData["username"].'" AND id != "'.$id.'"', 'order'=>'id DESC'));
        $existsEmail = Mtawala::model()->findAll(array('select'=>'id','condition'=>'email="'.$userData["email"].'" AND id != "'.$id.'"', 'order'=>'id DESC'));
        if(count($existsUsername)) {
            $errors[] = "Username already exists";
           
        }
        if(count($existsEmail)) {
            $errors[] = "Email already exists";
        }

        if(count($errors)) {

            return $this->render('edit', [
                'data' => $data,
                'errors' => $errors,
            ]);
        }

        if($data->save()) {
            Yii::app()->user->setFlash('success', 'Update Successfully.');

            $this->redirect(array('/users'));
        } else {
            $this->redirect(array('update',[ 'id' => $id]));
        }
    }
}