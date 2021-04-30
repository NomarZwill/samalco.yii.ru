<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PagesExtraContent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pages-extra-content-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'page_id')->textInput() ?>

    <?= $form->field($model, 'menu_image')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'menu_name')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'favorite_alloy')->textInput(['rows' => 2]) ?>

    <?= $form->field($model, 'sidebar_image')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'sidebar_name')->textInput(['rows' => 6]) ?>

    <?php 
        echo '<div class="form-group">';
            echo '<a href="/pages/update/?id=' . $_GET['page_id'] . '">Вернуться обратно</a>';
        echo '</div>';
    ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
