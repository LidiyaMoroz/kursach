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
    public static function getDataViewById($id)
    {
        $sql = "
            select 
                g.name as group_name, g.date_departure as group_departure, g.date_arrival as group_arrival,
                t.name as tourist_name, t.id as tourist_id,
                tr.id as tour_id, tr.name as tour_name
            from [group] as g
            join group_data as gd on g.id = gd.group_id
            join tour as tr on g.tour_id = tr.id
            join tourist as t on gd.tourist_id = t.id                      
            where g.id = ". $id ."
        ";
        $query = \Yii::$app->db->createCommand($sql);
        return $query->queryAll();
    }
}