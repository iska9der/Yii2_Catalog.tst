<?php

namespace app\models;


use Yii;

/**
 * This is the model class for table "{{%catalog.category}}".
 *
 * @property int $category_id
 * @property string|null $pic
 * @property string $name
 */
class Category extends \yii\db\ActiveRecord
{

    public $randomStr;
    public $picFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%catalog.category}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['picFile'], 'file'],
            [['pic'], 'string'],
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'ID Категории',
            'pic' => 'Картинка',
            'picFile' => 'Картинка',
            'name' => 'Наименование',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\CategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\CategoryQuery(get_called_class());
    }

}