<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PagesSubdomenSeoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'SEO для субдомена';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-subdomen-seo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pages Subdomen Seo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'subdomen_alias:ntext',
            'page_id',
            'page_type:ntext',
            'is_slice',
            //'header:ntext',
            //'title:ntext',
            //'description:ntext',
            //'keywords:ntext',
            //'text_1:ntext',
            //'text_2:ntext',
            //'text_3:ntext',
            //'text_4:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
