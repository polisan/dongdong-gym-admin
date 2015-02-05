<?php

namespace app\modules\my;

use Yii;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\my\controllers';

    public function init()
    {
        parent::init();

        Yii::configure($this, ['defaultRoute' => '/account/profile']);
    }
}
