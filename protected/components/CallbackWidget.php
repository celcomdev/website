<?php

class CallbackWidget extends CWidget
{
	public $css_id = 'kalbak';
	public function run()
	{
	  $model = new Contact('callbk');
		$this->render('callwidget', array('model'=> $model, 'css_id'=>$this->css_id));
	}

}
?>
