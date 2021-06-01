<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\components\PageUpdateFormLinks;

/* @var $this yii\web\View */
/* @var $model common\models\Pages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pages-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent_id')->textInput() ?>

    <?= $form->field($model, 'type')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'name')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'alias')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'breadcrumbs_title')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'header')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'title')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'keywords')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?php 
        if ($is_update){
            echo PageUpdateFormLinks::getLinks($model);
        }

        if ($model->id === 1){
            echo PageUpdateFormLinks::getLinksForIndexPage($model);
        }

        if ($model->id === 40){
            echo PageUpdateFormLinks::getLinksForProfiliPage($model);
        }

        if ($model->id === 41){
            echo PageUpdateFormLinks::getLinksForProfnastilPage($model);
        }

        if ($model->id === 42){
            echo PageUpdateFormLinks::getLinksForShinaPage($model);
        }

        if ($model->id === 39){
            echo PageUpdateFormLinks::getLinksForShtampovkiPage($model);
        }

        if ($model->id === 50){
            echo PageUpdateFormLinks::getLinksForContactsPage($model);
        }

    ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
