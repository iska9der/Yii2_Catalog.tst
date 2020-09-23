<?php

use yii\db\Migration;

class m200923_155607_05_create_table_eav_attribute_value extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%eav_attribute_value}}',
            [
                'id' => $this->primaryKey(),
                'entityId' => $this->integer()->defaultValue('0'),
                'attributeId' => $this->integer()->defaultValue('0'),
                'value' => $this->text(),
                'optionId' => $this->integer()->defaultValue('0'),
            ],
            $tableOptions
        );

        $this->createIndex('idx_eav_attribute_value_entityId', '{{%eav_attribute_value}}', ['entityId']);
    }

    public function down()
    {
        $this->dropTable('{{%eav_attribute_value}}');
    }
}
