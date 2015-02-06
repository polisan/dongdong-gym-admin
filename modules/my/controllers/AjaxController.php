<?php

namespace app\modules\my\controllers;

use app\components\AjaxNeedLoginController;
use app\components\DDException;
use app\models\GymAdmin;
use Yii;
use yii\filters\AccessControl;

class AjaxController extends AjaxNeedLoginController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['edit-profile'],
                'rules' => [
                    'edit-profile' => [
                        'allow' => true,
                        'verbs' => ['POST'],
                    ],
                ],
            ]
        ];
    }

    public function actions()
    {
        return [
        ];
    }

    public function actionEditProfile()
    {
        $username = Yii::$app->request->post('username');
        $email = Yii::$app->request->post('email');
        $user = Yii::$app->user->identity;
        if ((empty($username) || $username == $user->username)
            && (empty($email) || $email == $user->email)) {
            return 0;
        }

        $user = Yii::$app->user->identity;
        if (!empty($username) && $username != $user->username) {
            if (GymAdmin::findByUsername($username)) {
                return DDException::USERNAME_TAKEN;
            }
            $user->username = $username;
        }
        if (!empty($email) && $email != $user->email) {
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
