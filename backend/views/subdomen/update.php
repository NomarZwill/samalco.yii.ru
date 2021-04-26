<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Subdomen */

$this->title = 'Обновить субдомен: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Субдомены', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="subdomen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
