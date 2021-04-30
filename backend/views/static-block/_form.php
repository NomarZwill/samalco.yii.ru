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

    <?php 
        if (isset($_GET['page_id']) && isset($_GET['page_name'])){
            echo '<div class="form-group">';
            echo '<a href="/pages/update/?id=' . $_GET['page_id'] . '">Вернуться к редактированию страницы: ' . $_GET['page_name'] . '</a>';
            echo '</div>';
        }
    ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
