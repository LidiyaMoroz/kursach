<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TourModel $model */
/** @var array $groupsDropDown */
/** @var array $hotelsDropDown */
?>

    <div class="boutiques-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'date')->textInput(['maxlength' => true, 'type' => 'date']) ?>
        <?= $form->field($model, 'group_id')->dropDownList($groupsDropDown) ?>
        <?= $form->field($model, 'hotel_id')->dropDownList($hotelsDropDown) ?>
        <?= $form->field($model, 'price')->textInput(['maxlength' => true, 'type' => 'number']) ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
<?php
