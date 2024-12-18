<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TouristModel $model */
/** @var array $toursDropDown */

$this->title = 'Добавить отчетность';
$this->params['breadcrumbs'][] = ['label' => 'Отчетность', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tourist-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'toursDropDown' => $toursDropDown
    ]) ?>

</div>
