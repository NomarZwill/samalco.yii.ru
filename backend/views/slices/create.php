<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Slices */

$this->title = 'Создать срез';
$this->params['breadcrumbs'][] = ['label' => 'Срезы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slices-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'is_update' => false
    ]) ?>

</div>
