<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Slices */

$this->title = 'Обновить срез: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Срезы', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="slices-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'is_update' => true
    ]) ?>

</div>
