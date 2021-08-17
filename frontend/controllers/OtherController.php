<?php
namespace frontend\controllers;

use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use common\models\Pages;
use common\models\PagesSubdomenSeo;
use common\models\Branch;
use frontend\components\Breadcrumbs;
use common\models\StaticBlock;

class OtherController extends Controller
{
  public function actionIndex()
  {
    return $this->render('index');
  }

  public function actionDelivery()
  {
    $currentPage = Pages::find()
      ->where(['id' => 48])
      ->with('subdomenSeo')
      ->one();
    $currentBranch = Branch::find()->where(['alias' => Yii::$app->params['subdomen_alias']])->one();
    $breadcrumbs = Breadcrumbs::getBreadcrumbs();

    $this->setSeo($currentPage);

    return $this->render('delivery', array(
      'currentPage' => $currentPage,
      'currentBranch' => $currentBranch,
      'breadcrumbs' => $breadcrumbs,
    ));
  }

  public function actionContacts()
  {
    $currentPage = Pages::find()
      ->where(['type' => 'kontact'])
      ->with('subdomenSeo')
      ->one();
    $currentBranch = Branch::find()->where(['alias' => Yii::$app->params['subdomen_alias']])->one();
    $breadcrumbs = Breadcrumbs::getBreadcrumbs();

    $this->setSeo($currentPage);

    return $this->render('contacts', array(
      'currentPage' => $currentPage,
      'currentBranch' => $currentBranch,
      'breadcrumbs' => $breadcrumbs,
      'staticBlock_1' => StaticBlock::find()->where(['id' => 15])->one()->content,
      'staticBlock_2' => StaticBlock::find()->where(['id' => 16])->one()->content,
    ));
  }

  public function actionAgreement()
  {
    $currentPage = Pages::find()
      ->where(['type' => 'agreement'])
      ->one();
    
    $breadcrumbs = Breadcrumbs::getBreadcrumbs();

    $currentPage->title = str_replace('**subdomen**', (Yii::$app->params['subdomen_alias'] != '' ? (Yii::$app->params['subdomen_alias'] . '.') : ''), $currentPage->title);
    $currentPage->description = str_replace('**subdomen**', (Yii::$app->params['subdomen_alias'] != '' ? (Yii::$app->params['subdomen_alias'] . '.') : ''), $currentPage->description);
        //         echo '<pre>';
        // print_r($currentPage);
        // exit;


    $this->setSeo($currentPage);

    return $this->render('agreement', array(
      'currentPage' => $currentPage,
      'breadcrumbs' => $breadcrumbs,
    ));
  }

  public function actionBranches()
  {
    $currentPage = Pages::find()
    ->where(['type' => 'branches'])
    ->with('subdomenSeo')
    ->one();

    $breadcrumbs = Breadcrumbs::getBreadcrumbs();

    $this->setSeo($currentPage);

    return $this->render('branches', array(
      'currentPage' => $currentPage,
      'breadcrumbs' => $breadcrumbs,
    ));
  }

  public function actionCart()
  {
    $currentPage = Pages::find()->where(['type' => 'cart'])->one();
    $currentBranch = Branch::find()->where(['alias' => Yii::$app->params['subdomen_alias']])->one();  
    $breadcrumbs = Breadcrumbs::getBreadcrumbs();

    $sidebar = $this->renderPartial('/components/sidebar', array(
      'items' => Pages::find()->where(['in_sidebar' => true])->with('extraContent')->orderBy(['sidebar_sort' => SORT_ASC])->all(),
      'table' => '',
      'mobile' => '',
    ));

    $this->setSeo($currentPage);

    // echo '<pre>';
    // print_r(session_id());
    // exit;

    return $this->render('cart', array(
      'currentPage' => $currentPage,
      'currentBranch' => $currentBranch,
      'breadcrumbs' => $breadcrumbs,
      'sidebar' => $sidebar,
    ));
  }

  private function setSeo($seo)
  {
    if (isset($seo['subdomenSeo']['title']) && $seo['subdomenSeo']['title'] !== ''){
        $this->view->title = $seo['subdomenSeo']['title'];
    } elseif(isset($seo['title'])){
        $this->view->title = str_replace('**subdomen_dec**', Yii::$app->params['subdomen_dec'], $seo['title']);
    } else {
        $this->view->title = false;
    }

    if (isset($seo['subdomenSeo']['description']) && $seo['subdomenSeo']['description'] !== ''){
        $this->view->params['desc'] = $seo['subdomenSeo']['description'];
    } elseif(isset($seo['description'])){
        $this->view->params['desc'] = str_replace('**subdomen_dec**', Yii::$app->params['subdomen_dec'], $seo['description']);
    } else {
        $this->view->params['desc'] = false;
    }

    if (isset($seo['subdomenSeo']['keywords'])){
        $this->view->params['kw'] = $seo['subdomenSeo']['keywords'];
    } elseif(isset($seo['keywords'])){
        $this->view->params['kw'] = $seo['keywords'];
    } else {
        $this->view->params['kw'] = false;
    }
  }
}
