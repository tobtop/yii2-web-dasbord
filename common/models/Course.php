<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property int $id
 * @property string $Course_Name
 * @property string $Description
 * @property float $price
 * @property string $Duration
 * @property string $img_path
 * @property string $Contact
 * @property int $Lessons
 * @property string|null $Course_Type
 * @property string $comment
 * @property string $Professor
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Course_Name', 'Description', 'price', 'Duration', 'Contact', 'Lessons', 'comment', 'Professor'], 'required'],
            [['price'], 'number'],
            [['Lessons'], 'integer'],
            [['Course_Type'], 'string'],
            [['Course_Name', 'Description', 'img_path', 'Contact', 'comment'], 'string', 'max' => 200],
            [['Duration'], 'string', 'max' => 255],
            [['Professor'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Course_Name' => 'Course Name',
            'Description' => 'Description',
            'price' => 'Price',
            'Duration' => 'Duration',
            'img_path' => 'Img Path',
            'Contact' => 'Contact',
            'Lessons' => 'Lessons',
            'Course_Type' => 'Course Type',
            'comment' => 'Comment',
            'Professor' => 'Professor',
        ];
    }
}
