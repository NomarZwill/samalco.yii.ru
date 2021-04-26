<?php
namespace frontend\controllers;

use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use common\models\Pages;
use common\models\PagesSubdomenSeo;
use common\models\Branch;
use frontend\components\Breadcrumbs;

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
    $breadcrumbs = Breadcrumbs::getBreadcrumbs();

    return $this->render('delivery', array(
      'currentPage' => $currentPage,
      'currentBranch' => $currentBranch,
      'breadcrumbs' => $breadcrumbs,
    ));
  }

  public function actionContacts()
  {
    $currentPage = Pages::find()->where(['type' => 'kontact'])->one();
    $currentBranch = Branch::find()->where(['alias' => Yii::$app->params['subdomen_alias']])->one();
    $breadcrumbs = Breadcrumbs::getBreadcrumbs();

    return $this->render('contacts', array(
      'currentPage' => $currentPage,
      'currentBranch' => $currentBranch,
      'breadcrumbs' => $breadcrumbs,
    ));
  }

  public function actionAgreement()
  {
    $breadcrumbs = Breadcrumbs::getBreadcrumbs();

    return $this->render('agreement', array(
      'breadcrumbs' => $breadcrumbs,
    ));
  }

  public function actionBranches()
  {
    $currentPage = Pages::find()->where(['type' => 'branches'])->one();
    // $currentBranch = Branch::find()->where(['alias' => Yii::$app->params['subdomen_alias']])->one();
    $breadcrumbs = Breadcrumbs::getBreadcrumbs();

    return $this->render('branches', array(
      'currentPage' => $currentPage,
      'breadcrumbs' => $breadcrumbs,
      // 'currentBranch' => $currentBranch,
    ));
  }

  public function actionCart()
  {
    $currentPage = Pages::find()->where(['type' => 'cart'])->one();
    $currentBranch = Branch::find()->where(['alias' => Yii::$app->params['subdomen_alias']])->one();  
    $breadcrumbs = Breadcrumbs::getBreadcrumbs();

    // echo '<pre>';
    // print_r(session_id());
    // exit;

    return $this->render('cart', array(
      'currentPage' => $currentPage,
      'currentBranch' => $currentBranch,
      'breadcrumbs' => $breadcrumbs,
    ));
  }
}


