<?php

use YoastSEO_Vendor\Psr\Container\NotFoundExceptionInterface;

class SiteController extends Controller
{
    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            // 'captcha'=>array(
            // 	'class'     => 'CCaptchaAction',
            // 	'backColor' => 0xffffff,
            // 	'foreColor' => 0x1b135a,
            // 	'minLength' => 4,
            // 	'maxLength' => 4,
            // 	'offset'    => 2,
            // 	'padding'   => 2,
            // ),

            'captcha' => array(
                'class' => 'CaptchaExtendedAction',
                'maxLength' => 4,
                'padding' => 0,
                // if needed, modify settings
                'mode' => CaptchaExtendedAction::MODE_MATH,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
                // 'layout' => '//layouts/home'
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        // $test = Yii::app()->ipays->vendorId;
        //
        // echo "<pre>"; print_r($test); echo "</pre>";
        $model = new Contact('callbk');

        if (Yii::app()->request->isPostRequest && isset($_POST['Contact'])) {
            $model->attributes = Yii::app()->getRequest()->getPost('Contact');
            if ($model->validate()) {

                $txt = 'Welcome to CELCOM AFRICA. Find your trial Acc on Url: https://isms.celcomafrica.com Username: testaccount, Password: test123. Call us on 0701727272/ 0703727272 for more info.';
                Yii::app()->sms->sendSMS($model->phone, $txt);

                $data = array(
                    'phone' => $model->phone,
                );

                $msg = $this->renderPartial('application.mails.gatewaytest', array('data' => $data), true);

                $mail = new Mail;
                $mail->alertGatewayTest(array('msg' => $msg));


                $flash = '<div class="flash-notice"><h1 class="text-center"><i class="fa fa-check-circle"></i> Thanks for choosing Celcom Africa!</h1><h2 class="text-center">You will receive an SMS with your demo account credentials</h2></div>';
                Yii::app()->user->setFlash('success', $flash);

                $this->redirect(array('/site/thanks'));
            }
        }
        $this->render('index');
    }


    public function actionDemo()
    {
        $model = new Contact;

        if (isset($_POST['Contact'])) {
            $model->attributes = $_POST['Contact'];
            if ($model->validate()) {
                // free demo request.
                $txt = 'Welcome to CELCOM AFRICA. Find your trial Acc on Url: https://isms.celcomafrica.com Username: testaccount, Password: test123. Call us on 0701727272/ 0703727272 for more info.';
                Yii::app()->sms->sendSMS($model->phone, $txt);
                // Setup email
                $data = array(
                    'email' => $model->email,
                    'name' => $model->name,
                    'phone' => $model->phone,
                    'body' => $model->body,
                );

                $msg = $this->renderPartial('application.mails.demo', array('data' => $data), true);
                $info = array(
                    'name' => $model->name,
                    'email' => $model->email,
                );
                $mail = new Mail;
                $mail->demoRequest(array('info' => $info, 'msg' => $msg));

                $flash = '<div class="flash-notice"><h1 class="text-center"><i class="fa fa-check-circle"></i>  Thank you ' . $model->name . ' for getting in touch</h1><h2 class="text-center">You will receive an SMS shortly with your demo account credentials.</h2></div>';
                Yii::app()->user->setFlash('success', $flash);

                $this->redirect(array('/site/thanks'));
            } else {
                $errors = $model->getErrors();
                echo json_encode($errors);
                exit;
            }
        }
    }

    function actionDevelopers()
    {
        $this->layout = '//layouts/master';
        return $this->render('developers/index');
    }

    public function actionDownload($file)
    {

        // Define the path to your files directory
        $filePath = Yii::getPathOfAlias('webroot') . "/storage/" . $file;

        if (file_exists($filePath)) {
            Yii::app()->getRequest()->sendFile($file, file_get_contents($filePath));
        } else {
            // Handle the case where the file doesn't exist
            throw new CHttpException(404, 'The requested file does not exist.');
        }
    }


    public function actionCbk()
    {
        $model = new Contact('callbk');

        //$model->setScenario('callbk');
        if (isset($_POST['Contact'])) {
            $model->attributes = $_POST['Contact'];
            if ($model->validate()) {
                Yii::app()->sms->sendSMS('0701727272', 'Call Back Request from ' . $model->phone);

                $data = array('phone' => $model->phone);

                $msg = $this->renderPartial('application.mails.kallback', array('data' => $data), true);

                $mail = new Mail;
                $mail->kallBack(array('msg' => $msg));

                $flash = '<div class="container px-0">
                            <div class="card bg-primary-subtle text-primaryy pt-3">
                                <div class="card-body pb-5">
                                    <h1 class="text-center fw-bold mb-3">Thank you for getting in touch!</h1>
                                    <h5 class="lead text-center">Your callback request was successful. You will receive a call shortly.</h5>
                                </div>
                            </div>
                        </div>';

                Yii::app()->user->setFlash('success', $flash);

                $this->redirect(Yii::app()->createAbsoluteUrl('/site/thanks'));
            } else {
                $errors = $model->getErrors();
                echo json_encode($errors);
                exit;
            }
        }

        if (Yii::app()->request->isAjaxRequest) {
            echo CJSON::encode(array(
                'status' => 'failure',
                'div' => $this->renderPartial('callbck', array('model' => $model), true)
            ));
            exit;
        } else
            throw new CHttpException(500, Yii::t('base', 'Invalid request.'));
    }


    public function actionPay()
    {
        Yii::app()->clientScript->registerMetaTag('NOINDEX, NOFOLLOW', 'robots');
        $model = new Bundles;

        $model->scenario = 'payon';
        if (Yii::app()->request->isPostRequest && isset($_POST['Bundles'])) {

            $model->attributes = $_POST['Bundles'];
            if ($model->validate()) {
                $data = array(
                    'amount' => $model->amount,
                    'name' => $model->name,
                    'email' => $model->email,
                    'phone' => $model->phone,
                );

                Yii::app()->user->setState('_pay_now', $data);

                $admin = $this->renderPartial('application.mails.pay_now', array('data' => $data), true);

                $info = array();
                $info['name'] = $model->name;
                $info['email'] = $model->email;

                $mail = new Mail;
                $mail->customPay(array('info' => $info, 'msg' => $admin));
                if (Yii::app()->user->getState('_pay_now')) {
                    Yii::app()->paypal->payNow();
                }
            } else {
                $errors = $model->getErrors();
                echo json_encode($errors);
                exit;
            }
        } else {
            // code...
        }
    }


    public function actionThanks()
    {

        if (Yii::app()->user->hasFlash('success')) {
            $this->render('thank');
        } else {
            $this->redirect(array('/site/index'));
        }
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }
}
