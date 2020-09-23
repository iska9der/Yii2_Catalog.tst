<?php

use yii\db\Migration;

class m200923_155607_10_create_foreign_keys extends Migration
{
    public function up()
    {
        $this->addForeignKey(
            'FK_Option_attributeId',
            '{{%eav_attribute_option}}',
            ['attributeId'],
            '{{%eav_attribute}}',
            ['id'],
            'CASCADE',
            'NO ACTION'
        );
        $this->addForeignKey(
            'FK_Rules_attributeId',
            '{{%eav_attribute_rules}}',
            ['attributeId'],
            '{{%eav_attribute}}',
            ['id'],
            'CASCADE',
            'NO ACTION'
        );
        $this->addForeignKey(
            'FK_Value_attributeId',
            '{{%eav_attribute_value}}',
            ['attributeId'],
            '{{%eav_attribute}}',
            ['id'],
            'CASCADE',
            'NO ACTION'
        );
        $this->addForeignKey(
            'FK_OptionID_Option_id',
            '{{%eav_attribute_value}}',
            ['optionId'],
            '{{%eav_attribute_option}}',
            ['id'],
            'CASCADE',
            'NO ACTION'
        );
        $this->addForeignKey(
            'FKDefOptId_Option_ID',
            '{{%eav_attribute}}',
            ['defaultOptionId'],
            '{{%eav_attribute_option}}',
            ['id'],
            'CASCADE',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropForeignKey('FKDefOptId_Option_ID', '{{%eav_attribute}}');
        $this->dropForeignKey('FK_OptionID_Option_id', '{{%eav_attribute_value}}');
        $this->dropForeignKey('FK_Value_attributeId', '{{%eav_attribute_value}}');
        $this->dropForeignKey('FK_Rules_attributeId', '{{%eav_attribute_rules}}');
        $this->dropForeignKey('FK_Option_attributeId', '{{%eav_attribute_option}}');
    }
}
