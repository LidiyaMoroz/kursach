<?php

use yii\db\Migration;

/**
 * Class m241215_221224_add_triggers
 */
class m241215_221224_add_triggers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
            CREATE TRIGGER trg_after_insert_group_data
            ON group_data
            AFTER INSERT
            AS
            BEGIN
                UPDATE [group]
                SET quantity = quantity + 1
                FROM [group] g
                INNER JOIN inserted i ON g.id = i.group_id;
            END;
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m241215_221224_add_triggers cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241215_221224_add_triggers cannot be reverted.\n";

        return false;
    }
    */
}
