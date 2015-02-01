<?php

namespace app\controllers;

use app\models\GymUser;
use base\NeedLoginController;
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
        $model = new GymUser();
        return $this->render('index', ['model' => $model]);
    }
}
