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
        'plugins/clockpicker/bootstrap-clockpicker.js',
        'plugins/jcrop/jquery.Jcrop.js',
        'plugins/ajaxFileUploader/ajaxfileupload.js',
        'plugins/ueditor/ueditor.config.js',
        'plugins/ueditor/ueditor.all.min.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
