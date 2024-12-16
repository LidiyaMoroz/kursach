<?php

/** @var yii\web\View $this */
/** @var array $data */

$this->title = 'Данные группы';
$this->params['breadcrumbs'][] = ['label' => 'Данные', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if (is_array($data) && count($data)):?>
<div class="tourist-index">
    <table class="table table-hover">
        <thead>
        <?php foreach (array_keys($data) as $item) :?>
            <?php if ($item === 'tourist_id' || $item === 'group_id'): continue; endif?>
            <th scope="col"><?=$item?></th>
        <?php endforeach;?>
        </thead>
        <tbody>
        <?php foreach ($data as $key => $item): ?>
                    <?php if ($key === 'tourist_id' || $key === 'group_id'): continue; endif?>
                    <?php if ($key === 'tourist_name'):?>
                        <td><?=\yii\helpers\Html::a($item, ['tourist/view', 'id' => $data['tourist_id']])?></td>
                    <?php elseif ($key === 'group_name'):?>
                        <td><?=\yii\helpers\Html::a($item, ['group/view', 'id' => $data['group_id']])?></td>
                    <?php else:?>
                        <td><?=$item?></td>
                    <?php endif?>
        <?php endforeach?>
        </tbody>
    </table>
</div>
<?php else:?>
    Нет данных
<?php endif;?>