<?php

use yii\db\Migration;

/**
 * Class m241215_215751_add_tables
 */
class m241215_215751_add_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Создание таблицы tourist
        $this->execute("
            CREATE TABLE tourist (
                id INT PRIMARY KEY NOT NULL,
                name NVARCHAR(64) NOT NULL,
                passport NVARCHAR(128) NOT NULL,
                gender NVARCHAR(8) NOT NULL,
                age INT NOT NULL,
                children INT NOT NULL
            );
        ");

        // Создание таблицы tour
        $this->execute("
            CREATE TABLE tour (
                id INT PRIMARY KEY NOT NULL,
                name NVARCHAR(64) NOT NULL,
                country NVARCHAR(32) NOT NULL,
                city NVARCHAR(32) NOT NULL,
                movement NVARCHAR(32) NOT NULL,
                food NVARCHAR(32) NOT NULL,
                price INT NOT NULL,
                accommodation NVARCHAR(32) NOT NULL
            );
        ");

        // Создание таблицы group
        $this->execute("
            CREATE TABLE [group] (
                id INT PRIMARY KEY NOT NULL,
                name NVARCHAR(64) NOT NULL,
                date_departure DATE NOT NULL,
                date_arrival DATE NOT NULL,
                tour_id INT NOT NULL,
                quantity INT NOT NULL,
                FOREIGN KEY (tour_id) REFERENCES tour(id) ON DELETE CASCADE
            );
        ");

        // Создание таблицы group_data
        $this->execute("
            CREATE TABLE group_data (
                id INT PRIMARY KEY NOT NULL,
                date_sale DATE NOT NULL,
                tourist_id INT NOT NULL,
                group_id INT NOT NULL,
                price INT NOT NULL,
                FOREIGN KEY (tourist_id) REFERENCES tourist(id) ON DELETE CASCADE,
                FOREIGN KEY (group_id) REFERENCES [group](id) ON DELETE CASCADE
            );
        ");

        // Создание таблицы hotel
        $this->execute("
            CREATE TABLE hotel (
                id INT PRIMARY KEY NOT NULL,
                name NVARCHAR(64) NOT NULL,
                country NVARCHAR(64) NOT NULL,
                city NVARCHAR(64) NOT NULL,
                address NVARCHAR(128) NOT NULL,
                vacancies INT NOT NULL,
                hotel_type NVARCHAR(64) NOT NULL
            );
        ");

        // Создание таблицы statement
        $this->execute("
            CREATE TABLE statement (
                id INT PRIMARY KEY NOT NULL,
                date DATE NOT NULL,
                group_id INT NOT NULL,
                hotel_id INT NOT NULL,
                price INT NOT NULL,
                FOREIGN KEY (group_id) REFERENCES [group](id) ON DELETE CASCADE, 
                FOREIGN KEY (hotel_id) REFERENCES hotel(id) ON DELETE CASCADE
            );
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Удаление таблицы statement
        $this->execute("DROP TABLE IF EXISTS statement;");

        // Удаление таблицы group_data
        $this->execute("DROP TABLE IF EXISTS group_data;");

        // Удаление таблицы [group]
        $this->execute("DROP TABLE IF EXISTS [group];");

        // Удаление таблицы hotel
        $this->execute("DROP TABLE IF EXISTS hotel;");

        // Удаление таблицы tour
        $this->execute("DROP TABLE IF EXISTS tour;");

        // Удаление таблицы tourist
        $this->execute("DROP TABLE IF EXISTS tourist;");
    }
}
