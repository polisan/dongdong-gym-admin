<?php

namespace app\components;

use Yii;
use yii\web\Controller;

class NeedLoginController extends Controller
{
    public function beforeAction($action) {
        if (Yii::$app->user->isGuest) {
//            return $this->redirect(['passport/account/login']);
        }
        return parent::beforeAction($action);
    }
}
