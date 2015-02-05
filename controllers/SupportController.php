<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class SupportController extends Controller
{
    public function behaviors()
    {
        return [
        ];
    }

    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'minLength' => 4,
                'maxLength' => 4,
                'width' => 75,
                'height' => 35,
            ],
            'error' => [
                'class' => 'app\components\DDErrorAction',
            ],
        ];
    }
}
