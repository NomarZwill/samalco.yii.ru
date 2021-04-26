<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StaticBlock */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="static-block-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textinput(['rows' => 6]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
