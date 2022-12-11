<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%workman}}`.
 */
class m221210_192947_create_workman_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%workman}}', [
            'building_id' => $this->integer()->notNull()->comment('Объект'),
            'employees_id' => $this->integer()->notNull()->comment('Сотрудник'),
            'medical' => $this->boolean()->comment('Медицинский осмотр'),
            'naks' => $this->date()->comment('НАКС'),
            'criminal' => $this->boolean()->comment('Судимость'),
            'speciality' => $this->text()->comment('Специальность'),
            'limit' => $this->smallInteger()->notNull()->comment('Количество требуемых сотрудников'),
            'examination' => $this->boolean()->notNull()->comment('Аттестация'),
            'education' => $this->text()->notNull()->comment('Образование')

        ]);
         $this->createIndex(
        'idx-workman-employees_id',
        'workman',
        'employees_id'
      );
        $this->addForeignKey(
        'fk_employees_id',
        'workman',
        'employees_id',
        'employees',
        'id',
        'CASCADE',
        'CASCADE');
        $this->createIndex(
        'idx-workman-building_id',
        'workman',
        'building_id'
      );
        $this->addForeignKey(
        'fk_building_id',
        'workman',
        'building_id',
        'building',
        'id',
        'CASCADE',
        'CASCADE');
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
           $this->dropForeignKey(
        'fk_employees_id',
        'employees',
        'building_id',
        'building'
                );
        $this->dropIndex(
        'employees_id',
        'employees',
        'building_id',
        'building'
                );
        $this->dropTable('{{%workman}}');
    }
}
