<?php

use yii\db\Migration;

/**
 * Class m221217_162322_add_is_admin_to_employees
 */
class m221217_162322_add_is_admin_to_employees extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('employees', 'is_admin', $this->boolean()->defaultValue(false)->notNull()->comment('Администратор'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('employees', 'is_admin');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221217_162322_add_is_admin_to_user cannot be reverted.\n";

        return false;
    }
    */
}
