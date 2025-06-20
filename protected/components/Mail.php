<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use SendGrid\Mail\Mail as GridMail;


//Load Composer's autoloader
require 'vendor/autoload.php';


class Mail
{
    public $infoEmail = 'enquiries@celcomafrica.com';
    public $noReplyEmail = 'enquiries@celcomafrica.com';
    public $accountsEmail = 'accounts@celcomafrica.com';

    public function paymentClient($data)
    {
        $to = $data['info']['email'];
        $formName = 'Celcom Africa';
        $from = $this->infoEmail;
        $subject = 'Quick Enquiry';
        $body = $data['msg'];

        $this->sendMail(array('to' => $to, 'from' => $from, 'name' => $formName, 'subject' => $subject, 'body' => $body));
    }

    public function kallBack($data)
    {
        $from = $this->noReplyEmail;
        $formName = 'Celcom Africa';
        $to = $this->infoEmail;
        $subject = 'Callback Request';
        $body = $data['msg'];

        $this->sendMail(array('to' => $to, 'from' => $from, 'name' => $formName, 'subject' => $subject, 'body' => $body));
    }

    public function paymentAdmin($data)
    {
        $from = $data['info']['email'];
        $formName = $data['info']['name'];
        $to = $this->infoEmail;
        $subject = 'Bulk SMS Purchase';
        $body = $data['msg'];

        $this->sendMail(array('to' => $to, 'from' => $from, 'name' => $formName, 'subject' => $subject, 'body' => $body));
    }

    public function newLead($data)
    {
        $from = $data['info']['email'];
        $formName = $data['info']['name'];
        $to = $this->infoEmail;
        $subject = 'New Bulk SMS Lead';
        $body = $data['msg'];

        $this->sendMail(array('to' => $to, 'from' => $from, 'name' => $formName, 'subject' => $subject, 'body' => $body));
    }

    public function customPay($data)
    {
        $from = $data['info']['email'];
        $formName = $data['info']['name'];
        $to = $this->infoEmail;
        $subject = 'Payment by Existing Customer';
        $body = $data['msg'];

        $this->sendMail(array('to' => $to, 'from' => $from, 'name' => $formName, 'subject' => $subject, 'body' => $body));
    }

    public function enquiryMail($data)
    {
        $from = $this->noReplyEmail;
        $formName = $data['info']['name'];
        $to = $this->infoEmail;
        $subject = 'General Enquiry';
        $body = $data['msg'];

        $this->sendMail(array('to' => $to, 'from' => $from, 'name' => $formName, 'subject' => $subject, 'body' => $body));
    }

    public function alertGatewayTest($data)
    {
        $from = $this->noReplyEmail;
        $formName = 'Celcom';
        $to = $this->infoEmail;
        $subject = 'Gateway Test Request';
        $body = $data['msg'];

        $this->sendMail(array('to' => $to, 'from' => $from, 'name' => $formName, 'subject' => $subject, 'body' => $body));
    }

    public function demoRequest($data)
    {
        $from = $data['info']['email'];
        $formName = $data['info']['name'];
        $to = $this->infoEmail;
        $subject = 'New Bulk SMS Lead';
        $body = $data['msg'];

        $this->sendMail(array('to' => $to, 'from' => $from, 'name' => $formName, 'subject' => $subject, 'body' => $body));
    }

    public function newClient($data)
    {
        $from = $data['info']['email'];
        $formName = $data['info']['name'];
        $to = $this->infoEmail;
        $subject = 'New Client Signup';
        $body = $data['msg'];

        $this->sendMail(array('to' => $to, 'from' => $from, 'name' => $formName, 'subject' => $subject, 'body' => $body));
    }

    public function sendPaypalNotification($data)
    {
        $from = $this->infoEmail;
        $formName = "Celcom Africa";
        $to = $this->infoEmail;
        $subject = 'Paypal Notification';

        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        $this->sendMail(array(
            'to' => $to,
            'from' => $from,
            'name' => $formName,
            'subject' => $subject,
            'body' => $this->emailBody($data['payment']),
            'cc' => $this->accountsEmail,
        ));
    }

    private function emailBody($data)
    {
        $it = "";
        foreach ($data['items'] as $item) {
            $it .= $item['name'] . "(" . $item['description'] . ") -";
            $it .= "<b>" . $item['unit_amount']['value'] . "</b>";
            $it .= '<br/>';
        }
        return "Dear Admin,
		<br/>
		<h3>Paypal Bulk SMS Payment<h3>.<br/>
		<h4>Account ID: " . $data['reference_id'] . "</h4>
		<h6>Name: " . $data['shipping']['name']['full_name'] . "</h6><br/>
		" . $it;
    }

    private function send($args)
    {
        //$headers="From: {$args['from']}\r\nReply-To: {$args['from']}";
        // To send HTML mail, the Content-type header must be set
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        $subject = $args['subject'];
        if (isset($args['cc'])) {
            $headers .= "CC: " . $this->accountsEmail;
        }

        $message = "<html>
		<head>
			<meta charset='UTF-8'>
		</head>
		<body>
		<div>
			" . $args['body'] . "
		</div>
		</body>
		</html>";

        return mail($args['to'], $subject, $message, $headers);

        //return mail($args['to'], $subject, $message, implode(PHP_EOL, $headers));
    }

    public function sendMail($data)
    {
        $mail = new GridMail();
        $mail->addTo('enquiries@celcomafrica.com');
        // $mail->addTo('hillaryngeno7@gmail.com');
        $mail->setFrom($this->noReplyEmail, $data['name']);
        $mail->setSubject($data['subject']);
        $mail->setReplyTo($this->infoEmail, 'Celcom Team');
        $mail->addContent("text/html", $data['body']);
        if (isset($data['cc'])) {
            $mail->addCc($data['cc']);
        }

        // Use environment variable for SendGrid API key for better security
        $sendGridApiKey = getenv('SENDGRID_API_KEY');
        if (!$sendGridApiKey) {
            throw new \Exception('SendGrid API key not set in environment variables.');
        }
        $sendGrid = new \SendGrid($sendGridApiKey);

        $response = $sendGrid->send($mail);

        return $response->statusCode();
    }

    public function sendMailOld($data)
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                        //Send using SMTP
            $mail->Host = 'mail.sprints.co.ke';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = 'noreply@sprints.co.ke';                     //SMTP username
            $mail->Password = 'Qwerty1000';                               //SMTP password
            $mail->SMTPSecure = '';            //Enable implicit TLS encryption
            $mail->Port = 26;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($data['from'], $data['name']);
            $mail->addAddress($data['to']);     //Add a recipient
            $mail->addReplyTo($this->infoEmail);
            $mail->addReplyTo($this->accountsEmail);
            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            //Set email format to HTML
            $mail->Subject = $data['subject'];
            $mail->Body = $data['body'];
            $mail->isHTML(true);

            if ($mail->send()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
