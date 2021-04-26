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
    $currentPage = Pages::find()->where(['alias' => 'teh_doc'])->one();
    $childrenPageList = Pages::find()->where(['parent_id' => 2])->all();
    $breadcrumbs = Breadcrumbs::getBreadcrumbs();

    return $this->render('index', array(
      'currentPage' => $currentPage,
      'childrenPageList' => $childrenPageList,
      'breadcrumbs' => $breadcrumbs,
    ));
  }    

  public function actionFirstLevel($firstLevel)
  {
    $currentPage = Pages::find()->where(['alias' => $firstLevel])->one();
    $breadcrumbs = Breadcrumbs::getBreadcrumbs();
    
    return $this->render('innerPage', array(
      'currentPage' => $currentPage,
      'allPages' => $this->getSidebarInfo(),
      'breadcrumbs' => $breadcrumbs,
    ));
  }

  public function actionSecondLevel($firstLevel, $secondLevel)
  {
    $currentPage = Pages::find()->where(['alias' => $secondLevel])->one();
    $breadcrumbs = Breadcrumbs::getBreadcrumbs();

    return $this->render('innerPage', array(
      'currentPage' => $currentPage,
      'allPages' => $this->getSidebarInfo(),
      'breadcrumbs' => $breadcrumbs,
    ));
  }

  public function actionChertezhi()
  {
    $childrenPages = Pages::find()
      ->where(['parent_id' => 5])
      // ->with('subdomenSeo')
      // ->with('extraContent')
      ->all();

    $breadcrumbs = Breadcrumbs::getBreadcrumbs();

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
}


