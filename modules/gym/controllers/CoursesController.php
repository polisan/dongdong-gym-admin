<?php

namespace app\modules\gym\controllers;

use yii\web\Controller;

class CoursesController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionEdit()
    {}

    public function actionAdd()
    {}

    public function actionDelete()
    {}
}
