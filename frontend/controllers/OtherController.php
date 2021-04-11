<?php
namespace frontend\controllers;

use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

class OtherController extends Controller
{
  public function actionIndex()
  {
    return $this->render('index');
  }

  public function actionDelivery()
  {
    return $this->render('delivery');
  }

  public function actionContacts()
  {
    return $this->render('contacts');
  }

  public function actionAgreement()
  {
    return $this->render('agreement');
  }

  public function actionBranches()
  {
    return $this->render('branches');
  }

  public function actionCart()
  {
    return $this->render('cart');
  }
}


