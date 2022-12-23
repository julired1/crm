<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%employees}}`.
 */
class m221208_165644_create_employees_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%employees}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(150)->notNull()->comment('ФИО'),
            'type' => $this->smallInteger(10)->comment('')->notNull(),
            'naks' => $this->date()->comment('НАКС'),
            'speciality' => $this->text()->comment('Должность'),
            'region' => $this->smallInteger(100)->comment('Регион'),
            'examination' => $this->boolean()->comment('Аттестация'),
            'criminal' => $this->boolean()->comment('Судимость'),
            'status' => $this->smallInteger(10)->comment('Статус'),
            'email' => $this->text()->comment('Email адрес'),
            'birthday' => $this->date()->notNull()->comment('Дата рождения'),
            'phone' => $this->text(20)->comment('Телефон'),
            'medical' => $this->boolean()->comment('Медицинский осмотр'),
            'education' => $this->text()->comment('Образование'),
            'worktime' => $this->time()->comment('Рабочее время'),
          
            
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%employees}}');
    }
    
}
