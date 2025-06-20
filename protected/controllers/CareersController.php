<?php

class CareersController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0x118dcb,
				'foreColor' => 0xffffff,
				'minLength' => 4,
				'maxLength' => 4,
				'width' => 70,
				'height' => 30,
				'offset' => 2,
				'padding' => 2,
				'testLimit' => 1,
			),
		);
	}

	public function actionIndex()
	{
		$model = new Career();

		$this->render('index', array('data'=> $model->all()));
	}

    public function actionView($alias)
    {
        $model = new Career();

		$this->render('view', array('data'=> $model->details($alias)));
    }
}
