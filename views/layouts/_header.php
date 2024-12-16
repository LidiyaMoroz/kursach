<?php

use yii\bootstrap5\NavBar;
use \yii\bootstrap5\Nav;

NavBar::begin([
    'brandLabel' => 'Lidia project',
    'brandUrl' => Yii::$app->homeUrl,
]);
echo Nav::widget([
    'items' => [
        ['label' => 'Tourist', 'url' => ['tourist/index']],
        ['label' => 'Group', 'url' => ['group/index']],
        ['label' => 'Group data', 'url' => ['groupdata/index']],
        ['label' => 'Hotel', 'url' => ['hotel/index']],
        ['label' => 'Statement', 'url' => ['statement/index']],
    ],
    'options' => ['class' => 'navbar-nav'],
]);
NavBar::end();