<?php

namespace app\modules\address\controllers;

use app\models\Area;
use Yii;
use yii\filters\AccessControl;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

class AjaxController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['provinces', 'cities', 'counties'],
                'rules' => [
                    'provinces' => [
                        'allow' => true,
                        'verbs' => ['POST'],
                    ],
                    'cities' => [
                        'allow' => true,
                        'verbs' => ['POST'],
                    ],
                    'counties' => [
                        'allow' => true,
                        'verbs' => ['POST'],
                    ],
                ]
            ],
        ];
    }

    public function actions()
    {
    }

    public function actionProvinces()
    {
        $provinces = Area::findProvinces();
        foreach ($provinces as $province) {
            echo '<option value="'.$province['id'].'">'.$province['name'].'</option>'.PHP_EOL;
        }
    }

    public function actionCities()
    {
        $p = Yii::$app->request->post('province');
        if (empty($p) || $p <= 0) {
            throw new BadRequestHttpException();
        }
        $cities = Area::findByParent($p);
        foreach ($cities as $city) {
            echo '<option value="'.$city['id'].'">'.$city['name'].'</option>'.PHP_EOL;
        }
    }

    public function actionCounties()
    {
        $c = Yii::$app->request->post('city');
        if (empty($c) || $c <= 0) {
            throw new BadRequestHttpException();
        }
        $counties = Area::findByParent($c);
        foreach ($counties as $county) {
            echo '<option value="'.$county['id'].'">'.$county['name'].'</option>'.PHP_EOL;
        }

    }
}
