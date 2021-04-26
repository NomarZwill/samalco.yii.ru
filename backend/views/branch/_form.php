<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Branch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="branch-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textinput(['rows' => 6]) ?>

    <?= $form->field($model, 'alias')->textinput(['rows' => 6]) ?>

    <?= $form->field($model, 'phone')->textinput(['rows' => 6]) ?>

    <?= $form->field($model, 'email')->textinput(['rows' => 6]) ?>

    <?= $form->field($model, 'postalCode')->textinput(['rows' => 6]) ?>

    <?= $form->field($model, 'addressLocality')->textinput(['rows' => 6]) ?>

    <?= $form->field($model, 'streetAddress')->textinput(['rows' => 6]) ?>

    <!-- <?= $form->field($model, 'map')->textarea(['rows' => 3]) ?> -->

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
