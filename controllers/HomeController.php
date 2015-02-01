<?php

namespace app\controllers;

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
        return 'This is homepage.';
    }
}
