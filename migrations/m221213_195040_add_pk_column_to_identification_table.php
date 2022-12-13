<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%identification}}`.
 */
class m221213_195040_add_pk_column_to_identification_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this ->addColumn('identification','id',$this->primaryKey());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('identification','id');
    }
}
