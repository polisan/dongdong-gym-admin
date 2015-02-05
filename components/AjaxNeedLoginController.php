<?php

namespace app\components;

use Yii;
use yii\web\Controller;

class AjaxNeedLoginController extends Controller
{
    /**
     * @inheritdoc
     */
    public function beforeAction($action) {
        if (Yii::$app->user->isGuest) {
            return false;
        }
        return parent::beforeAction($action);
    }
}
