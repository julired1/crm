<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%building}}`.
 */
class m221209_230503_create_building_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%building}}', [
            'id' => $this->primaryKey(),
            'title' => $this->text()->notNull(),
            'region' => $this->integer(100),
            'trials' => $this->boolean(),
            'status' => $this->smallInteger(10),
            'phone' => $this->bigInteger(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%building}}');
    }
}
