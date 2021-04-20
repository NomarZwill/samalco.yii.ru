<?php
namespace frontend\controllers;

use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use backend\components\AllParams;
use common\models\Slices;
use common\models\Items;
use common\models\ItemsParams;
use common\models\Branch;
use common\models\Pages;
use common\models\PagesExtraContent;

class KatalogController extends Controller
{
  public function actionIndex()
  {
    $katalogPage = Pages::find()
      ->where(['parent_id' => 33])
      ->with('extraContent')
      ->all();

    return $this->render('index', array(
      'katalogPage' => $katalogPage
    ));
  }    

  public function actionSlice($slice)
  {
    if (!Slices::find()->where(['alias' => $slice])->exists()){
      throw new \yii\web\NotFoundHttpException();
    }
  
    if (!strripos(Yii::$app->request->url, '?') === false){
      return $this->actionMultiparamsSlice($slice);
    }

    $currentSlice = Slices::find()->where(['alias' => $slice])->one();
    $paramsList = json_decode($currentSlice->params);
    $paramsList->subdomen = Yii::$app->params['subdomen_alias'];
    $tableData = ItemsParams::getSliceData($paramsList);
    $allParams = new AllParams();

    if (strripos($_SERVER['REQUEST_URI'], 'alyuminievye_profili')){
      $subSliceList = $allParams->arrAlloys['profils'][$paramsList->type];
      unset($subSliceList['depth']);
    } else {
      $subSliceList = $allParams->arrAlloys[$paramsList->type];
    }
    unset($subSliceList['length']);

    $currentPage = Pages::find()
      ->where(['alias' => $slice])
      ->with('subdomenSeo')
      ->with('extraContent')
      ->one();
    
    $currentBranch = Branch::find()
      ->where(['alias' => Yii::$app->params['subdomen_alias']])
      ->one();

    $currentItem = Items::find()->where(['type' => $paramsList->type])->one();

    // echo '<pre>';
    // print_r($currentPage);
    // exit;

    return $this->render('slice', array(
      'tableData' => $tableData,
      'subSliceList' => $subSliceList,
      'currentSlice' => $currentSlice,
      'currentPage' => $currentPage,
      'currentBranch' => $currentBranch,
      'currentItem' => $currentItem,
      'paramsList' => $paramsList,
      'is_root_slice' => true,
    ));
  }

  public function actionSliceFromParam($slice1, $slice2)
  {
    if (!strripos(Yii::$app->request->url, '?') === false){
      return $this->actionMultiparamsSlice($slice1);
    }

    if (!Slices::find()->where(['parent_alias' => $slice1, 'alias' => $slice2])->exists()){
      throw new \yii\web\NotFoundHttpException();
    }

    $currentSlice = Slices::find()
      ->where([
        'parent_alias' => $slice1, 
        'alias' => $slice2
        ])
      ->with('subdomenSeo')
      ->one();
    $paramsList = json_decode($currentSlice->params);
    $paramsList->subdomen = Yii::$app->params['subdomen_alias'];
    $tableData = ItemsParams::getSliceData($paramsList);
    $allParams = new AllParams();

    if (strripos($_SERVER['REQUEST_URI'], 'alyuminievye_profili')){
      $subSliceList = $allParams->arrAlloys['profils'][$paramsList->type];
      unset($subSliceList['depth']);
    } else {
      $subSliceList = $allParams->arrAlloys[$paramsList->type];
    }
    unset($subSliceList['length']);
    $noBalanceTableData = ItemsParams::getSliceDataNoBalance($paramsList);
    $currentBranch = Branch::find()
      ->where(['alias' => Yii::$app->params['subdomen_alias']])
      ->one();

    $currentItem = Items::find()->where(['type' => $paramsList->type])->one();

    if ($paramsList->type === 'tubes' && isset($paramsList->width)){
      $paramsList->width_st = $paramsList->width;
      unset($paramsList->width);
    }

    // echo '<pre>';
    // print_r($paramsList);
    // exit;

    return $this->render('slice', array(
      'tableData' => $tableData,
      'noBalanceTableData' => $noBalanceTableData,
      'subSliceList' => $subSliceList,
      'currentSlice' => $currentSlice,
      'currentPage' => $currentSlice,
      'currentBranch' => $currentBranch,
      'currentItem' => $currentItem,
      'paramsList' => $paramsList,
      'is_root_slice' => false,
    ));
  }

  public function actionMultiparamsSlice($slice)
  {
    $currentSlice = Slices::find()->where(['alias' => $slice])->one();
    $paramsList = json_decode($currentSlice->params);
    $paramsList->subdomen = Yii::$app->params['subdomen_alias'];
    $tableData = ItemsParams::getMultiparamsSlice($paramsList);
    $allParams = new AllParams();

    if (strripos($_SERVER['REQUEST_URI'], 'alyuminievye_profili')){
      $subSliceList = $allParams->arrAlloys['profils'][$paramsList->type];
      unset($subSliceList['depth']);
    } else {
      $subSliceList = $allParams->arrAlloys[$paramsList->type];
    }
    unset($subSliceList['length']);

    $currentPage = Pages::find()
      ->where(['alias' => $slice])
      ->with('subdomenSeo')
      ->with('extraContent')
      ->one();
    
    $currentBranch = Branch::find()
      ->where(['alias' => Yii::$app->params['subdomen_alias']])
      ->one();

    $currentItem = Items::find()->where(['type' => $paramsList->type])->one();

    // echo '<pre>';
    // print_r(count($tableData));
    // exit;

    return $this->render('slice', array(
      'tableData' => $tableData,
      'noBalanceTableData' => ItemsParams::getMultiparamsSliceNoBalance($paramsList),
      'subSliceList' => $subSliceList,
      'currentSlice' => $currentSlice,
      'currentPage' => $currentPage,
      'currentBranch' => $currentBranch,
      'currentItem' => $currentItem,
      'paramsList' => $paramsList,
      'is_root_slice' => false,
    ));
  }

  public function actionProfili()
  {
    $currentPage = Pages::find()
      ->where(['alias' => 'alyuminievye_profili'])
      ->with('subdomenSeo')
      ->with('extraContent')
      ->one();
  
    $currentBranch = Branch::find()
      ->where(['alias' => Yii::$app->params['subdomen_alias']])
      ->one();

    //     echo '<pre>';
    // print_r($currentPage);
    // exit;

    return $this->render('profili', array(
      'currentPage' => $currentPage,
      'currentBranch' => $currentBranch,
    ));
  }

  public function actionShina()
  {
    $currentPage = Pages::find()
    ->where(['alias' => 'alyuminievaya_shina'])
    ->with('subdomenSeo')
    ->with('extraContent')
    ->one();

  $currentBranch = Branch::find()
    ->where(['alias' => Yii::$app->params['subdomen_alias']])
    ->one();

    return $this->render('shina', array(
      'currentPage' => $currentPage,
      'currentBranch' => $currentBranch,
    ));
  }

  public function actionShtampovki()
  {
    $currentPage = Pages::find()
    ->where(['alias' => 'alyuminievye_pokovki_i_shtampovki'])
    ->with('subdomenSeo')
    ->with('extraContent')
    ->one();

  $currentBranch = Branch::find()
    ->where(['alias' => Yii::$app->params['subdomen_alias']])
    ->one();

    return $this->render('shtampovki', array(
      'currentPage' => $currentPage,
      'currentBranch' => $currentBranch,
    ));
  }

  public function actionProfnastil()
  {
    $currentPage = Pages::find()
    ->where(['alias' => 'alyuminieviy_profnastil'])
    ->with('subdomenSeo')
    ->with('extraContent')
    ->one();

  $currentBranch = Branch::find()
    ->where(['alias' => Yii::$app->params['subdomen_alias']])
    ->one();

    return $this->render('profnastil', array(
      'currentPage' => $currentPage,
      'currentBranch' => $currentBranch,
    ));
  }

  public function actionAjaxNoBalanceTable(){
    $paramsList = [];
    $paramsList['type'] = $_POST['table'];
    $paramsList['subdomen'] = Yii::$app->params['subdomen_alias'];
    $currentItem = Items::find()->where(['type' => $paramsList['type']])->one();
    $currentSlice = Slices::find()->where(['params' => '{"type":"' . $paramsList['type'] . '"}'])->one();
    $table = $this->renderPartial('/components/noBalanceTable', array(
      'tableData' => ItemsParams::getSliceDataNoBalance((object)$paramsList),
      'currentItem' => $currentItem,
      'currentSlice' => $currentSlice,
      'is_root_slice' => true,
    ));

    return json_encode([
      'table' => $table
    ]);
  }
}


