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
    public static function getDataViewById($id)
    {
        $sql = "
            select
                s.date, g.id as group_id, g.name as group_name,
                h.id as hotel_id, h.name as hotel_name, s.price
            from statement as s
            join [group] as g on s.group_id = g.id
            join hotel as h on s.hotel_id = h.id
            where s.id = " . $id;
        $query = \Yii::$app->db->createCommand($sql);
        return $query->queryall();
    }
}