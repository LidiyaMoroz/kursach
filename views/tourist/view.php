<?php

/** @var yii\web\View $this */
/** @var array $data */

$this->title = 'Турист';
$this->params['breadcrumbs'][] = ['label' => 'Туристы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if (is_array($data) && count($data)):?>
<div class="tourist-index">
    <table class="table table-hover">
        <thead>
        <?php foreach (array_keys(current($data)) as $item) :?>
            <?php
                if ($item !== 'group_id') {
                    echo '<th scope="col">' . $item . '</th>';
                }
            ?>
        <?php endforeach;?>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $item): ?>
            <tr>
                 <?php foreach ($item as $itemKey => $itemData): ?>
                    <?if ($itemKey !== 'group_name'):?>
                        <td><?=$itemData?></td>
                    <?php else:?>
                        <td><?= \yii\helpers\Html::a($itemData, ['group/view', 'id' => $item['group_id']])?></td>
                        <?php break;?>
                    <?php endif?>
                 <?php endforeach?>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>
</div>
<?php else:?>
    <h1>Нет нужных привязок, проверьте Group Data на записи данного юзера!</h1>
<?php endif;?>
