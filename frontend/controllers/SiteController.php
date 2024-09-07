<?php

namespace frontend\controllers;

use AllowDynamicProperties;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\Product;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use common\models\Course;
use common\models\Enroll;
use common\models\Invoice;
use common\models\Users;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::className(),
                    'only' => ['mycourse',],
                    'rules' => [
                        // ? คนที่ไม่ได้ Login 
                        // @ ใครก็ตามที่ Login
                        [
                            'actions' => ['mycourse','invoice'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                        
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'logout' => ['post'],
                    ],
                ],
                       
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    //Test
    public function actionIndex2(){
        return $this->render("index2");
    }
    
    
    public function actionInvoice(){
        $model_course = Course::find()->all();
        $model_users = Users::find()->all();
        $model_pro = Invoice::find()->all();
        // Render ไปทั้ง course พร้อมข้อมูล
        return $this->render("invoice", [
            "model_course" => $model_course,
            "model_users" => $model_users,
            "model_pro" => $model_pro
        ]);
    }
    public function actionInvoice2(){
        $model_course = Course::find()->all();
        $model_users = Users::find()->all();
        $model_pro = Invoice::find()->all();
        // Render ไปทั้ง course พร้อมข้อมูล
        return $this->render("invoice2", [
            "model_course" => $model_course,
            "model_users" => $model_users,
            "model_pro" => $model_pro
        ]);
    }

    public function actionIndex3(){
        $model_course = Course::find()->all();
        $model_users = Users::find()->all();
        $model_pro = Invoice::find()->all();
        $model_registers = Enroll::find()->all();
        // Render ไปทั้ง course พร้อมข้อมูล
        return $this->render("index3", [
            "model_course" => $model_course,
            "model_users" => $model_users,
            "model_pro" => $model_pro,
            "model_register" => $model_registers,
        ]);
    }

    


    public function actionHello(){
        echo("Hello action");
    }

    public function actionView_profile(){
        $model_course = Course::find()->all();
        // Render ไปทั้ course พร้อมข้อมูล
        return $this->renderPartial("view_profile",[
            "model_course" => $model_course]);  
    }

    public function actionMycourse(){
        
        
        $model_course = Course::find()->all();
        // Render ไปทั้ course พร้อมข้อมูล
        return $this->render("mycourse",[
            "model_course" => $model_course
        ]);
    }

    public function actionCalArea($w=0,$h=0){
        $area = $w*$h;
        print "พื้นที่ที่ได้คือ $area";
    }






    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        // query ข้อมูล โยนใส่ index
        $model_product = Product::find()->all();
        $model_course = Course::find()->all();
    
        // render ไปที่ index พร้อมส่งข้อมูล
        return $this->render('index', [
            "model_product" => $model_product,
            "model_course" => $model_course,
        ]);
    }
    

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
       //เปลี่ยน layout จาก default main ให้เป็น
       //สามารถสร้าว layout ใหม่เองได้ ในกรณีเราใช้ laout main-login จาก tempalate adminle3
       $this -> layout = 'main-login'; 
       
       if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }

            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
            Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
            return $this->goHome();
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
}