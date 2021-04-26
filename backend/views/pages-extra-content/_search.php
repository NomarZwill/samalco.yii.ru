<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PagesExtraContentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pages-extra-content-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'page_id') ?>

    <?= $form->field($model, 'menu_image') ?>

    <?= $form->field($model, 'menu_name') ?>

    <?= $form->field($model, 'name_rod') ?>

    <?php // echo $form->field($model, 'common_text_1') ?>

    <?php // echo $form->field($model, 'common_text_2') ?>

    <?php // echo $form->field($model, 'common_text_3') ?>

    <?php // echo $form->field($model, 'common_text_4') ?>

    <?php // echo $form->field($model, 'favorite_alloy') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
