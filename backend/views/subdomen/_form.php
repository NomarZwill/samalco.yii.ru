<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Subdomen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subdomen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'alias')->textinput(['rows' => 6]) ?>

    <?= $form->field($model, 'name')->textinput(['rows' => 6]) ?>

    <?= $form->field($model, 'name_dec')->textinput(['rows' => 6]) ?>

    <?= $form->field($model, 'name_rod')->textinput(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
