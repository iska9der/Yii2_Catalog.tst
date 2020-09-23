<?php

use yii\db\Migration;

class m200923_155607_08_create_table_public_migration extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%public.migration}}',
            [
                'version' => $this->string(180)->notNull()->append('PRIMARY KEY'),
                'apply_time' => $this->integer(),
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable('{{%public.migration}}');
    }
}
