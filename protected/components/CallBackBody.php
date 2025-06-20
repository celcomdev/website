<?php

class CallBackBody extends CWidget
{
	public $css_id;
	public function run()
	{
	  $model = new Contact('callbk');
		$this->render('callbackbody', array('model'=> $model, 'css_id'=>$this->css_id));
	}

}
?>
