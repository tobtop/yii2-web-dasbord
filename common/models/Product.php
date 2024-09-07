<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $detail
 * @property float $price
 * @property string|null $type
 * @property string $img_path
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
            [['name', 'detail', 'price'], 'required'],
            [['detail', 'type'], 'string'],
            [['price'], 'number'],
            [['name', 'img_path'], 'string', 'max' => 200],
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
            'detail' => 'Detail',
            'price' => 'Price',
            'type' => 'Type',
            'img_path' => 'Img Path',
        ];
    }
}
