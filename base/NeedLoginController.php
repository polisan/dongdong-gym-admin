<?php

namespace base;

use Yii;
use yii\web\Controller;

class NeedLoginController extends Controller
{
    public function beforeAction($action) {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['passport/login']);
        }
        return parent::beforeAction($action);
    }
}
