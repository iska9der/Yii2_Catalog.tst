<?php

use yii\db\Migration;

class m200923_155607_04_create_table_eav_attribute_type extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%eav_attribute_type}}',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string()->defaultValue('NULL'),
                'handlerClass' => $this->string()->defaultValue('NULL'),
                'storeType' => $this->smallInteger()->defaultValue('0'),
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable('{{%eav_attribute_type}}');
    }
}
