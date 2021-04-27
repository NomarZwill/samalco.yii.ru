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

    <?php if ($model->parent_id !== 33 && $model->parent_id !== 40){?>

    <?= $form->field($model, 'header')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'title')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'keywords')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?php }?>

    <?php 
        if ($is_update){
            echo PageUpdateFormLinks::getLinks($model);
        }
    ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
