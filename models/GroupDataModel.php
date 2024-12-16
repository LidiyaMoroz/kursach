<?php

namespace app\models;

class GroupDataModel extends AbstractModel
{
    public static function tableName()
    {
        return 'group_data';
    }
    public function rules()
    {
        return [
            [['id', 'tourist_id', 'group_id', 'price'], 'integer'],
            [['id', 'tourist_id', 'group_id', 'price', 'date_sale'], 'required'],
            [['date_sale'], 'date'],
            [['id'], 'unique']
        ];
    }
    public function addData(GroupDataModel $model)
    {
        $sql = "
            insert into ".$this->tableName()." (id, date_sale, tourist_id, group_id, price)
            values
                (
                    coalesce((select max(id) from ".$this->tableName()."), 0) + 1,
                    N'".$model->date_sale."',
                    ".$model->tourist_id.",
                    ".$model->group_id.",
                    ".$model->price."
                );
        ";
        return \Yii::$app->db->createCommand($sql)->execute();
    }
    public function updateData($model)
    {
        $sql = "
            update ".$this->tableName()."
            set  date_sale = N'".$model->date_sale."',
                 tourist_id = ".$model->tourist_id.",
                 group_id = ".$model->group_id.",
                 price = ".$model->price."
            where id = ". $model->id ."
        ";
        return \Yii::$app->db->createCommand($sql)->execute();
    }
    public static function getDataViewById($id)
    {
        $sql = "
            select 
                gd.date_sale, t.name as tourist_name, t.id as tourist_id,
                g.name as group_name, g.id as group_id, gd.price
            from group_data as gd
            join tourist as t on gd.tourist_id = t.id
            join [group] as g on gd.group_id = g.id
            where gd.id = ".$id;
        $query = \Yii::$app->db->createCommand($sql);
        return $query->queryOne();
    }
}