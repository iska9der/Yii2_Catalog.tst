<?php

use yii\db\Migration;

/**
 * Handles the creation for table `table_eav_attribute_rules`.
 */
class m160501_124615_create_table_eav_attribute_rules extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $options = $this->db->driverName == 'mysql'
            ? 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB'
            : null;

        $this->createTable('{{%catalog.eav_attribute_rules}}', [
            'id' => $this->primaryKey(),
            'attributeId' => $this->integer(11)->defaultValue(0),
            'rules' => $this->text()->defaultValue(''),
        ], $options);

        $this->addForeignKey('FK_Rules_attributeId',
            '{{%catalog.eav_attribute_rules}}', 'attributeId', '{{%catalog.eav_attribute}}', 'id', "CASCADE", "NO ACTION");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('catalog.eav_attribute_rules');
    }
}
