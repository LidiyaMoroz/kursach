<?php

namespace app\models;

use yii\db\ActiveRecord;

class StatementModel extends ActiveRecord
{
    public static function tableName()
    {
        return 'statement';
    }
    public function rules()
    {
        return [
            [['id', 'group_id', 'hotel_id', 'price'], 'integer'],
            [['date'], 'date'],
            [['id', 'date', 'group_id', 'hotel_id', 'price'], 'required'],
            [['id'], 'unique']
        ];
    }
}