<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cost}}`.
 */
class m221210_184941_create_cost_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cost}}', [
            'building_id' => $this->integer()->notNull()->comment('Объект'),
            'employees_id' => $this->integer()->notNull()->comment('Сотрудник'),
            'product' => $this->smallInteger()->comment('Наименование'),
            'price' => $this->money()->notNull()->comment('Наименование'),
        ]);
         $this->createIndex(
        'idx-cost-employees_id',
        'cost',
        'employees_id',
      );
        $this->addForeignKey(
        'fk_employees_id',
        'cost',
        'employees_id',
        'employees',
        'id',
        'CASCADE');
        $this->createIndex(
        'idx-cost-building_id',
        'cost',
        'building_id',
      );
        $this->addForeignKey(
        'fk_building_id',
        'cost',
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
        $this->dropTable('{{%cost}}');
    }
}
