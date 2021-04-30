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
use common\models\StaticBlock;
use frontend\components\Breadcrumbs;

class KatalogController extends Controller
{
  public $sidebar;

  public function beforeAction($action)
	{
		$this->sidebar = $this->renderPartial('/components/sidebar', array(
      'items' => Pages::find()->where(['in_sidebar' => true])->with('extraContent')->orderBy(['sidebar_sort' => SORT_ASC])->all(),
      'table' => '',
      'mobile' => '',
    ));

	    return parent::beforeAction($action);
	}

  public function actionIndex()
  {
    $katalogPage = Pages::find()
      ->where(['parent_id' => 33])
      ->with('extraContent')
      ->all();

    $breadcrumbs = Breadcrumbs::getBreadcrumbs();

    // echo '<pre>';
    // print_r($sidebar);
    // exit;


    return $this->render('index', array(
      'katalogPage' => $katalogPage,
      'breadcrumbs' => $breadcrumbs,
      'sidebar' => $this->sidebar,
    ));
  }    

  public function actionSlice($slice)
  {
    if (!Slices::find()->where(['alias' => $slice, 'parent_alias' => ['', 'alyuminievye_profili']])->exists()){
      throw new \yii\web\NotFoundHttpException();
    }
  
    if (!strripos(Yii::$app->request->url, '?') === false){
      return $this->actionMultiparamsSlice($slice);
    }

    $currentSlice = Slices::find()
      ->where(['alias' => $slice])
      ->with('subdomenSeo')
      ->one();
      
    $paramsList = json_decode($currentSlice->params);
    $paramsList->subdomen = Yii::$app->params['subdomen_alias'] === '' ? 'moscow' : Yii::$app->params['subdomen_alias'];
    $tableData = ItemsParams::getSliceData($paramsList);
    $allParams = new AllParams();

    if (strripos($_SERVER['REQUEST_URI'], 'alyuminievye_profili')){
      $is_profil = true;
      $subSliceList = $allParams->arrAlloys['profils'][$paramsList->type];
      unset($subSliceList['depth']);
    } else {
      $is_profil = false;
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

    $orderProcedure = StaticBlock::find()->where(['id' => 1])->one();
    $orderProcedure = str_replace('**subdomen_dec**', Yii::$app->params['subdomen_dec'], $orderProcedure->content);
    $orderProcedure = str_replace('**name_rod**', $currentPage['extraContent']['name_rod'], $orderProcedure);

    $breadcrumbs = Breadcrumbs::getBreadcrumbs();

    // echo '<pre>';
    // print_r($currentSlice);
    // exit;

    return $this->render('slice', array(
      'tableData' => $tableData,
      'subSliceList' => $subSliceList,
      'currentSlice' => $currentSlice,
      'currentPage' => $currentPage,
      'currentBranch' => $currentBranch,
      'currentItem' => $currentItem,
      'paramsList' => $paramsList,
      'orderProcedure' => $orderProcedure,
      'breadcrumbs' => $breadcrumbs,
      'is_root_slice' => true,
      'is_profil' => $is_profil,
      'sidebar' => $this->sidebar,
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
    $paramsList->subdomen = Yii::$app->params['subdomen_alias'] === '' ? 'moscow' : Yii::$app->params['subdomen_alias'];
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

    $breadcrumbs = Breadcrumbs::getBreadcrumbs($currentSlice, true);

    // echo '<pre>';
    // print_r($breadcrumbs);
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
      'breadcrumbs' => $breadcrumbs,
      'is_root_slice' => false,
      'is_profil' => false,
      'sidebar' => $this->sidebar,
    ));
  }

  public function actionMultiparamsSlice($slice)
  {
    $currentSlice = Slices::find()->where(['alias' => $slice])->one();
    $paramsList = json_decode($currentSlice->params);
    $paramsList->subdomen = Yii::$app->params['subdomen_alias'] === '' ? 'moscow' : Yii::$app->params['subdomen_alias'];
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
    $breadcrumbs = Breadcrumbs::getBreadcrumbs();

    // echo '<pre>';
    // print_r($session->isActive);
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
      'breadcrumbs' => $breadcrumbs,
      'is_root_slice' => false,
      'is_profil' => false,
      'sidebar' => $this->sidebar,
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

    $breadcrumbs = Breadcrumbs::getBreadcrumbs();

    //     echo '<pre>';
    // print_r($currentPage);
    // exit;

    return $this->render('profili', array(
      'currentPage' => $currentPage,
      'currentBranch' => $currentBranch,
      'breadcrumbs' => $breadcrumbs,
      'sidebar' => $this->sidebar,
      'staticBlock_1' => StaticBlock::find()->where(['id' => 9])->one()->content,
      'staticBlock_2' => StaticBlock::find()->where(['id' => 10])->one()->content,
      'staticBlock_3' => StaticBlock::find()->where(['id' => 11])->one()->content,
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

    $breadcrumbs = Breadcrumbs::getBreadcrumbs();

    return $this->render('shina', array(
      'currentPage' => $currentPage,
      'currentBranch' => $currentBranch,
      'breadcrumbs' => $breadcrumbs,
      'sidebar' => $this->sidebar,
      'staticBlock_1' => StaticBlock::find()->where(['id' => 13])->one()->content,
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

    $breadcrumbs = Breadcrumbs::getBreadcrumbs();

    return $this->render('shtampovki', array(
      'currentPage' => $currentPage,
      'currentBranch' => $currentBranch,
      'breadcrumbs' => $breadcrumbs,
      'sidebar' => $this->sidebar,
      'staticBlock_1' => StaticBlock::find()->where(['id' => 14])->one()->content,
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

    $breadcrumbs = Breadcrumbs::getBreadcrumbs();

    return $this->render('profnastil', array(
      'currentPage' => $currentPage,
      'currentBranch' => $currentBranch,
      'breadcrumbs' => $breadcrumbs,
      'sidebar' => $this->sidebar,
      'staticBlock_1' => StaticBlock::find()->where(['id' => 12])->one()->content,
    ));
  }

  public function actionAjaxNoBalanceTable(){
    $paramsList = [];
    $paramsList['type'] = $_POST['table'];
    $paramsList['subdomen'] = Yii::$app->params['subdomen_alias'] === '' ? 'moscow' : Yii::$app->params['subdomen_alias'];
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


