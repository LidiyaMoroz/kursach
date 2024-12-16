<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TouristModel $model */

$this->title = 'Добавить отель';
$this->params['breadcrumbs'][] = ['label' => 'Отель', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tourist-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
