<?php

namespace app\modules\gym\controllers;

use app\components\NeedLoginController;

class CoachesController extends NeedLoginController
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
