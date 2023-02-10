<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $time
 * @property string $name
 * @property string $image
 * @property string $price
 * @property string $country
 * @property string $year
 * @property int $category_id
 *
 * @property Category $category
 * @property Order[] $orders
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['time', 'year'], 'safe'],
            [['name', 'image', 'price', 'country', 'year', 'category_id'], 'required'],
            [['category_id'], 'integer'],
            [['name', 'image', 'price', 'country'], 'string', 'max' => 200],
            [['image'], 'file',  'extensions' => ['png', 'jpg', 'gif'],'skipOnEmpty' => false ],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'time' => 'Время добавления товара',
            'name' => 'Название',
            'image' => 'Изображение',
            'price' => 'Цена',
            'country' => 'Страна',
            'year' => 'Год',
            'category_id' => 'Категория товара',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['product_id' => 'id']);
    }
}
