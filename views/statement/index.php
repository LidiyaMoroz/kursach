<?php

use yii\helpers\Html;
use \yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TouristModel[] $items */
/** @var app\models\TouristModel $model */

$this->title = 'Отчетность';

?>

<div class="brand-index">
    <div class="brand-menu container mt-5">
        <div class="brand-flex d-flex justify-content-between align-items-center">
            <h1><?= Html::encode($this->title) ?></h1>
            <p class="float-end">
                <?= Html::a('Добавить отчетность', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

        </div>
    </div>


    <table class="table table-hover">
        <thead>
            <tr>
                <?php foreach (\app\models\StatementModel::getColumns() as $column) :?>
                    <th scope="col"><?=$column?></th>
                <?php endforeach;?>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($items as $item):?>
            <tr>
                <th scope="row"><?=$item['id']?></th>
                <td><?=$item['date']?></td>
                <td><?=$item['group_id']?></td>
                <td><?=$item['hotel_id']?></td>
                <td><?=$item['price']?></td>
                <td>
                    <?=Html::a('<img src="/storage/icons/view.svg" alt="view" />',
                        ['statement/view', 'id' => $item['id']]
                    )?>
                    <?=Html::a('<img src="/storage/icons/update.svg" alt="update" />',
                        ['statement/update', 'id' => $item['id']]
                    )?>
                    <?=Html::a('<img src="/storage/icons/delete.svg" alt="delete" />',
                        ['statement/delete', 'id' => $item['id']]
                    )?>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>

</div>
