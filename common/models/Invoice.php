<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "invoice".
 *
 * @property int $id
 * @property string $product
 * @property string $Serial
 * @property string $Description
 * @property float $price
 */
class Invoice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'invoice';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product', 'Serial', 'Description', 'price'], 'required'],
            [['price'], 'number'],
            [['product', 'Serial', 'Description'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product' => 'Product',
            'Serial' => 'Serial',
            'Description' => 'Description',
            'price' => 'Price',
        ];
    }
}
