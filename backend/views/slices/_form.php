<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\components\PageUpdateFormLinks;

/* @var $this yii\web\View */
/* @var $model common\models\Slices */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slices-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'alias')->textinput(['rows' => 6]) ?>

    <?= $form->field($model, 'parent_alias')->textinput(['rows' => 6]) ?>

    <?= $form->field($model, 'name')->textinput(['rows' => 6]) ?>

    <?= $form->field($model, 'params')->textinput(['rows' => 6]) ?>

    <?php 
        if ($is_update){
            echo PageUpdateFormLinks::getLinksForSlice($model);
        }
    ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
