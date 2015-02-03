<?php

namespace app\components;

use Yii;
use yii\web\Controller;

class NeedLoginController extends Controller
{
    /**
     * @inheritdoc
     *
     * @param \yii\base\Action $action
     * @return bool|\yii\web\Response
     * @throws \yii\web\BadRequestHttpException
     */
    public function beforeAction($action) {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['passport/account/login']);
        }
        return parent::beforeAction($action);
    }
}
