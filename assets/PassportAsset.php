<?php

namespace app\assets;

use yii\web\AssetBundle;

class PassportAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/common.css',
        'css/main.css',
        'css/passport.css',
    ];
    public $js = [
        'js/passport.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
