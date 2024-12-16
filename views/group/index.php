<?php

use yii\helpers\Html;
use \yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\GroupModel[] $items */
/** @var app\models\GroupModel $model */

$this->title = 'Группы';

?>

<div class="brand-index">
    <div class="brand-menu container mt-5">
        <div class="brand-flex d-flex justify-content-between align-items-center">
                <h1><?= Html::encode($this->title) ?></h1>
                <?php $form = ActiveForm::begin([
                    'action' => 'search',
                    'options' => [
                        'class' => 'd-flex justify-content-between align-items-center',
                    ]
                ])?>
                <div class="input-group">
                    <input type="search" class="form-control" name="search" placeholder="Поиск" aria-label="Поиск">
                    <button class="btn btn-primary" type="submit">Найти</button>
                </div>
                <?php ActiveForm::end()?>
            <p class="float-end">
                <?= Html::a('Добавить группу', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

        </div>
    </div>


    <table class="table table-hover">
        <thead>
            <tr>
                <?php foreach (\app\models\GroupModel::getColumns() as $column) :?>
                    <th scope="col">
                        <?=$column !== 'quantity' ? $column
                            : Html::a($column . '<img src="/storage/icons/sorting.svg" alt="sort" />',
                                ['group/index', 'sort' => Yii::$app->request->get('sort') === 'asc' ? 'desc' : 'asc'],
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
                <td><?=$item['name']?></td>
                <td><?=$item['date_departure']?></td>
                <td><?=$item['date_arrival']?></td>
                <td><?=$item['tour_id']?></td>
                <td><?=$item['quantity']?></td>
                <td>
                    <?=Html::a('<img src="/storage/icons/view.svg" alt="view" />',
                        ['group/view', 'id' => $item['id']]
                    )?>
                    <?=Html::a('<img src="/storage/icons/update.svg" alt="update" />',
                        ['group/update', 'id' => $item['id']]
                    )?>
                    <?=Html::a('<img src="/storage/icons/delete.svg" alt="delete" />',
                        ['group/delete', 'id' => $item['id']]
                    )?>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>

</div>
