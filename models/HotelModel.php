<?php

namespace app\models;


class HotelModel extends AbstractModel
{
    public static function tableName()
    {
        return 'hotel';
    }
    public function rules()
    {
        return [
            [['id', 'vacancies'], 'integer'],
            [['name', 'country', 'city', 'address', 'hotel_type'], 'string'],
            [['id', 'name', 'country', 'city', 'address', 'hotel_type', 'vacancies'], 'required'],
            [['id'], 'unique']
        ];
    }
    public function addData(HotelModel $model)
    {
        $sql = "
            insert into ".$this->tableName()." (id, name, country, city, address, vacancies, hotel_type)
            values
                (
                    coalesce((select max(id) from ".$this->tableName()."), 0) + 1,
                    N'".$model->name."',
                    N'".$model->country."',
                    N'".$model->city."',
                    N'".$model->address."',
                    ".$model->vacancies.",
                    N'".$model->hotel_type."'
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
                address = N'".$model->address."',
                vacancies = ".$model->vacancies.",
                hotel_type = N'".$model->hotel_type."',
            where id = ". $model->id ."
        ";
        return \Yii::$app->db->createCommand($sql)->execute();
    }
}