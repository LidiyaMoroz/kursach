<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TouristModel $model */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var array $seoData */
?>

    <div class="boutiques-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'passport')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'gender')->dropDownList(\app\models\TouristModel::$genders) ?>
        <?= $form->field($model, 'age')->textInput(['maxlength' => true, 'type' => 'number']) ?>
        <?= $form->field($model, 'children')->textInput(['maxlength' => true, 'type' => 'number']) ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
<?php
