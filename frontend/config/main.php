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
                ['pattern'=>'/katalog/alyuminieviy_profnastil/','route'=>'katalog/profnastil', 'suffix'=>'/'],
                ['pattern'=>'/katalog/alyuminievye_pokovki_i_shtampovki/','route'=>'katalog/shtampovki', 'suffix'=>'/'],
                ['pattern'=>'/katalog/alyuminievaya_shina/','route'=>'katalog/shina', 'suffix'=>'/'],
                ['pattern'=>'/katalog/alyuminievye_profili/<slice1:[\w-]+>/<slice2:[\w\-.]+>','route'=>'katalog/slice-from-param', 'suffix'=>'/'],
                ['pattern'=>'/katalog/alyuminievye_profili/<slice:[\w-]+>','route'=>'katalog/slice', 'suffix'=>'/'],
                ['pattern'=>'/katalog/alyuminievye_profili/','route'=>'katalog/profili', 'suffix'=>'/'],
                ['pattern'=>'/katalog/<slice1:[\w-]+>/<slice2:[\w\-.]+>','route'=>'katalog/slice-from-param', 'suffix'=>'/'],
                ['pattern'=>'/katalog/<slice:[\w-]+>','route'=>'katalog/slice', 'suffix'=>'/'],
                ['pattern'=>'/teh_doc/chertezhi/','route'=>'documentation/chertezhi', 'suffix'=>'/'],
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
