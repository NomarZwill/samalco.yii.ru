<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PagesSubdomenSeo */

$this->title = 'Создать SEO для субдомена';
$this->params['breadcrumbs'][] = ['label' => 'SEO для субдомена', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-subdomen-seo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
