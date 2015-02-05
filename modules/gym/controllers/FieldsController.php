<?php

namespace app\modules\gym\controllers;

use yii\web\Controller;

class FieldsController extends Controller
{
    public $layout = 'main';
    /** TODO: 查看场地详细信息
     *  1、场地类型信息：场地类型名称，运动类型，收费方式，价格表，场地说明
     *  2、场地基本信息：场地名，场地类型，补充说明
     */
    // 详见field*表
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionEdit()
    {}

    public function actionAdd()
    {
        return $this->render('add');
    }

    public function actionDelete()
    {}
}
