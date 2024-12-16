<?php

namespace app\models;

use yii\data\SqlDataProvider;

class TouristModel extends \yii\db\ActiveRecord
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
    public function getData()
    {
        $sql = 'SELECT * FROM '. $this->tableName();
        $query = \Yii::$app->db->createCommand($sql);
        return $query->queryAll();
    }
    public function addData(TouristModel $model)
    {
        $sql = "
            insert into tourist (id, name, passport, gender, age, children)
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
    public function searchData($query)
    {
        $sql = "
            SELECT * FROM ".$this->tableName()."
            WHERE name LIKE N'%".$query."%'
        ";
        $query = \Yii::$app->db->createCommand($sql);
        return $query->queryAll();
    }
    public static function getDataById($id)
    {
        $sql = '
            SELECT * FROM '.self::tableName().'
        ';
        if (is_array($id)) {
            $sql .= ' WHERE id IN ('. implode(',', $id) .')';
        }
        else {
            $sql .= ' WHERE id = ' . $id;
        }
        $query = \Yii::$app->db->createCommand($sql);
        return $query->queryAll();
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
    public static function deleteById($id)
    {
        $sql = "
            delete from ". self::tableName() ."
            where id = ".$id."
        ";
        return \Yii::$app->db->createCommand($sql)->execute();
    }
    public static function getDataViewById($id)
    {
        
    }
}