<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TouristModel $model */
/** @var array $toursDropDown */

/** @var array $seoData */
?>

    <div class="boutiques-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'date_departure')->textInput(['maxlength' => true, 'type' => 'date']) ?>
        <?= $form->field($model, 'date_arrival')->textInput(['maxlength' => true, 'type' => 'date']) ?>
        <?= $form->field($model, 'tour_id')->dropDownList($toursDropDown)->label('Tour') ?>
        <?= $form->field($model, 'quantity')->textInput(['maxlength' => true, 'type' => 'number']) ?>


        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
<?php
