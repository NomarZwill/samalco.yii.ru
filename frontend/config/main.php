<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'subdomens'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'subdomens' => [
            'class' => 'app\modules\subdomens\Module',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
                ['pattern'=>'/katalog/<slice:[\w-]+>','route'=>'katalog/slice', 'suffix'=>'/'],
                ['pattern'=>'/teh_doc/<firstLevel:[\w-]+>/<secondLevel:[\w-]+>','route'=>'documentation/second-level', 'suffix'=>'/'],
                ['pattern'=>'/teh_doc/<firstLevel:[\w-]+>','route'=>'documentation/first-level', 'suffix'=>'/'],
                ['pattern'=>'/teh_doc/','route'=>'documentation/index', 'suffix'=>'/'],
                ['pattern'=>'/delivery/','route'=>'other/delivery', 'suffix'=>'/'],
                ['pattern'=>'/ajax/get-no-balance-table/','route'=>'katalog/ajax-no-balance-table', 'suffix'=>'/'],
                ['pattern'=>'/kontact/','route'=>'other/contacts', 'suffix'=>'/'],
                ['pattern'=>'/filialy/','route'=>'other/branches', 'suffix'=>'/'],
                ['pattern'=>'/agreement/','route'=>'other/agreement', 'suffix'=>'/'],
                ['pattern'=>'/cart/','route'=>'other/cart', 'suffix'=>'/'],
            ],
        ],
    ],
    'params' => $params,
];
