<?php
$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'dongdong-gym-admin-web',
    'name' => '动动场馆后台管理',
    'version' => '0.6',
    'charset' => 'utf-8',
    'language' => 'zh-CN',
    'sourceLanguage' => 'zh-CN',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'app\controllers',
    'defaultRoute' => 'default',
    'layout' => '/main',
    'bootstrap' => ['log'],
    'homeUrl' => ['/'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '4KVDS8UO_E-6rN9ETa80i5jYyLsQmzRd',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\GymAdmin',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => '/support/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
    ],
    'modules' => [
        'address' => [
            'class' => 'app\modules\address\Module',
        ],
        'gym' => [
            'class' => 'app\modules\gym\Module',
        ],
        'my' => [
            'class' => 'app\modules\my\Module',
        ],
        'passport' => [
            'class' => 'app\modules\passport\Module',
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
