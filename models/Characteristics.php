<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%catalog.characteristics}}".
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property bool $required
 * @property string|null $default
 * @property string $variants_json
 * @property int $sort
 */
class Characteristics extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%catalog.characteristics}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type', 'required', 'variants_json', 'sort'], 'required'],
            [['required'], 'boolean'],
            [['variants_json'], 'safe'],
            [['sort'], 'default', 'value' => null],
            [['sort'], 'integer'],
            [['name', 'default'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 16],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'type' => 'Type',
            'required' => 'Required',
            'default' => 'Default',
            'variants_json' => 'Variants Json',
            'sort' => 'Sort',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\CharacteristicQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\CharacteristicQuery(get_called_class());
    }
}
