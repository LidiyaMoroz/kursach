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
    public function getColumns() : array
    {
        return [
            'ID',
            'Name',
            'Passport',
            'Gender',
            'Age',
            'Children'
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

    }
}