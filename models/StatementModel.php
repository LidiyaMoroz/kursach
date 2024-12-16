<?php

namespace app\models;

class StatementModel extends AbstractModel
{
    public static function tableName()
    {
        return 'statement';
    }
    public function rules()
    {
        return [
            [['id', 'group_id', 'hotel_id', 'price'], 'integer'],
            [['date'], 'date'],
            [['id', 'date', 'group_id', 'hotel_id', 'price'], 'required'],
            [['id'], 'unique']
        ];
    }
    public function addData(StatementModel $model)
    {
        $sql = "
            insert into ".$this->tableName()." (id, date, group_id, hotel_id, price)
            values
                (
                    coalesce((select max(id) from ".$this->tableName()."), 0) + 1,
                    N'".$model->date."',
                    ".$model->group_id.",
                    ".$model->hotel_id.",
                    ".$model->price."
                );
        ";
        return \Yii::$app->db->createCommand($sql)->execute();
    }
    public function updateData($model)
    {
        $sql = "
            update ".$this->tableName()."
            set date = N'".$model->date."',
                group_id = ".$model->group_id.",
                hotel_id = ".$model->hotel_id.",
                price = ".$model->price."
            where id = ". $model->id ."
        ";
        return \Yii::$app->db->createCommand($sql)->execute();
    }
}