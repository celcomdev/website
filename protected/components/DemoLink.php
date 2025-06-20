<?php

class DemoLink extends CWidget
{
	public function run()
	{
		$model = new Contact('contact');
		$this->render('demolink', array('model'=>$model));
	}
}
?>
