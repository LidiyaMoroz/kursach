<?php

namespace app\models;

use yii\db\ActiveRecord;

class HotelModel extends ActiveRecord
{
    public static function tableName()
    {
        return 'hotel';
    }
    public function rules()
    {
        return [
            [['id', 'vacancies'], 'integer'],
            [['name', 'country', 'city', 'address', 'hotel_type'], 'nvarchar'],
            [['id', 'name', 'country', 'city', 'address', 'hotel_type', 'vacancies'], 'required'],
            [['id'], 'unique']
        ];
    }
}