<?php

namespace app\models;

use yii\db\ActiveRecord;

class TourModel extends ActiveRecord
{
    public static function tableName()
    {
        return 'tour';
    }
    public function rules()
    {
        return [
            [['id', 'price'], 'integer'],
            [['name', 'country', 'city', 'movement', 'food', 'price', 'accommodation'], 'nvarchar'],
            [['id', 'name', 'country', 'city', 'movement', 'food', 'price', 'accommodation', 'price'], 'required'],
            [['id'], 'unique']
        ];
    }
}