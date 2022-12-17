<?php

use yii\db\Migration;

/**
 * Class m221217_162010_add_password_hash_to_employees
 */
class m221217_162010_add_password_hash_to_employees extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('employees', 'password_hash', $this->string(100)->null()->comment('Хэш пароля'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('employees', 'password_hash');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221217_162010_add_password_hash_to_user cannot be reverted.\n";

        return false;
    }
    */
}
