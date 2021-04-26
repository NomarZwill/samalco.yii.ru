<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StaticBlockSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Статические блоки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="static-block-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать статический блок', ['create'], ['class' => 'btn btn-success']) ?>
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
            'name:ntext',
            // 'content:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
