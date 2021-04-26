<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PagesExtraContent */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pages Extra Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pages-extra-content-view">

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
            'page_id',
            'menu_image:ntext',
            'menu_name:ntext',
            'name_rod:ntext',
            'common_text_1:ntext',
            'common_text_2:ntext',
            'common_text_3:ntext',
            'common_text_4:ntext',
            'favorite_alloy:ntext',
        ],
    ]) ?>

</div>
