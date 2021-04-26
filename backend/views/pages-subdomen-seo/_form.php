<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PagesSubdomenSeo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pages-subdomen-seo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'subdomen_alias')->textInput(['rows' => 6, 'disabled' => 'disabled']) ?>

    <?= $form->field($model, 'page_id')->textInput(['disabled' => 'disabled']) ?>

    <?= $form->field($model, 'page_type')->textInput(['rows' => 6, 'disabled' => 'disabled']) ?>

    <?= $form->field($model, 'is_slice')->textInput(['disabled' => 'disabled']) ?>

    <?= $form->field($model, 'header')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'title')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'keywords')->textInput(['rows' => 3]) ?>

    <?= $form->field($model, 'text_1')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'text_2')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'text_3')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'text_4')->textarea(['rows' => 3]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
