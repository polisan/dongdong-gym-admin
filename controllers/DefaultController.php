<?php

namespace app\controllers;

use app\components\NeedLoginController;
use app\models\Gym;
use Yii;

class DefaultController extends NeedLoginController
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
        /*
         * get Gym list
         * */
        $gymList = Gym::findAll(['status' => Gym::STATUS_ACTIVE]);
        return $this->render('index',[
            'modle' => $gymList,
        ]);
    }
}
