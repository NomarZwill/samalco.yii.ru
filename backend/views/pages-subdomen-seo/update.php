<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PagesSubdomenSeo */

$this->title = 'Обновить SEO для субдомена: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'SEO для субдомена', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="pages-subdomen-seo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
