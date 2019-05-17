<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php',
    require __DIR__ . '/params-index-page.php'
);

return [
    'id' => 'app-backend',
    'name' => '政企通后台',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
			'parsers' => [
				'application/json' => 'yii\web\JsonParser',
			]
        ],
        'response' => [                 
            'format' => yii\web\Response::FORMAT_JSON, 
            'charset' => 'UTF-8',               
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
			'enableSession' => false,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => false,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'user',
                    'only' => ['login', 'logout'],
                    'extraPatterns'=>[
                        'POST login'=>'login',
                        'GET logout'=>'logout'
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'type-group'
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'type-set'
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'policy',
                    'extraPatterns'=>[
                        'GET search' => 'search',
                        'GET recommend' => 'recommend'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'gov-headline',
                    'extraPatterns'=>[
                        'GET search'=>'search'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'sort',
                    'extraPatterns' => [
                        'GET policy' => 'policy',
                        'GET policy-more' => 'policy-more'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'upload'
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'activity'
                ]
            ],
        ],
        'response' => [
            'class' => 'yii\web\Response',
            'on beforeSend' => function ($event) {
                $response = $event->sender;
                if ($response->data !== null) {
                    $response->data = [
                        'success' => $response->isSuccessful,
                        'data' => $response->data,
                    ];
                $response->statusCode = 200;
                }
            },
        ],
    ],
    'params' => $params,
];
