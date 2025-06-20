<?php
Yii::import('application.vendor.*');
require_once('phpmailer/class.phpmailer.php');

class Mail
{
    protected $emailFrom='noreply@username.co.ke';
	/*
	**** property reviews
	*/
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

	/***
	*@Crowd fundin emails
	*******/
	public function sendMail($data, $replyTo=NULL)
	{
		
		$phpMail = new PHPMailer();

		// $phpMail->isMail();
		$phpMail->Mailer = "smtp";
		$phpMail->Host = 'smtp.gmail.com';
		$phpMail->SMTPAuth = true;
		$phpMail->Username = 'noreply@username.co.ke';
		$phpMail->Password = 'fPq70Chire';
		$phpMail->SMTPSecure = 'ssl';
		$phpMail->Port = 465;
		$phpMail->SMTPDebug  = 1;  
		/*
		** ****  AddReplyTo { not working}
		*/
		$phpMail->AddReplyTo($replyTo ?? $this->emailFrom, "Username Investment");
		$phpMail->SetFrom("noreply@username.co.ke", "Username Investment");
		$phpMail->AddAddress($data['to']);
		$phpMail->Subject = $data['subject'];

		$phpMail->MsgHTML($data['body']);

		if (isset($data['title']) || !empty($data['title']))
		{
			$phpMail->AddAttachment($data['title']);
		}

		if (isset($_SESSION['limg']))
		{
			foreach ($_SESSION['limg'] as $f)
			{
				$phpMail->AddAttachment($f);
			}
		}

		$phpMail->CharSet = 'UTF-8';
		$phpMail->IsHTML(true); // send as HTML

		if ($phpMail->Send())
		{
			return array('success'=>true);
		}
	}
}
