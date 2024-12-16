<?php

namespace app\models;

class TouristModel extends AbstractModel
{
    public static $genders = [
        'М',
        'Ж'
    ];
    public static function tableName() : string
    {
        return 'tourist';
    }
    public function rules() : array
    {
        return [
            [['id', 'age', 'children'], 'integer'],
            [['name', 'passport', 'gender'], 'string'],
            [['id', 'name', 'passport', 'gender', 'age', 'children'], 'required'],
            [['id'], 'unique']
        ];
    }
    public function addData(TouristModel $model)
    {
        $sql = "
            insert into ".$this->tableName()." (id, name, passport, gender, age, children)
            values
                (
                    coalesce((select max(id) from ".$this->tableName()."), 0) + 1,
                    N'".$model->name."',
                    N'".$model->passport."',
                    N'".self::$genders[$model->gender]."',
                    ".$model->age.",
                    ".$model->children."
                );
        ";
        return \Yii::$app->db->createCommand($sql)->execute();
    }
    public function updateData($model)
    {
        $sql = "
            update ".$this->tableName()."
            set name = N'".$model->name."',
                passport = N'".$model->passport."',
                gender = N'".self::$genders[$model->gender]."',
                age = ".$model->age.",
                children = ".$model->children."
            where id = ". $model->id ."
        ";
        return \Yii::$app->db->createCommand($sql)->execute();
    }
    public static function getDataViewById($id)
    {
        $sql = "
            select 
                t.name, t.passport, t.gender, t.age, t.children,
                g.name as group_name, g.id as group_id
            from tourist as t
            JOIN group_data as gd on t.id = gd.tourist_id
            JOIN [group] as g on gd.group_id = g.id
            where t.id = ". $id;
        $query = \Yii::$app->db->createCommand($sql);
        return $query->queryAll();
    }
}