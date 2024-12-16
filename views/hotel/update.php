<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TouristModel $model */

$this->title = 'Обновить туриста';
$this->params['breadcrumbs'][] = ['label' => 'Турист', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="tourist-update">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
<?php
