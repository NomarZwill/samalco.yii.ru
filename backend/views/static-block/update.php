<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StaticBlock */

$this->title = 'Обновить статический блок: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Статические блоки', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="static-block-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
