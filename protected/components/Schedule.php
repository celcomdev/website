<?php

class Schedule extends CWidget
{
	public function run()
	{
	  $model = new Contact;
		$this->render('schedule', array('model'=> $model));
	}
}
?>
