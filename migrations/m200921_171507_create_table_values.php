<?php

use yii\db\Migration;

/**
 * Class m200921_171507_create_table_values
 */
class m200921_171507_create_table_values extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%catalog.values}}', [
            'product_id' => $this->integer()->notNull(),
            'characteristic_id' => $this->integer()->notNull(),
            'value' => $this->string(),
        ], $tableOptions);

        $this->addPrimaryKey('{{%pk-catalog_values}}', '{{%catalog.values}}', ['product_id', 'characteristic_id']);

        $this->createIndex('{{%idx-catalog_values-product_id}}', '{{catalog.values}}', 'product_id');
        $this->createIndex('{{%idx-catalog_values-characteristic_id}}', '{{catalog.values}}', 'characteristic_id');

        $this->addForeignKey('{{%fk-catalog_values-product_id}}', '{{catalog.values}}', 'product_id', '{{catalog.product}}', 'product_id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('{{%fk-catalog_values-characteristic_id}}', '{{catalog.values}}', 'characteristic_id', '{{catalog.characteristics}}', 'id', 'CASCADE', 'RESTRICT');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200921_171507_create_table_values cannot be reverted.\n";
        $this->dropTable('{{%catalog.values}}');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200921_171507_create_table_values cannot be reverted.\n";

        return false;
    }
    */
}
