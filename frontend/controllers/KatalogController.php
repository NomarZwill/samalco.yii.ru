<?php
namespace frontend\controllers;

use Yii;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;
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
    $currentPage = Pages::find()
      ->where(['id' => 33])
      ->with('subdomenSeo')
      ->one();

    $katalogPage = Pages::find()
      ->where(['parent_id' => 33])
      ->with('subdomenSeo')
      ->with('extraContent')
      ->all();

    $breadcrumbs = Breadcrumbs::getBreadcrumbs();
    $this->setSeo($currentPage);

    // echo '<pre>';
    // print_r($katalogPage);
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

    $this->sidebar = $this->renderPartial('/components/sidebar', array(
      'items' => Pages::find()->where(['in_sidebar' => true])->with('extraContent')->orderBy(['sidebar_sort' => SORT_ASC])->all(),
      'table' => $paramsList->type,
      'mobile' => '',
    ));

    $currentPage = Pages::find()
      ->where(['alias' => $slice])
      // ->with('subdomenSeo')
      ->with('extraContent')
      ->one();
    
    $currentBranch = Branch::find()
      ->where(['alias' => Yii::$app->params['subdomen_alias']])
      ->one();

    $currentItem = Items::find()->where(['type' => $paramsList->type])->one();

    $orderProcedure = $this->getOrderProcedure($currentPage);

    $breadcrumbs = Breadcrumbs::getBreadcrumbs();

    $this->setSeo($this->replacePatterns($currentPage));

    // echo '<pre>';
    // print_r($tableData);
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

    $this->setSeo($this->replacePatternsForSlices($currentSlice));

    // echo '<pre>';
    // print_r($currentSlice);
    // exit;

    return $this->render('slice', array(
      'tableData' => $tableData,
      'noBalanceTableData' => $noBalanceTableData,
      'subSliceList' => $subSliceList,
      'currentSlice' => $currentSlice,
      // 'currentPage' => $currentSlice,
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
    $currentSlice = Slices::find()
      ->where(['alias' => $slice])
      ->with('subdomenSeo')
      ->one();  

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

    unset($_GET['q']);
    unset($_GET['slice']);
    if (!AllParams::paramsValueIsExistCheck($subSliceList, $_GET)){
			throw new NotFoundHttpException();
    }

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


    if (count((array)$paramsList) === 4){
      $this->setSeo($this->replacePatternsForSlicesTwoParams($currentSlice, $paramsList), false);
      $currentPage->header = '';
    } else {
      $this->setSeo($this->replacePatterns($currentPage), true);
    }

    // echo '<pre>';
    // print_r($currentPage);
    // exit;

    $currentSlice['subdomenSeo']['text_1'] = '';
    $currentSlice['subdomenSeo']['text_2'] = '';
    $currentSlice['subdomenSeo']['text_3'] = '';
    $currentSlice['subdomenSeo']['text_4'] = '';

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
    
    $orderProcedure = $this->getOrderProcedure($currentPage);

    $this->setSeo($this->replacePatterns($currentPage));

    //     echo '<pre>';
    // print_r($currentPage);
    // exit;

    return $this->render('profili', array(
      'currentPage' => $currentPage,
      'currentBranch' => $currentBranch,
      'breadcrumbs' => $breadcrumbs,
      'sidebar' => $this->sidebar,
      'orderProcedure' => $orderProcedure,
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

    $orderProcedure = $this->getOrderProcedure($currentPage);

    $this->setSeo($this->replacePatterns($currentPage));

    return $this->render('shina', array(
      'currentPage' => $currentPage,
      'currentBranch' => $currentBranch,
      'breadcrumbs' => $breadcrumbs,
      'sidebar' => $this->sidebar,
      'orderProcedure' => $orderProcedure,
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

    $orderProcedure = $this->getOrderProcedure($currentPage);

    $this->setSeo($this->replacePatterns($currentPage));

    return $this->render('shtampovki', array(
      'currentPage' => $currentPage,
      'currentBranch' => $currentBranch,
      'breadcrumbs' => $breadcrumbs,
      'sidebar' => $this->sidebar,
      'orderProcedure' => $orderProcedure,
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

    $orderProcedure = $this->getOrderProcedure($currentPage);

    $this->setSeo($this->replacePatterns($currentPage));

    return $this->render('profnastil', array(
      'currentPage' => $currentPage,
      'currentBranch' => $currentBranch,
      'breadcrumbs' => $breadcrumbs,
      'sidebar' => $this->sidebar,
      'orderProcedure' => $orderProcedure,
      'staticBlock_1' => StaticBlock::find()->where(['id' => 12])->one()->content,
    ));
  }

  public function actionAjaxNoBalanceTable()
  {
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

  private function getOrderProcedure($currentPage)
  {
    $orderProcedure = StaticBlock::find()->where(['id' => 1])->one();
    $orderProcedure = str_replace('**subdomen_dec**', Yii::$app->params['subdomen_dec'], $orderProcedure->content);
    $orderProcedure = str_replace('**name_rod**', $currentPage['extraContent']['name_rod'], $orderProcedure);  

    return $orderProcedure;
  }

  private function replacePatterns(&$currentPage)
  {
    foreach($currentPage as $key => $param){
      if ($key === 'title'){
        $param = str_replace('**singular_name**', $currentPage['extraContent']['name_singular'], $param);
        $param = str_replace('**plural_name**', $currentPage['extraContent']['name_plural'], $param);
        $param = str_replace('**subdomen_name_dec**', Yii::$app->params['subdomen_dec'], $param);
        $currentPage[$key] = mb_strtoupper(mb_substr($param, 0, 1)) . mb_substr($param, 1);
      }

      if ($key === 'description'){
        $param = str_replace(
          '**singular_name**', 
          mb_strtoupper(mb_substr($currentPage['extraContent']['name_singular'], 0, 1)) . mb_substr($currentPage['extraContent']['name_singular'], 1), 
          $param
        );
        $param = str_replace('**plural_name**', $currentPage['extraContent']['name_plural'], $param);
        $param = str_replace('**subdomen_name_dec**', Yii::$app->params['subdomen_dec'], $param);
        $currentPage[$key] = mb_strtoupper(mb_substr($param, 0, 1)) . mb_substr($param, 1);
      }

      if ($key === 'keywords'){
        $param = str_replace('**singular_name**', $currentPage['extraContent']['name_singular'], $param);
        $param = str_replace('**plural_name**', str_replace('-', ' ', $currentPage['extraContent']['name_plural']), $param);
        $param = str_replace('**subdomen_name**', Yii::$app->params['subdomen_name'], $param);
        $currentPage[$key] = mb_strtolower($param);
      }

      if ($key === 'header'){
        $param = str_replace('**singular_name**', $currentPage['extraContent']['name_singular'], $param);
        $param = str_replace('**subdomen_name_dec**', Yii::$app->params['subdomen_dec'], $param);
        $currentPage[$key] = mb_strtoupper(mb_substr($param, 0, 1)) . mb_substr($param, 1);
      }
    }

    return $currentPage;
  }

  private function replacePatternsForSlices(&$currentSlice)
  {
    $parent = Pages::find()
      ->where(['alias' => $currentSlice->parent_alias])
      ->with('extraContent')
      ->one();

    $paramNameList = [
      'alloy' => 'сплав',
      'depth' => 'толщина',
      'width' => 'ширина',
      'curing' => 'термообработка',
      'height' => 'высота',
      'diameter' => 'диаметр',
      'section' => 'сечение',
    ];

    $currentSliceParams = (array)json_decode($currentSlice->params);
    $currentParamKey = array_key_last($currentSliceParams);
    $currentParamValue = end($currentSliceParams);

    if ($currentSliceParams['type'] === 'tubes'){
      $paramNameList['width'] = 'толщина стенки';
    }

    
    foreach($currentSlice as $key => $param){

      $currentParamValue = end($currentSliceParams);
      
      if ($key === 'title'){
        $param = str_replace('**singular_name**', $parent['extraContent']['name_singular'], $param);
        $param = str_replace('**plural_name**', $parent['extraContent']['name_plural'], $param);
        $param = str_replace('**subdomen_name_dec**', Yii::$app->params['subdomen_dec'], $param);
        $currentSlice[$key] = mb_strtoupper(mb_substr($param, 0, 1)) . mb_substr($param, 1);
      }

      if ($key === 'description'){
        $param = str_replace(
          '**singular_name**', 
          mb_strtoupper(mb_substr($parent['extraContent']['name_singular'], 0, 1)) . mb_substr($parent['extraContent']['name_singular'], 1), 
          $param
        );
        $param = str_replace('**plural_name**', $parent['extraContent']['name_plural'], $param);
        $param = str_replace('**subdomen_name_dec**', Yii::$app->params['subdomen_dec'], $param);
        $currentSlice[$key] = mb_strtoupper(mb_substr($param, 0, 1)) . mb_substr($param, 1);
      }

      if ($key === 'keywords'){
        $param = str_replace('**singular_name**', $parent['extraContent']['name_singular'], $param);
        $param = str_replace('**plural_name**', str_replace('-', ' ', $parent['extraContent']['name_plural']), $param);
        $param = str_replace('**subdomen_name**', Yii::$app->params['subdomen_name'], $param);
        $currentSlice[$key] = mb_strtolower($param);

        $currentParamValue = mb_strtolower($currentParamValue);
      }

      if ($key === 'header'){
        $param = str_replace('**singular_name**', $parent['extraContent']['name_singular'], $param);
        $param = str_replace('**subdomen_name_dec**', Yii::$app->params['subdomen_dec'], $param);
        $currentSlice[$key] = mb_strtoupper(mb_substr($param, 0, 1)) . mb_substr($param, 1);
      }

      if ($currentParamKey !== 'section'){
        $currentSlice[$key] = str_replace('**param_name**', $paramNameList[$currentParamKey], $currentSlice[$key]);
      } else {
        $currentSlice[$key] = str_replace('**param_name**', '', $currentSlice[$key]);
      }

      if ($currentParamKey == 'depth' || $currentParamKey == 'width' || $currentParamKey == 'diameter' || $currentParamKey == 'height'){
        $currentSlice[$key] = str_replace('**param_value**', $currentParamValue . ' мм', $currentSlice[$key]);
      } else {
        $currentSlice[$key] = str_replace('**param_value**', $currentParamValue, $currentSlice[$key]);
      }
    }

    return $currentSlice;
  }

  private function replacePatternsForSlicesTwoParams(&$currentSlice, $paramsList)
  {
    $parent = Pages::find()
      ->where(['alias' => $currentSlice->alias])
      ->with('extraContent')
      ->one();

    $paramNameList = [
      'alloy' => 'сплав',
      'depth' => 'толщина',
      'width' => 'ширина',
      'curing' => 'термообработка',
      'height' => 'высота',
      'diameter' => 'диаметр',
      'section' => 'сечение',
    ];

    $paramsList = (array)$paramsList;

    if ($paramsList['type'] === 'tubes'){
      $paramNameList['width'] = 'толщина стенки';
    }

    unset($paramsList['type']);
    unset($paramsList['subdomen']);

    foreach($currentSlice as $key => $param){

      if ($key === 'title'){
        $param = str_replace('**singular_name**', $parent['extraContent']['name_singular'], $param);
        $param = str_replace('**plural_name**', $parent['extraContent']['name_plural'], $param);
        $param = str_replace('**subdomen_name_dec**', Yii::$app->params['subdomen_dec'], $param);
        $currentSlice[$key] = mb_strtoupper(mb_substr($param, 0, 1)) . mb_substr($param, 1);
      }

      if ($key === 'description'){
        $param = str_replace(
          '**singular_name**', 
          mb_strtoupper(mb_substr($parent['extraContent']['name_singular'], 0, 1)) . mb_substr($parent['extraContent']['name_singular'], 1), 
          $param
        );
        $param = str_replace('**plural_name**', $parent['extraContent']['name_plural'], $param);
        $param = str_replace('**subdomen_name_dec**', Yii::$app->params['subdomen_dec'], $param);
        $currentSlice[$key] = mb_strtoupper(mb_substr($param, 0, 1)) . mb_substr($param, 1);
      }

      if ($key === 'keywords'){
        $param = str_replace('**singular_name**', $parent['extraContent']['name_singular'], $param);
        $param = str_replace('**plural_name**', str_replace('-', ' ', $parent['extraContent']['name_plural']), $param);
        $param = str_replace('**subdomen_name**', Yii::$app->params['subdomen_name'], $param);
        $currentSlice[$key] = mb_strtolower($param);
      }

      if ($key === 'header'){
        $param = str_replace('**singular_name**', $parent['extraContent']['name_singular'], $param);
        $param = str_replace('**subdomen_name_dec**', Yii::$app->params['subdomen_dec'], $param);
        $currentSlice[$key] = mb_strtoupper(mb_substr($param, 0, 1)) . mb_substr($param, 1);
      }

      if (array_key_first($paramsList) !== 'section'){
        $currentSlice[$key] = str_replace('**param_name**', $paramNameList[array_key_first($paramsList)], $currentSlice[$key]);
      } else {
        $currentSlice[$key] = str_replace('**param_name**', '', $currentSlice[$key]);
      }

      if (array_key_last($paramsList) !== 'section'){
        $currentSlice[$key] = str_replace('**second_param_name**', $paramNameList[array_key_last($paramsList)], $currentSlice[$key]);
      } else {
        $currentSlice[$key] = str_replace('**second_param_name**', '', $currentSlice[$key]);
      }

      if ( array_key_first($paramsList) == 'depth' 
        || array_key_first($paramsList) == 'width' 
        || array_key_first($paramsList) == 'diameter' 
        || array_key_first($paramsList) == 'height'
          ){
        $currentSlice[$key] = str_replace('**param_value**', $paramsList[array_key_first($paramsList)] . ' мм', $currentSlice[$key]);
      } else {
        $currentSlice[$key] = str_replace('**param_value**', $paramsList[array_key_first($paramsList)], $currentSlice[$key]);
      }

      if ( array_key_last($paramsList) == 'depth' 
        || array_key_last($paramsList) == 'width' 
        || array_key_last($paramsList) == 'diameter' 
        || array_key_last($paramsList) == 'height'
          ){
        $currentSlice[$key] = str_replace('**second_param_value**', $paramsList[array_key_last($paramsList)] . ' мм', $currentSlice[$key]);
      } else {
        $currentSlice[$key] = str_replace('**second_param_value**', $paramsList[array_key_last($paramsList)], $currentSlice[$key]);
      }

      if ($key === 'keywords'){
        $currentSlice[$key] = mb_strtolower($currentSlice[$key]);
      }

    }

    return $currentSlice;
  }


  private function setSeo($seo, $noIndex = false)
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

    if (isset($seo['subdomenSeo']['keywords']) && $seo['subdomenSeo']['keywords'] !== ''){
        $this->view->params['kw'] = $seo['subdomenSeo']['keywords'];
    } elseif(isset($seo['title'])){
        $this->view->params['kw'] = $seo['keywords'];
    } else {
        $this->view->params['kw'] = false;
    }

    if ($noIndex){
      $this->view->params['robots'] = true;
    }

  }
}
