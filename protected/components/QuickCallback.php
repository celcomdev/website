<?php

class QuickCallback extends CWidget
{
    public function run()
    {
        //   $model = new ContactForm;
        $model = new Contact;

        $this->render('callback_request', array('model' => $model));
    }
}
