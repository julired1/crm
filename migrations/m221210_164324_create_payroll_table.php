<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payroll}}`.
 */
class m221210_164324_create_payroll_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%payroll}}', [
            'employees_id' => $this->integer()->notNull()->comment('Сотрудник'),
            'name' => $this->text()->notNull()->comment('ФИО'),
            'building_id' => $this->integer()->notNull()->comment('Объект'),
            'speciality' => $this->text()->comment('Специальность'),
             'worktime' => $this->integer()->comment('Кол-во, чел/час'),
             'coefficient' => $this->integer()->comment('Зарплатный коэффициент'),
             'vat' => $this->integer()->comment('НДС'),
             'daily' => $this->integer()->comment('Cуточные'),
             'hourly' => $this->integer()->comment('Часовая ставка'),

        ]);
        $this->createIndex(
        'idx-payroll-employees_id',
        'payroll',
        'employees_id',
      );
        $this->addForeignKey(
        'employees_id',
        'payroll',
        'employees_id',
        'employees',
        'id',
        'CASCADE');
        $this->createIndex(
        'idx-payroll-building_id',
        'payroll',
        'building_id',
      );
        $this->addForeignKey(
        'building_id',
        'payroll',
        'building_id',
        'building',
        'id',
        'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
        'employees_id',
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
        $this->dropTable('{{%payroll}}');
                
    }
}
