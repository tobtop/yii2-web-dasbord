<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "register_type".
 *
 * @property int $id
 * @property string $Name
 * @property string $Email
 * @property string $Contact
 * @property string|null $Membership_Type
 */
class Enroll extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'register_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name', 'Email', 'Contact'], 'required'],
            [['Membership_Type'], 'string'],
            [['Name', 'Email', 'Contact'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Name' => 'Name',
            'Email' => 'Email',
            'Contact' => 'Contact',
            'Membership_Type' => 'Membership Type',
        ];
    }
}
