<?php

use yii\db\Migration;

class m200923_155607_07_create_table_product extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%product}}',
            [
                'product_id' => $this->primaryKey(),
                'name' => $this->string(100)->notNull(),
                'pic' => $this->text(),
                'description' => $this->text()->notNull(),
                'qrcode' => $this->text(),
                'category_id' => $this->integer(),
                'price' => $this->integer(),
            ],
            $tableOptions
        );

        $this->addForeignKey(
            'product_category_id_fkey',
            '{{%product}}',
            ['category_id'],
            '{{%category}}',
            ['category_id'],
            'CASCADE',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%product}}');
    }
}
