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
}