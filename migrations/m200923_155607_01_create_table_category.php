<?php

use yii\db\Migration;

class m200923_155607_01_create_table_category extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%category}}',
            [
                'category_id' => $this->primaryKey(),
                'pic' => $this->text(),
                'name' => $this->string(100)->notNull(),
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable('{{%category}}');
    }
}
