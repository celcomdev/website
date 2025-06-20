<?php

class SettingsController extends RController
{

	public $layout = '//layouts/column2';

	public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations=
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
			array(
				'allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions' => array('index'),
				'users' => array('admin',),
			),
			array(
				'deny',  // deny all users
				'users' => array('*'),
			),
		);
	}

	public function actionIndex()
	{
		$model = new ConfigForm();

		if (Yii::app()->request->isPostRequest) {
			//$model->unSetAttributes();

			foreach ($_POST['ConfigForm'] as $key => $config) :
				$model->$key = $config;
			endforeach;

			if ($model->validate()) {
				foreach ($_POST['ConfigForm'] as $key => $config) :
					Configuration::model()->updateAll(array('value' => $config), "`key`='" . $key . "'");
				endforeach;

				Yii::app()->user->setFlash('success', Yii::t('common', 'message_modify_success'));
				$this->redirect($this->createUrl('index'));
			}
		}
		$this->render('index', array('model' => $model));
	}
}
