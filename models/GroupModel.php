<?php

namespace app\models;

class GroupModel extends AbstractModel
{
    public static function tableName()
    {
        return '[group]';
    }
    public function rules()
    {
        return [
            [['id', 'tour_id', 'quantity'], 'integer'],
            [['name'], 'string'],
            [['id', 'name', 'date_departure', 'date_arrival', 'tour_id', 'quantity'], 'required'],
            [['date_departure', 'date_arrival'], 'date'],
            [['id'], 'unique']
        ];
    }
    public static function getColumns()
    {
        return [
            'ID',
            'name',
            'date_departure',
            'date_arrival',
            'tour_id',
            'quantity'
        ];
    }
    public function addData(GroupModel $model)
    {
        $sql = "
            insert into ".$this->tableName()." (id, name, date_departure, date_arrival, tour_id, quantity)
            values
                (
                    coalesce((select max(id) from ".$this->tableName()."), 0) + 1,
                    N'".$model->name."',
                    N'".$model->date_departure."',
                    N'".$model->date_arrival."',
                    ".$model->tour_id.",
                    ".$model->quantity."
                );
        ";
        return \Yii::$app->db->createCommand($sql)->execute();
    }
    public function updateData($model)
    {
        $sql = "
            update ".$this->tableName()."
            set name = N'".$model->name."',
                date_departure = N'".$model->date_departure."',
                date_arrival = N'".$model->date_arrival."',
                tour_id =".$model->tour_id.",
                quantity = ".$model->quantity."
            where id = ". $model->id ."
        ";
        return \Yii::$app->db->createCommand($sql)->execute();
    }
}