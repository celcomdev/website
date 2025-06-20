<?php

class PayOn extends CWidget
{
	public function run()
	{
		$model = new Bundles('payon');
		$this->render('payon', array('model'=>$model));
	}
}
?>
