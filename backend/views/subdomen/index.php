<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SubdomenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Субдомены';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subdomen-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить субдомен', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'contentOptions' => [
                    'style' => [
                        'width' => '50px',
                        'white-space' => 'normal',
                    ],
                ],
            ],
            'alias:ntext',
            'name:ntext',
            'name_dec:ntext',
            'name_rod:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
