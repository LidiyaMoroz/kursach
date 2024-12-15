<?php

namespace app\models;

use yii\db\ActiveRecord;

class GroupDataModel extends ActiveRecord
{
    public static function tableName()
    {
        return 'group_model';
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
}