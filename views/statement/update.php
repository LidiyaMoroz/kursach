<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TouristModel $model */
/** @var array $groupsDropDown */
/** @var array $hotelsDropDown */

$this->title = 'Обновить отчетность';
$this->params['breadcrumbs'][] = ['label' => 'Отчетность', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="tourist-update">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
            'groupsDropDown' => $groupsDropDown,
            'hotelsDropDown' => $hotelsDropDown
        ]) ?>

    </div>
<?php
