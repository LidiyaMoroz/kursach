<?php

/** @var yii\web\View $this */
/** @var array $data */

$this->title = 'Данные по отелю';
$this->params['breadcrumbs'][] = ['label' => 'Отели', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if (is_array($data)):?>
    <div class="tourist-index">
        <table class="table table-hover">
            <thead>
            <?php foreach (array_keys(current($data)) as $item) :?>
                <?php if ($item === 'group_id' || $item === 'hotel_id'): continue; endif?>
                <th scope="col"><?=$item?></th>
            <?php endforeach;?>
            </thead>
            <tbody>
            <?php foreach ($data as $key => $item): ?>
                <tr>
                    <?php foreach ($item as $itemKey => $itemdata): ?>
                        <?php if ($itemKey === 'group_id' || $itemKey === 'hotel_id'): continue; endif?>
                        <?php if ($itemKey === 'group_name'):?>
                            <td><?=\yii\helpers\Html::a($itemdata, ['group/view', 'id' => $item['group_id']])?></td>
                        <?php elseif ($itemKey === 'hotel_name'):?>
                            <td><?=\yii\helpers\Html::a($itemdata, ['hotel/view', 'id' => $item['hotel_id']])?></td>
                        <?php else:?>
                            <td><?=$itemdata?></td>
                        <?php endif?>
                    <?php endforeach?>
                </tr>
            <?php endforeach?>
            </tbody>
        </table>
    </div>
<?php else:?>
    Данных нет.
<?php endif?>