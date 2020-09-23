<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "{{%catalog.product}}".
 *
 * @property int $product_id
 * @property string $name
 * @property string $pic
 * @property string $description
 * @property string|null $qrcode
 * @property int|null $category_id
 */
class Product extends \yii\db\ActiveRecord
{
    use \mirocow\eav\EavTrait;

    public $randomStr;
    public $picFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%catalog.product}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['picFile'], 'file'],
            [['name', 'description'], 'required'],
            [['pic', 'description', 'qrcode'], 'string'],
            [['category_id'], 'default', 'value' => null],
            [['category_id', 'price'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'category_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'ID Товара',
            'name' => 'Наименование',
            'price' => 'Цена',
            'category_id' => 'Категория',
            'category' => 'Категория',
            'description' => 'Описание',
            'picFile' => 'Картинка',
            'pic' => 'Картинка',
            'qrcode' => 'Ссылка для формирования QR-Кода',
        ];
    }

    public function behaviors()
    {
        return [
            'eav' => [
                'class' => \mirocow\eav\EavBehavior::className(),
                // это модель для таблицы object_attribute_value
                'valueClass' => \mirocow\eav\models\EavAttributeValue::className(),
            ]
        ];
    }


    /**
     * {@inheritdoc}
     * @return \app\models\query\ProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\ProductQuery(get_called_class());
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEavAttributes()
    {
        return \mirocow\eav\models\EavAttribute::find()
            ->joinWith('entity')
            ->where([
                'categoryId' => $this->category_id,
                'entityModel' => $this::className()
            ]);
    }
}
