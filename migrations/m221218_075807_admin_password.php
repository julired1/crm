<?php

use yii\db\Migration;

/**
 * Class m221218_075807_admin_password
 */
class m221218_075807_admin_password extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('employees',[
            'name'=>'Динир',
            'type' => 1,
            'birthday'=>'11.04.2000',
            'is_admin'=>True,
            'email'=> 'dinirik2000@mail.ru',
            'password_hash'=>Yii::$app->security->generatePasswordHash('DenZiro2000'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('employees',[
            'email'=> 'dinirik2000@mail.ru',
        ]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221218_075807_admin_password cannot be reverted.\n";

        return false;
    }
    */
}
