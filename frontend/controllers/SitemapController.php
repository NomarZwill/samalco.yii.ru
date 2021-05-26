<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;
use common\models\Pages;

class SitemapController extends Controller
{

	public function actionIndex()
	{
		Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
		Yii::$app->response->headers->add('Content-Type', 'text/xml');

		$host = $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST'];
    $main_subdomain = Yii::$app->params['subdomen_alias'] == '';

    $documents = Pages::find()->where(['parent_id' => 2])->all();

    // foreach ($documents as $doc){
    //   Pages::find()->where(['parent_id' => $doc->id])->all();
    // }

		$blog = [];

		// echo '<pre>';
		// print_r($documents);
		// exit;

		return $this->renderPartial('sitemap', [
			'host' => $host,
			'main_subdomain' => $main_subdomain,
			// 'blog' => $blog,
			// 'slices' => $slices,
			// 'items' => $items->items,
		]);
	}
}