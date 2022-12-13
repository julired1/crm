<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%payroll}}`.
 */
class m221213_200707_add_pk_column_to_payroll_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this ->addColumn('payroll','id',$this->primaryKey());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('identification','id');
    }
}
