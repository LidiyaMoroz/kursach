<?php

namespace app\models;

class TourModel extends AbstractModel
{
    public static function tableName()
    {
        return 'tour';
    }
    public function rules()
    {
        return [
            [['id', 'price'], 'integer'],
            [['name', 'country', 'city', 'movement', 'food', 'price', 'accommodation'], 'string'],
            [['id', 'name', 'country', 'city', 'movement', 'food', 'price', 'accommodation', 'price'], 'required'],
            [['id'], 'unique']
        ];
    }
    public function addData(TourModel $model)
    {
        $sql = "
            insert into ".$this->tableName()." (id, name, country, city, movement, food, price, accommodation)
            values
                (
                    coalesce((select max(id) from ".$this->tableName()."), 0) + 1,
                    N'".$model->name."',
                    N'".$model->country."',
                    N'".$model->city."',
                    N'".$model->movement."',
                    N'".$model->food."',
                    ".$model->price.",
                    N'".$model->accommodation."'
                );
        ";
        return \Yii::$app->db->createCommand($sql)->execute();
    }
    public function updateData($model)
    {
        $sql = "
            update ".$this->tableName()."
            set name = N'".$model->name."',
                country = N'".$model->country."',
                city = N'".$model->city."',
                movement = N'".$model->movement."',
                food = N'".$model->food."',
                price = ".$model->price.",
                accommodation = N'".$model->accommodation."'
            where id = ". $model->id ."
        ";
        return \Yii::$app->db->createCommand($sql)->execute();
    }
    public static function getDataViewById($id)
    {
        $sql = "
            select 
                t.name, t.country, t.city, t.movement, t.food, t.price, t.accommodation,
                g.name as group_name, g.quantity as group_quantity, g.id as group_id
            from tour as t
            join [group] as g on t.id = g.tour_id
            where t.id = " . $id;
        $query = \Yii::$app->db->createCommand($sql);
        return $query->queryOne();
    }
}