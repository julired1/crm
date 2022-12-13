<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%workman}}`.
 */
class m221213_185335_add_pk_column_to_workman_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this ->addColumn('workman','id',$this->primaryKey());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('workman','id');
    }
}
