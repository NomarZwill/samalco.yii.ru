<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StaticBlock */

$this->title = 'Создать статический блок';
$this->params['breadcrumbs'][] = ['label' => 'Статические блоки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="static-block-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
