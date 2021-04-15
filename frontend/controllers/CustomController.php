<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\ArrayHelper;
use common\models\LoginForm;
use common\models\User;
use common\models\Slices;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use backend\components\AllParams;

class CustomController extends Controller
{

  public function actionIndex()
  {
    return $this->render('index.php');
  }

  public function actionCustom()
  {
    // $allParams = new AllParams();

    // foreach ($allParams['lists'] as $key => $value){

    //   if ($key !== 'length'){

    //     foreach ($value as $value1){

    //       $newSlice = new Slices();
    //       $newSlice->alias = $value1;
    //       $newSlice->category_alias = $value1;
    //     }

    //   }
    // }
    
    echo "конец";
    exit;
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

  public function actionCreateUser()
  {

    // $user = new User();
    // $user->username = 'admin';
    // $user->email = 'artm@liderpoiska.ru';
    // $user->password = 'Gjf/1k2U';
    // $user->setPassword('Gjf/1k2U');
    // $user->generateAuthKey();
    
    // return $user->save() ? $user : 'пользователь не создан';

    
    echo "конец";
    exit;
  }

}