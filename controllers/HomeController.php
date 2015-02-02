<?php

namespace app\controllers;

use app\models\GymUser;
use app\components\NeedLoginController;
use Yii;

class HomeController extends NeedLoginController
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

    public function actionIndex()
    {
        $hasAuthenticated = 0;
        return $this->render('index', [
            'hasAuthenticated' => $hasAuthenticated,
        ]);
    }
}
