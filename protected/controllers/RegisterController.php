<?php

class RegisterController extends Controller
{
    /**
     * Declares class-based actions.
     */
    public $layout = '//layouts/column3';

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */

    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xffffff,
                'foreColor' => 0x1b135a,
                'minLength' => 4,
                'maxLength' => 4,
                'offset' => 2,
                'padding' => 2,
            ),

        );
    }

    public function actionIndex()
    {
        $model = new Contact('signup');

        if (isset($_POST['Contact'])) {
            $model->attributes = $_POST['Contact'];

            if ($model->validate()) {
                // Setup email
                $data = array(
                    'email' => $model->email,
                    'name' => $model->name,
                    'phone' => $model->phone,
                );

                $msg = $this->renderPartial('application.mails.signup', array('data' => $data), true);
                $info = array(
                    'name' => $model->name,
                    'email' => $model->email,
                );
                $mail = new Mail;
                $mail->newClient(array('info' => $info, 'msg' => $msg));

                Yii::app()->user->setFlash('success', 'Thank you for choosing Celcom Africa. We will respond to you as soon as possible.');
                $this->redirect(array('/site/page', 'view' => 'success'));
            }
        }
        $this->render('index', array('model' => $model));
    }

    public function actionRequestCallback()
    {
        header('Content-type:application/json');
        $post = file_get_contents("php://input");

        $data = json_decode($post);

        if ($data->captcha && $this->checkRecaptcha($data->captcha)) {

            $msg = $this->renderPartial('application.mails.callback', array('data' => $data), true);
            $info = array(
                'name' => $data->name,
                'email' => $data->email,
            );
            $mail = new Mail;
            $mail->kallBack(array('info' => $info, 'msg' => $msg));

            echo json_encode([
                'valid' => true,
            ]);
        } else {

            echo json_encode([
                'valid' => false,
            ]);
        }
    }

    public function actionDemo()
    {
        header('Content-type:application/json');
        $post = file_get_contents("php://input");

        $data = json_decode($post);

        if ($data->captcha && $this->checkRecaptcha($data->captcha)) {

            $msg = $this->renderPartial('application.mails.demo', array('data' => $data), true);
            $info = array(
                'name' => $data->name,
                'email' => $data->email,
            );
            $mail = new Mail;
            $mail->demoRequest(array('info' => $info, 'msg' => $msg));

            echo json_encode([
                'valid' => true,
            ]);
        } else {

            echo json_encode([
                'valid' => false,
            ]);
        }
    }

    public function actionTestGateway()
    {
        header('Content-type:application/json');
        $post = file_get_contents("php://input");

        $data = json_decode($post);

        if ($data->captcha && $this->checkRecaptcha($data->captcha)) {

            $txt = 'Welcome to CELCOM AFRICA. Find your trial Acc on Url: https://isms.celcomafrica.com Username: testaccount, Password: test123. Call us on 0701727272/ 0703727272 for more info.';
            Yii::app()->sms->sendSMS($data->phone, $txt);

            $msg = $this->renderPartial('application.mails.gatewaytest', array('data' => $data), true);

            $mail = new Mail;
            $mail->alertGatewayTest(array('msg' => $msg));

            echo json_encode([
                'valid' => true,
            ]);
        } else {

            echo json_encode([
                'valid' => false,
            ]);
        }
    }

    public function actionAccount()
    {
        header('Content-type:application/json');
        $post = file_get_contents("php://input");

        $data = json_decode($post);


        if ($data->captcha && $this->checkRecaptcha($data->captcha)) {

            $msg = $this->renderPartial('application.mails.signup', array('data' => $data), true);
            $info = array(
                'name' => $data->name,
                'email' => $data->email,
            );
            error_log(print_r($msg, true));
            $mail = new Mail;
            $mail->newClient(array('info' => $info, 'msg' => $msg));

            echo json_encode([
                'valid' => true,
            ]);
        } else {

            echo json_encode([
                'valid' => false,
            ]);
        }
    }

    public function actionContact()
    {
        header('Content-type:application/json');
        $post = file_get_contents("php://input");

        $data = json_decode($post);

        if ($data->captcha && $this->checkRecaptcha($data->captcha)) {

            $msg = $this->renderPartial('application.mails.contact', array('data' => $data), true);
            $info = array(
                'name' => $data->name,
                'email' => $data->email,
            );

            $mail = new Mail;
            $mail->enquiryMail(array('info' => $info, 'msg' => $msg));

            echo json_encode([
                'valid' => true,
            ]);
        } else {

            echo json_encode([
                'valid' => false,
            ]);
        }
    }

    private function checkRecaptcha($captcha)
    {
        $secret = '6LfJazYiAAAAACSaiBq5Yij3hOQEpdntqz1TfxxL';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $captcha);
        $responseData = json_decode($verifyResponse);

        return $responseData->success;
    }
}
