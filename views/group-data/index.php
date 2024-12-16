<?php

use yii\helpers\Html;
use \yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\GroupModel[] $items */
/** @var app\models\GroupModel $model */

$this->title = 'Данные групп';

?>

<div class="brand-index">
    <div class="brand-menu container mt-5">
        <div class="brand-flex d-flex justify-content-between align-items-center">
            <h1><?= Html::encode($this->title) ?></h1>
            <p class="float-end">
                <?= Html::a('Добавить данные', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

        </div>
    </div>


    <table class="table table-hover">
        <thead>
            <tr>
                <?php foreach (\app\models\GroupDataModel::getColumns() as $column) :?>
                    <th scope="col">
                        <?=$column !== 'price' ? $column
                            : Html::a($column . '<img src="/storage/icons/sorting.svg" alt="sort" />',
                                ['group-data/index', 'sort' => Yii::$app->request->get('sort') === 'asc' ? 'desc' : 'asc'],
                                [
                                    'style' => 'text-decoration:none;color: #000'
                                ]
                            )?>
                    </th>
                <?php endforeach;?>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($items as $item):?>
            <tr>
                <th scope="row"><?=$item['id']?></th>
                <td><?=$item['date_sale']?></td>
                <td><?=$item['tourist_id']?></td>
                <td><?=$item['group_id']?></td>
                <td><?=$item['price']?></td>
                <td>
                    <?=Html::a('<img src="/storage/icons/view.svg" alt="view" />',
                        ['group-data/view', 'id' => $item['id']]
                    )?>
                    <?=Html::a('<img src="/storage/icons/update.svg" alt="update" />',
                        ['group-data/update', 'id' => $item['id']]
                    )?>
                    <?=Html::a('<img src="/storage/icons/delete.svg" alt="delete" />',
                        ['group-data/delete', 'id' => $item['id']]
                    )?>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>

</div>
