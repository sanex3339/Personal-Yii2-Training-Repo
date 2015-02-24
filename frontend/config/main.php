<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'name' => 'Yii',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute' => 'site/default/index',
    'components' => [
        'request' => [
            'baseUrl' => '',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
        'urlManager' => [
            'rules' => [
                '' => 'site/default/index',
            ],
        ], 
        'view' => [
            'theme' => 'sanex\layout\site\Layout'
        ],
        'errorHandler' => [
            'errorAction' => 'site/default/error',
        ],
    ],
    'modules' => [
        'site' => [
            'class' => 'sanex\site\Module',
        ],
        'hexal' => [
            'class' => 'sanex\hexal\Module',
        ],
        'blog' => [
            'class' => 'sanex\blog\Module',
        ],
        'catalog' => [
            'class' => 'sanex\catalog\Module',
        ],
        'filter' => [
            'class' => 'sanex\filter\SanexFilter',
        ],
    ],
    'params' => $params,
];
