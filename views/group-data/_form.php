<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TouristModel $model */
/** @var array $touristsDropDown */
/** @var array $groupsDropDown */

/** @var array $seoData */
?>

    <div class="boutiques-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'date_sale')->textInput(['maxlength' => true, 'type' => 'date']) ?>
        <?= $form->field($model, 'tourist_id')->dropDownList($touristsDropDown)->label('Tourist') ?>
        <?= $form->field($model, 'group_id')->dropDownList($groupsDropDown)->label('Group') ?>
        <?= $form->field($model, 'price')->textInput(['maxlength' => true, 'type' => 'number']) ?>


        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
<?php
