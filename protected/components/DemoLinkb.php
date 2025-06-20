<?php

class DemoLinkb extends CWidget
{
	public function run()
	{
		$model = new Contact('contact');
		$this->render('demolinkb', array('model'=>$model));
	}
}
?>
