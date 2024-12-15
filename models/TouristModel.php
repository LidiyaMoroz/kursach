<?php

namespace app\models;

class TouristModel extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'tourist';
    }
    public function rules()
    {
        return [
            [['id', 'age', 'children'], 'integer'],
            [['name', 'passport', 'gender'], 'nvarchar'],
            [['id', 'name', 'passport', 'gender', 'age', 'children'], 'required'],
            [['id'], 'unique']
        ];
    }
}