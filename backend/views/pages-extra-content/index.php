<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PagesExtraContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pages Extra Contents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-extra-content-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pages Extra Content', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'page_id',
            'menu_image:ntext',
            'menu_name:ntext',
            'name_rod:ntext',
            //'common_text_1:ntext',
            //'common_text_2:ntext',
            //'common_text_3:ntext',
            //'common_text_4:ntext',
            //'favorite_alloy:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
