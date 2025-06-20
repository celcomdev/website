<?php
class TestGateway extends CWidget
{

	public function run()
	{
	  $model = new Contact;

		// $this->render('test', array('model'=>$model));
		$this->render('test-gateway', array('model'=>$model));
	}
}
