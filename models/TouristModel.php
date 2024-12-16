<?php

namespace app\models;

use yii\data\SqlDataProvider;

class TouristModel extends \yii\db\ActiveRecord
{
    public static $genders = [
        'М',
        'Ж'
    ];
    public static function tableName()
    {
        return 'tourist';
    }
    public function rules()
    {
        return [
            [['id', 'age', 'children'], 'integer'],
            [['name', 'passport', 'gender'], 'string'],
            [['id', 'name', 'passport', 'gender', 'age', 'children'], 'required'],
            [['id'], 'unique']
        ];
    }
    public static function getIndexDataProvider()
    {
        $sql = "
            SELECT * FROM tourist
        ";
        return new SqlDataProvider([
            'sql' => $sql,
            'pagination' => [
                'pageSize' => 12
            ]
        ]);
    }
    public static function addData(TouristModel $model)
    {

    }
}