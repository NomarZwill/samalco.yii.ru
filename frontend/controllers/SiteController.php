<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\User;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public function actionIndex()
    {
        // $user = new User();
        // $user->username = 'admin';
        // $user->email = 'artm@liderpoiska.ru';
        // $user->password = 'Gjf/1k2U';
        // $user->setPassword('Gjf/1k2U');
        // $user->generateAuthKey();
        
        // return $user->save() ? $user : 'пользователь не создан';
        return $this->render('index');
    }

    public function actionInfo(){
        // 'dsn' 			=> 'mysql:host=localhost;dbname=pmn_gorko_ny',

        $connection = new \yii\db\Connection([
            'dsn' 		=> $siteArr[$site]['params']['dsn'],
            'username' 	=> 'pmnetwork',
            'password' 	=> 'P2t8wdBQbczLNnVT',
            'charset' 	=> 'utf8',
        ]);
        $connection->open();
			Yii::$app->set('db', $connection);
    }
    
}


