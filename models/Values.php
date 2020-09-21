<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use app\models\Characteristics;

/**
 * This is the model class for table "{{%catalog.values}}".
 *
 * @property int $product_id
 * @property int $characteristic_id
 * @property string|null $value
 */
class Values extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%catalog.values}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'characteristic_id'], 'required'],
            [['product_id', 'characteristic_id'], 'default', 'value' => null],
            [['product_id', 'characteristic_id'], 'integer'],
            [['value'], 'string', 'max' => 255],
            [['product_id', 'characteristic_id'], 'unique', 'targetAttribute' => ['product_id', 'characteristic_id']],
            [['characteristic_id'], 'exist', 'skipOnError' => true, 'targetClass' => Characteristics::className(), 'targetAttribute' => ['characteristic_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'product_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'characteristic_id' => 'Characteristic ID',
            'value' => 'Value',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\ValuesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\ValuesQuery(get_called_class());
    }



}
