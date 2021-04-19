<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\ArrayHelper;
use common\models\LoginForm;
use common\models\User;
use common\models\Slices;
use common\models\Subdomen;
use common\models\PagesSubdomenSeo;
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
    $allParams = new AllParams();

    // $paramNameList = [
    //   'alloy' => 'alloy',
    //   'depth' => 'depth',
    //   'width' => 'width',
    //   'curing' => 'curing',
    // ];

    // foreach ($allParams->arrAlloys['lists'] as $key => $value){

    //   if (array_key_exists($key, $paramNameList)){
    //     $paramName = $paramNameList[$key];
  
    //     foreach ($value as $value1){
    //       $newSlice = new Slices();
    //       $newSlice->alias = mb_strtolower($value1);
    //       $newSlice->parent_alias = 'alyuminievye_listy';
    //       $newSlice->name = $value1;
    //       $newSlice->params = '{"type":"lists"' . ',"' . $paramName . '":"' . $value1 . '"}';
    //       // $newSlice->save();
    //     }
    //   }
    // }

    $paramNameList = [
      'alloy' => 'сплав',
      'depth' => 'толщиной',
      'width' => 'шириной',
      'curing' => 'с термообработкой',
    ];

    $subdomensAll = Subdomen::find()->all();

    foreach (Slices::find()->where(['parent_alias' => 'alyuminievye_listy'])->all() as $slice){
      $paramsList = (array)json_decode($slice->params);
      $currentParamKey = array_key_last($paramsList);

      foreach($subdomensAll as $subdomen){
        $newSeo = new PagesSubdomenSeo();
        $newSeo->subdomen_alias = $subdomen->alias;
        $newSeo->page_id = $slice->id;
        $newSeo->page_type = 'slice';
        $newSeo->is_slice = true;
        $newSeo->header = 'Алюминиевые листы ' 
        . $paramNameList[$currentParamKey] 
        . ' ' 
        . $paramsList[$currentParamKey];

        if ($currentParamKey == 'depth' || $currentParamKey == 'width'){
          $newSeo->header .= ' мм';
        }

        $newSeo->save();
        // echo '<pre>';
        // print_r($newSeo);
        // exit;
      }
    }
    
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