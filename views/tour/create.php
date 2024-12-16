<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TourModel $model */

$this->title = 'Добавить тур';
$this->params['breadcrumbs'][] = ['label' => 'Тур', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tourist-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
