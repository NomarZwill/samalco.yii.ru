<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\BadRequestHttpException;
use common\models\Pages;
use common\models\PagesSubdomenSeo;
use common\models\Subdomen;
use common\models\Branch;
use common\models\StaticBlock;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $currentPage = Pages::find()
            ->where(['id' => 1])
            ->with('subdomenSeo')
            ->one();
        $currentSubdomen = Subdomen::find()->where(['alias' => Yii::$app->params['subdomen_alias']])->one();
        $currentBranch = Branch::find()->where(['alias' => Yii::$app->params['subdomen_alias']])->one();

        $katalogList = Pages::find()
        ->where(['parent_id' => 33])
        ->with('extraContent')
        ->all();

        $this->setSeo($currentPage);

        // echo '<pre>';
        // print_r($currentPage['title']);
        // exit;

        return $this->render('index', array(
            'currentPage' => $currentPage,
            'currentSubdomen' => $currentSubdomen,
            'currentBranch' => $currentBranch,
            'katalogList' => $katalogList,
            'aboutUs' => str_replace('**city_dec**', $currentSubdomen->name_dec, StaticBlock::find()->where(['id' => 5])->one()->content),
            'howWeWork' => StaticBlock::find()->where(['id' => 6])->one()->content,
            'callbackBlock' => StaticBlock::find()->where(['id' => 7])->one()->content,
            'calculatorLinks' => StaticBlock::find()->where(['id' => 8])->one()->content,
        ));
    }

    public function actionError()
    {
        $katalogPage = Pages::find()
        ->where(['parent_id' => 33])
        ->with('extraContent')
        ->all();  

        return $this->render('404.php', [
            'katalogPage' => $katalogPage,
        ]);
    }

    public function actionRobots()
    {
        header('Content-type: text/plain');

        if (Yii::$app->params['subdomen_alias']){
            $subdomen_alias = Yii::$app->params['subdomen_alias'] . '.';
        } else {
            $subdomen_alias = '';
        }

        $robotsContent = StaticBlock::find()->where(['id' => 17])->one()->content;

        echo $robotsContent . '
Sitemap: https://' . $subdomen_alias . 'samalco.ru/sitemap.xml';
        exit;
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


