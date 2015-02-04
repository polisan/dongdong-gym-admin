<?php

namespace app\modules\passport\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\modules\passport\models\LoginForm;
use app\modules\passport\models\SignupForm;

class AccountController extends Controller
{
    public $layout = 'passport';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', ['model' => $model]);
    }

    public function actionSignupVerifyEmail()
    {
        $email = Yii::$app->request->get('email');
        if (empty($email)) {
            return $this->goHome();
        }

        return $this->render('signup_verify_email', ['email' => $email]);
    }

    public function actionSignupSuccess()
    {
        return $this->render('signup_success');
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionProfile()
    {
        $this->layout = '/main';
        return $this->render('profile');
    }

    public function actionPrivacy()
    {
        $this->layout = '/main';
        return $this->render('privacy');
    }

    public function actionSecurity()
    {
        $this->layout = '/main';
        return $this->render('security');
    }

    public function actionBindmail()
    {
        $this->layout = '/main';
        return $this->render('bind_mail');
    }
    public function actionUpdatemail()
    {
        // 模拟邮箱验证三步骤，第一步验证旧的邮箱地址，第二步填写新的邮箱，第三步验证新的邮箱（发送验证连接）
        if (!isset($_POST['update'])) {
            $_POST['update'] = 1;
        }
        else {
            $_POST['update'] = intval($_POST['update']);
            if ($_POST['update'] == 3) $_POST['update'] = 1;
            else $_POST['update'] += 1;
        }

        $this->layout = '/main';
        return $this->render('update_mail');
    }

    public function actionAccountattest()
    {
        $this->layout = '/main';
        return $this->render('account_attest');
    }

    public function actionUpdatepassword()
    {
        $this->layout = '/main';
        return $this->render('update_password');
    }
    public function actionUpdatetelephone()
    {
        // 模拟手机验证三步骤，第一步验证旧的手机，第二步填写新的手机并验证，第三步完成
        if (!isset($_POST['updateTel'])) {
            $_POST['updateTel'] = 1;
        }
        else {
            $_POST['updateTel'] = intval($_POST['updateTel']);
            if ($_POST['updateTel'] == 3) $_POST['updateTel'] = 1;
            else $_POST['updateTel'] += 1;
        }

        $this->layout = '/main';
        return $this->render('update_telephone');
    }
    public function actionBindtelephone()
    {
        $this->layout = '/main';
        return $this->render('bind_telephone');
    }
    public function actionFeedback()
    {
        $this->layout = '/main';
        return $this->render('feedback');
    }
    public function actionAttestdetail()
    {
        $this->layout = '/main';
        return $this->render('attest_detail');
    }
    public function actionUpdateAssest()
    {
        // 模拟手机验证三步骤，第一步验证旧的手机，第二步填写新的手机并验证，第三步完成
        if (!isset($_POST['updateAttest'])) {
            $_POST['updateAttest'] = 1;
        }
        else {
            $_POST['updateAttest'] = intval($_POST['updateAttest']);
            if ($_POST['updateAttest'] == 3) $_POST['updateAttest'] = 1;
            else $_POST['updateAttest'] += 1;
        }

        $this->layout = '/main';
        return $this->render('update_attest');
    }
}

