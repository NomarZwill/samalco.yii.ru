<?php
namespace frontend\controllers;

use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

class KatalogController extends Controller
{
  public function actionIndex()
  {
    return $this->render('index');
  }    
}


