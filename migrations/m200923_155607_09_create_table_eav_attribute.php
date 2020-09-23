<?php

use yii\db\Migration;

class m200923_155607_09_create_table_eav_attribute extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%eav_attribute}}',
            [
                'id' => $this->primaryKey(),
                'entityId' => $this->integer()->defaultValue('0'),
                'typeId' => $this->integer()->defaultValue('0'),
                'type' => $this->string(50)->defaultValue(''),
                'name' => $this->string()->defaultValue('NULL'),
                'label' => $this->string()->defaultValue('NULL'),
                'defaultValue' => $this->string()->defaultValue('NULL'),
                'defaultOptionId' => $this->integer(),
                'description' => $this->string()->defaultValue(''),
                'order' => $this->integer()->defaultValue('0'),
                'required' => $this->smallInteger()->defaultValue('1'),
            ],
            $tableOptions
        );

        $this->addForeignKey(
            'FK_EntityId',
            '{{%eav_attribute}}',
            ['entityId'],
            '{{%eav_entity}}',
            ['id'],
            'CASCADE',
            'NO ACTION'
        );
        $this->addForeignKey(
            'FK_Attribute_typeId',
            '{{%eav_attribute}}',
            ['typeId'],
            '{{%eav_attribute_type}}',
            ['id'],
            'CASCADE',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%eav_attribute}}');
    }
}
