<?php
namespace frontend\controllers;

use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use common\models\Pages;
use common\models\PagesSubdomenSeo;
use common\models\Branch;

class OtherController extends Controller
{
  public function actionIndex()
  {
    return $this->render('index');
  }

  public function actionDelivery()
  {
    $currentPage = PagesSubdomenSeo::find()->where(['page_type' => 'delivery'])->andWhere(['subdomen_alias' => Yii::$app->params['subdomen_alias']])->one();
    $currentBranch = Branch::find()->where(['alias' => Yii::$app->params['subdomen_alias']])->one();

    return $this->render('delivery', array(
      'currentPage' => $currentPage,
      'currentBranch' => $currentBranch,
    ));
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
    $currentPage = Pages::find()->where(['type' => 'cart'])->one();
    $currentBranch = Branch::find()->where(['alias' => Yii::$app->params['subdomen_alias']])->one();  

    // echo '<pre>';
    // print_r(session_id());
    // print_r($_COOKIE);
    // exit;

    return $this->render('cart', array(
      'currentPage' => $currentPage,
      'currentBranch' => $currentBranch,
    ));
  }
}


