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

    $currentSlice = Slices::find()->where(['alias' => $slice])->one();
    $paramsList = json_decode($currentSlice->params);
    $paramsList->subdomen = Yii::$app->params['subdomen_alias'];
    $tableData = ItemsParams::getSliceData($paramsList);
    $allParams = new AllParams();
    $subSliceList = $allParams->arrAlloys[$paramsList->type];
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
    // print_r($paramsList);
    // exit;

    return $this->render('slice', array(
      'tableData' => $tableData,
      'subSliceList' => $subSliceList,
      'currentSlice' => $currentSlice,
      'currentPage' => $currentPage,
      'currentBranch' => $currentBranch,
      'currentItem' => $currentItem,
      'is_root_slice' => true,
    ));
  }

  public function actionAjaxNoBalanceTable(){
    $paramsList = [];
    $paramsList['type'] = $_POST['table'];
    $paramsList['subdomen'] = Yii::$app->params['subdomen_alias'];
    $currentItem = Items::find()->where(['type' => $paramsList['type']])->one();
    $currentSlice = Slices::find()->where(['params' => '{"type":"' . $paramsList['type'] . '"}'])->one();
    $table = $this->renderPartial('/components/noBalanceTable', array(
      'tableData' => ItemsParams::getSliceDataNoBalance($paramsList),
      'currentItem' => $currentItem,
      'currentSlice' => $currentSlice,
    ));

    return json_encode([
      'table' => $table
    ]);
  }
}


