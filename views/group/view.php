<?php

/** @var yii\web\View $this */
/** @var array $data */

$this->title = 'Группа';
$this->params['breadcrumbs'][] = ['label' => 'Группы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if (is_array($data) && count($data)):?>
<div class="tourist-index">
    <table class="table table-hover">
        <thead>
        <?php foreach (array_keys(current($data)) as $item) :?>
            <?php if ($item === 'tourist_id' || $item === 'tour_id'): continue; endif?>
            <th scope="col"><?=$item?></th>
        <?php endforeach;?>
        </thead>
        <tbody>
        <?php foreach ($data as $key => $item): ?>
            <tr>
                <?php foreach ($item as $itemKey => $itemData): ?>
                    <?php if ($itemKey === 'tourist_id' || $itemKey === 'tour_id'): continue; endif?>
                    <?php if ($itemKey === 'tourist_name'):?>
                        <td><?=\yii\helpers\Html::a($itemData, ['tourist/view', 'id' => $item['tourist_id']])?></td>
                    <?php elseif ($itemKey === 'tour_name'):?>
                        <td><?=\yii\helpers\Html::a($itemData, ['tour/view', 'id' => $item['tour_id']])?></td>
                    <?php else:?>
                        <td><?=$itemData?></td>
                    <?php endif?>
                <?php endforeach?>
            </tr>>
        <?php endforeach?>
        </tbody>
    </table>
</div>
<?php else:?>
Нет данных
<?php endif?>
