<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
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
            'showScriptName' => false,
            'rules' => [
				'type-set' => 'type-set/index',
				'type-set/create' => 'type-set/create',
				'type-set/<alias:\w+>' => 'type-set/index',
				'type-set/view/<id:\d+>' => 'type-set/view',
				'type-set/update/<id:\d+>' => 'type-set/update',
                'type-set/delete/<id:\d+>' => 'type-set/delete',
                
				'policy' => 'policy/index',
				'policy/<page:\d+>/<offset:\d+>' => 'policy/index',
				'policy/view/<id:\d+>' => 'policy/view',
				'policy/update/<id:\d+>' => 'policy/update',
				'policy/delete/<id:\d+>' => 'policy/delete',
                
                'type-group' => 'type-group/index',
				'type-group/<page:\d+>/<offset:\d+>' => 'type-group/index',
				'type-group/view/<id:\d+>' => 'type-group/view',
				'type-group/update/<id:\d+>' => 'type-group/update',
                'type-group/delete/<id:\d+>' => 'type-group/delete',
                
                'gov-headline' => 'gov-headline/index',
                'gov-headline/<page:\d+>/<offset:\d+>' => 'gov-headline/index',
                'gov-headline/view/<id:\d+>' => 'gov-headline/view',
                'gov-headline/update/<id:\d+>' => 'gov-headline/update',
                'gov-headline/delete/<id:\d+>' => 'gov-headline/delete'
                
            ],
        ],
    ],
    'params' => $params,
];
