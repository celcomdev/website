<?php

class QuickEnquiry extends CWidget
{
	public function run()
	{
		//   $model = new ContactForm;
		  $model = new Contact;

			$this->render('enquiry', array('model'=> $model));
	}
}
