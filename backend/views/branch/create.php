<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Branch */

$this->title = 'Добавить филиал';
$this->params['breadcrumbs'][] = ['label' => 'Филиалы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branch-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
