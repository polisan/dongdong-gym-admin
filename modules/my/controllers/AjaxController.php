<?php

namespace app\modules\my\controllers;

use app\components\AjaxNeedLoginController;
use app\components\DDException;
use app\models\GymAdmin;
use Yii;

class AjaxController extends AjaxNeedLoginController
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

    public function actionEditProfile($username = null, $email = null)
    {
        if (empty($username) && empty($email)) {
            return 0;
        }

        $user = Yii::$app->user->identity;
        if (!empty($username)) {
            if (GymAdmin::findByUsername($username)) {
                return DDException::USERNAME_TAKEN;
            }
            $user->username = $username;
        }
        if (!empty($email)) {
            if (GymAdmin::findByEmail($email)) {
                return DDException::EMAIL_TAKEN;
            }
            $user->email = $email;
        }
        if ($user->save()) {
            return 0;
        } else {
            return DDException::UNKNOWN_ERROR;
        }
    }
}
