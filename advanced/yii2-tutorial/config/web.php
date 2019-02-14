<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$cache = require(__DIR__ . '/cache.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
//    'language' => 'ru-RU',
    'language' => 'en-US',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'WWAH9LZfwzvV4R-1RoZybEHJTagZa7KT',
        ],
//        'cache' => $cache,
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
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
        'db' => $db,
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['guest'],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'register' => 'site/register',
                'contact' => 'site/contact',
                'course/<action>' => 'course/<action>',
                'subscribe' => 'subscribe/subscribe',
                'subscriptions' => 'subscribe/index',
                'user/lang/<lang>' => 'site/lang',
            ],
        ],
        'assetManager' => [
            'appendTimestamp' => true,
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => false,
                'yii\bootstrap\BootstrapPluginAsset' => false,
            ],
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'forceTranslation' => true,
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
//                    'class' => 'yii\i18n\DbMessageSource',
//                    'sourceMessageTable'=>'{{%source_message}}',
//                    'messageTable'=>'{{%message}}',
//                    'enableCaching' => true,
//                    'cachingDuration' => 10,
                ]
            ]
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
