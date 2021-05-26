<?php
namespace frontend\controllers;

use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use common\models\Pages;
use frontend\components\Breadcrumbs;

class DocumentationController extends Controller
{
  public function actionIndex()
  {
    $currentPage = Pages::find()
      ->where(['alias' => 'teh_doc'])
      ->one();
    $childrenPageList = Pages::find()->where(['parent_id' => 2])->all();
    $breadcrumbs = Breadcrumbs::getBreadcrumbs();
    
    $this->setSeo($currentPage);

    return $this->render('index', array(
      'currentPage' => $currentPage,
      'childrenPageList' => $childrenPageList,
      'breadcrumbs' => $breadcrumbs,
    ));
  }    

  public function actionFirstLevel($firstLevel)
  {
    if (!Pages::find()->where(['alias' => $firstLevel])->exists()){
      throw new \yii\web\NotFoundHttpException();
    }
    
    $currentPage = Pages::find()
      ->where(['alias' => $firstLevel])
      ->one();
    $breadcrumbs = Breadcrumbs::getBreadcrumbs();

    $this->setSeo($currentPage);
    
    return $this->render('innerPage', array(
      'currentPage' => $currentPage,
      'allPages' => $this->getSidebarInfo(),
      'breadcrumbs' => $breadcrumbs,
      'parentAlias' => $firstLevel,
    ));
  }

  public function actionSecondLevel($firstLevel, $secondLevel)
  {
    $currentPage = Pages::find()->where(['alias' => $secondLevel])->one();
    $breadcrumbs = Breadcrumbs::getBreadcrumbs();

    $this->setSeo($currentPage);

    return $this->render('innerPage', array(
      'currentPage' => $currentPage,
      'allPages' => $this->getSidebarInfo(),
      'breadcrumbs' => $breadcrumbs,
      'parentAlias' => $firstLevel,
    ));
  }

  public function actionChertezhi()
  {
    $currentPage = Pages::find()->where(['id' => 5])->one();
    $childrenPages = Pages::find()
      ->where(['parent_id' => 5])
      ->all();

    $breadcrumbs = Breadcrumbs::getBreadcrumbs();

    $this->setSeo($currentPage);

    return $this->render('chertezhi', array(
      'childrenPages' => $childrenPages,
      'breadcrumbs' => $breadcrumbs,
    ));
  }

  private function getSidebarInfo()
  {
    $allLevelPagesList = Pages::find()
      ->select(['id', 'parent_id', 'alias', 'header'])
      ->where(['type' => 'documentation'])
      ->all();

    $servises = array();

    foreach ($allLevelPagesList as $key => $item){
      $servises[$item['parent_id']][$item['id']] = $item;
    }

    return $servises;
  }

  private function setSeo($seo)
  {
    if (isset($seo['subdomenSeo']['title']) && $seo['subdomenSeo']['title'] !== ''){
        $this->view->title = $seo['subdomenSeo']['title'];
    } elseif(isset($seo['title'])){
        $this->view->title = $seo['title'];
    } else {
        $this->view->title = false;
    }

    if (isset($seo['subdomenSeo']['description']) && $seo['subdomenSeo']['description'] !== ''){
        $this->view->params['desc'] = $seo['subdomenSeo']['description'];
    } elseif(isset($seo['title'])){
        $this->view->params['desc'] = $seo['description'];
    } else {
        $this->view->params['desc'] = false;
    }

    if (isset($seo['subdomenSeo']['keywords'])){
        $this->view->params['kw'] = $seo['subdomenSeo']['keywords'];
    } elseif(isset($seo['title'])){
        $this->view->params['kw'] = $seo['keywords'];
    } else {
        $this->view->params['kw'] = false;
    }

  }
}
