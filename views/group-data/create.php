<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TouristModel $model */
/** @var array $touristsDropDown */
/** @var array $groupsDropDown */

$this->title = 'Добавить данные';
$this->params['breadcrumbs'][] = ['label' => 'Данные групп', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tourist-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'touristsDropDown' => $touristsDropDown,
        'groupsDropDown' => $groupsDropDown,
    ]) ?>

</div>
