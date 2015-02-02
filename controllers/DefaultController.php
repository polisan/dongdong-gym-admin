<?php

namespace app\controllers;

use app\components\NeedLoginController;
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
        return $this->render('index');
    }
    public function actionGymlist() {
        $model = new GymUser();
        return $this->render('gym_list', ['model' => $model]);
    }
    public function actionGymadd() {
        $model = new GymUser();
        return $this->render('gym_add', ['model' => $model]);
    }
}
