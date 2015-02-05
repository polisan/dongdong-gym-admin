<?php

namespace app\assets;

use yii\web\AssetBundle;

class MainAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/common.css',
        'css/main.css',
        'plugins/clockpicker/bootstrap-clockpicker.css',
        'plugins/jcrop/jquery.Jcrop.css',
    ];
    public $js = [
        'js/main.js',
        'plugins/clockpicker/bootstrap-clockpicker.js',
        'plugins/jcrop/jquery.Jcrop.js',
        'plugins/ajaxFileUploader/ajaxfileupload.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
