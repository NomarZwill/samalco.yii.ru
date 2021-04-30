<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PagesExtraContent */

$this->title = 'Обновить дополнительный контент: ' . $_GET['page_name'];
$this->params['breadcrumbs'][] = ['label' => $_GET['page_name'], 'url' => ['/pages/update/?id=' . $_GET['page_id']]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="pages-extra-content-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
