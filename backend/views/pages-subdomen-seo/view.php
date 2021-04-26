<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PagesSubdomenSeo */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Pages Subdomen Seos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pages-subdomen-seo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'subdomen_alias:ntext',
            'page_id',
            'page_type:ntext',
            'is_slice',
            'header:ntext',
            'title:ntext',
            'description:ntext',
            'keywords:ntext',
            'text_1:ntext',
            'text_2:ntext',
            'text_3:ntext',
            'text_4:ntext',
        ],
    ]) ?>

</div>
