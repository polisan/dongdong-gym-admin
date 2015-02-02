<?php

namespace app\modules\gym\controllers;

use app\modules\gym\models\GymUser;
use yii\web\Controller;

class DefaultController extends Controller
{
    /** TODO: 查看场馆信息
     * 1、基本信息：包括名字，Logo，营业时间，联系方式，地区，详细地址，
     * 微信公共账号，是否支持会员，是否认证，经营体育项目，
     * 相册，当前营业状态，场馆简介（详见gym*表）
     * 2、所有场地简略信息：包括场地种类名及场地数量（详见field_category表）
     * 3、所有教练简略信息：包含教练名，教练头像，性别，工作类型，运动类型（详见coach表）
     */
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

    /** TODO: 编辑场馆信息
     * 编辑上述场馆基本信息
     **/
    public function actionEdit()
    {

    }

    // TODO: 新添场馆
    // 表单包含上述场馆基本信息
    public function actionAdd()
    {

    }

    public function actionDelete()
    {}
}
