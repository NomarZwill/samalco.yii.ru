<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\BadRequestHttpException;
use common\models\PagesSubdomenSeo;
use common\models\Subdomen;
use common\models\Branch;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $currentPage = PagesSubdomenSeo::find()->where(['page_type' => 'index'])->andWhere(['subdomen_alias' => Yii::$app->params['subdomen_alias']])->one();
        $currentSubdomen = Subdomen::find()->where(['alias' => Yii::$app->params['subdomen_alias']])->one();
        $currentBranch = Branch::find()->where(['alias' => Yii::$app->params['subdomen_alias']])->one();

        // echo '<pre>';
        // print_r($currentPage);
        // exit;

        return $this->render('index', array(
            'currentPage' => $currentPage,
            'currentSubdomen' => $currentSubdomen,
            'currentBranch' => $currentBranch,
        ));
    }
    
}


