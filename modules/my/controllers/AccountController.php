<?php

namespace app\modules\my\controllers;

use app\components\NeedLoginController;
use app\modules\my\models\UpdatePasswordForm;
use Yii;

class AccountController extends NeedLoginController
{
    public function behaviors()
    {
        return [
        ];
    }

    public function actions()
    {
        return [
        ];
    }

    public function actionProfile()
    {
        return $this->render('profile');
    }

    public function actionPrivacy()
    {
        return $this->render('privacy');
    }

    public function actionSecurity()
    {
        return $this->render('security');
    }

    public function actionBindmail()
    {
        return $this->render('bind_mail');
    }

    public function actionUpdateEmail()
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

        return $this->render('update_email');
    }

    public function actionAccountattest()
    {
        return $this->render('account_attest');
    }

    public function actionUpdatePassword()
    {
        $model = new UpdatePasswordForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->updatePassword()) {
                Yii::$app->session->setFlash('success', '密码修改成功');
                return $this->redirect(['/my/account/security']);
            }
        }

        return $this->render('update_password', [
            'model' => $model,
        ]);
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

        return $this->render('update_telephone');
    }
    public function actionBindtelephone()
    {
        return $this->render('bind_telephone');
    }
    public function actionFeedback()
    {
        return $this->render('feedback');
    }
    public function actionAttestdetail()
    {
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

        return $this->render('update_attest');
    }
}
