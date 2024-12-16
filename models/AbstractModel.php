<?php

namespace app\models;

use yii\db\ActiveRecord;

class AbstractModel extends ActiveRecord
{
    public static function getDataById($id)
    {
        $sql = '
            SELECT * FROM '.static::tableName().'
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
    public static function deleteById($id)
    {
        $sql = "
            delete from ". static::tableName() ."
            where id = ".$id."
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
    public static function getAllData(array $select = [])
    {
        $select = count($select) ? implode(',', $select) : "*";
        $sql = "SELECT ". $select ." FROM ". static::tableName();
        $query = \Yii::$app->db->createCommand($sql);
        return $query->queryAll();
    }
    public static function getColumns()
    {
        $sql = "
            SELECT COLUMN_NAME
            FROM INFORMATION_SCHEMA.COLUMNS
            WHERE TABLE_NAME = '". static::tableName() ."'
        ";
        $query = \Yii::$app->db->createCommand($sql);
        return array_column($query->queryAll(), 'COLUMN_NAME');
    }
}