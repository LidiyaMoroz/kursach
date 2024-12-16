<?php

namespace app\models;

class GroupModel extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '[group]';
    }
    public function rules()
    {
        return [
            [['id', 'tour_id', 'quantity'], 'integer'],
            [['name'], 'nvarchar'],
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
    public static function getAllData()
    {
        $sql = 'SELECT * FROM '. self::tableName();
        $query = \Yii::$app->db->createCommand($sql);
        return $query->queryAll();
    }
}