<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PagesExtraContent */

$this->title = 'Create Pages Extra Content';
$this->params['breadcrumbs'][] = ['label' => 'Pages Extra Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-extra-content-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
