<?php

use SendGrid\Mail\Mail as GridMail;

//Load Composer's autoloader
require 'vendor/autoload.php';

class Mail
{
	public $emailFrom  = 'enquiries@celcomafrica.com';

	public function sendOtp($data)
	{
		$mailfrom = $this->emailFrom;
		$mailto	  = $data['info']['email'];
		$subject  = $data['info']['subject'];
		$body     = $data['msg'];

		$this->sendMail(array(
				'to' => $mailto, 
				'from' => $mailfrom, 
				'subject' => $subject,
				'body' => $body,
			));
	}

	public function sendMail($data)
	{
		$mail  = new GridMail();
		$mail->addTo($data['to']);
		$mail->setFrom($this->emailFrom, 'Celcom Team');
		$mail->setSubject($data['subject']);
		$mail->setReplyTo($this->emailFrom, 'Celcom Team');
		$mail->addContent("text/html", $data['body']);
		if(isset($data['cc'])) {
			$mail->addCc($data['cc']);
		}
		
		$sendGrid = new \SendGrid('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');

		$response = $sendGrid->send($mail);

		return $response->statusCode();
	}

}
