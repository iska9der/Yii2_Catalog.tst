<?php

use yii\db\Migration;

class m200923_155607_06_create_table_eav_entity extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%eav_entity}}',
            [
                'id' => $this->primaryKey(),
                'entityName' => $this->string(50),
                'entityModel' => $this->string(100),
                'categoryId' => $this->integer(),
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable('{{%eav_entity}}');
    }
}
