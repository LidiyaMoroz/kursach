<?php

/** @var yii\web\View $this */
/** @var array $data */

$this->title = 'Данные тура';
$this->params['breadcrumbs'][] = ['label' => 'Туры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if (is_array($data) && count($data)):?>
<div class="tourist-index">
    <table class="table table-hover">
        <thead>
        <?php foreach (array_keys($data) as $item) :?>
            <?php if ($item === 'group_id'): continue; endif?>
            <th scope="col"><?=$item?></th>
        <?php endforeach;?>
        </thead>
        <tbody>
        <?php foreach ($data as $key => $item): ?>
            <?php if ($key === 'group_id'): continue; endif?>
            <?php if ($key === 'group_name'):?>
                <td><?=\yii\helpers\Html::a($item, ['group/view', 'id' => $data['group_id']])?></td>
            <?php else:?>
                <td><?=$item?></td>
            <?php endif?>
        <?php endforeach?>
        </tbody>
    </table>
</div>
<?php else:?>
Данных по туру нет.
<?php endif?>