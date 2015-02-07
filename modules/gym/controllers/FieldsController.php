<?php

namespace app\modules\gym\controllers;

use app\models\FieldCategory;
use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use app\models\Field;

class FieldsController extends Controller
{
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
    {
        $fd = Yii::$app->request->post('fd');
        if (empty($fd) || $fd <=0 ) {
            throw new BadRequestHttpException();
        }
        if (1) {
            $this->layout = false;
            return $this->render('field_update');    // 显示修改field的表单
        }
    }

    public function actionAdd()
    {
    }

    public function actionDelete()
    {}

    // 编辑场地类型信息
    public function actionEditFieldCategory()
    {
        $model = new FieldCategory();
        return $this->render('fieldcategory_edit', ['model' => $model]);
    }
    // 增加场地类型
    public function actionAddFieldCategory()
    {
        $model = new FieldCategory();
        return $this->render('fieldcategory_add', ['model' => $model]);
    }
    // 删除场地类型
    public function actionDeleteFieldCategory()
    {
        $message = [
            'statusCode' => 200,
            'message' => '删除成功',
        ];
        return json_encode($message);
    }
}
