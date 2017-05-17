<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "homework".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property string $date_create
 */
class Homework extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'homework';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address', 'email', 'phone'], 'required'],
            [['date_create'], 'safe'],
            [['name', 'phone'], 'string', 'max' => 10],
            [['address'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 50],
            [['email'], 'unique'],
            [['phone'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'address' => 'Address',
            'email' => 'Email',
            'phone' => 'Phone',
            'date_create' => 'Date Create',
        ];
    }
}
