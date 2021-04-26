<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PagesSubdomenSeoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pages-subdomen-seo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'subdomen_alias') ?>

    <?= $form->field($model, 'page_id') ?>

    <?= $form->field($model, 'page_type') ?>

    <?= $form->field($model, 'is_slice') ?>

    <?php // echo $form->field($model, 'header') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'keywords') ?>

    <?php // echo $form->field($model, 'text_1') ?>

    <?php // echo $form->field($model, 'text_2') ?>

    <?php // echo $form->field($model, 'text_3') ?>

    <?php // echo $form->field($model, 'text_4') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
