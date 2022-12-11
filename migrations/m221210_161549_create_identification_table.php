<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%identification}}`.
 */
class m221210_161549_create_identification_table extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->createTable('{{%identification}}', [
            'employees_id' => $this->integer()->comment('Сотрудник'),
            'name' => $this->string()->notNull()->comment('ФИО'),
            'email' => $this->text()->comment('Email адрес'),
            'password' => $this->string()->comment('Пароль')
        ]);
        $this->createIndex(
                'idx-identification-employees_id',
                'identification',
                'employees_id'
        );
        $this->addForeignKey(
                'fk_employees_id',
                'identification',
                'employees_id',
                'employees',
                'id',
                'CASCADE',
                'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropForeignKey(
                'fk_employees_id',
                'employees'
        );
        $this->dropIndex(
                'employees_id',
                'employees'
        );
        $this->dropTable('{{%identification}}');
    }

}
