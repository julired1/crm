<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%cost}}`.
 */
class m221213_201656_add_pk_column_to_cost_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this ->addColumn('cost','id',$this->primaryKey());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('identification','id');
    }
}
