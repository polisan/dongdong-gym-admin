<?php
namespace app\modules\gym\controllers;

use app\models\GymMembercard;
use yii\web\Controller;

class MemberCardsController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionEdit()
    {
        $model = new GymMembercard();
        return $this->render('card_edit', ['model' => $model]);
    }

    public function actionAdd()
    {
        $model = new GymMembercard();
        return $this->render('card_add', ['model' => $model]);
    }

    public function actionDelete()
    {
        $message = [
            'statusCode' => 200,
            'message' => '删除成功',
        ];
        return json_encode($message);
    }
}
