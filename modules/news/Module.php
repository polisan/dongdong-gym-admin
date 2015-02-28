<?php

namespace app\modules\news;

use Yii;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\news\controllers';

    public function init()
    {
        parent::init();

        Yii::configure($this, ['defaultRoute' => '/news/']);
    }
}
