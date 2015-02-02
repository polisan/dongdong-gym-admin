<?php

namespace app\modules\gym\controllers;

use app\modules\gym\models\GymUser;
use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $model = new GymUser();
        $this->layout = "main";
        return $this->render('index', ['model' => $model]);
    }

    public function actionAdd() {
        $model = new Gymuser();
        $this->layout = "main";
        return $this->render('gym_add', ['model' => $model]);
    }
}
