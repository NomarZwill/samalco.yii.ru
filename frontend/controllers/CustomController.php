<?php
namespace frontend\controllers;
require '/var/www/samalco.yii.ru/backend/models/all_params.php';

use Yii;
use yii\web\Controller;
use yii\helpers\ArrayHelper;
use backend\models\Randomizer;

class CustomController extends Controller
{

  public function actionIndex()
  {
    return $this->render('index.php');
  }

  public function actionCustom()
  {
    global $density;
    $randomizer = new Randomizer();
    echo "<pre>";
    print_r($randomizer->getAllParams());
    echo "конец";
    exit;
  }
}