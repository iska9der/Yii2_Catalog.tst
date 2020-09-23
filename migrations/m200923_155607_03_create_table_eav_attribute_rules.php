<?php

use yii\db\Migration;

class m200923_155607_03_create_table_eav_attribute_rules extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%eav_attribute_rules}}',
            [
                'id' => $this->primaryKey(),
                'attributeId' => $this->integer()->defaultValue('0'),
                'rules' => $this->text()->defaultValue(''),
                'required' => $this->smallInteger()->defaultValue('0'),
                'visible' => $this->smallInteger()->defaultValue('0'),
                'locked' => $this->smallInteger()->defaultValue('0'),
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable('{{%eav_attribute_rules}}');
    }
}
