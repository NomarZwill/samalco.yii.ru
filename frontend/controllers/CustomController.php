<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\ArrayHelper;

class CustomController extends Controller
{

  public function actionIndex()
  {
    return $this->render('index.php');
  }

  public function actionCustom()
  {
    
    echo "конец";
    exit;
  }
}