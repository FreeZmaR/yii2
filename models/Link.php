<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "link".
 *
 * @property integer $id
 * @property integer $fk_calendar_id
 * @property string $hash
 * @property integer $fk_user_id
 * @property string $description
 *
 * @property Calendar $fkCalendar
 * @property User $fkUser
 */
class Link extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'link';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fk_calendar_id', 'hash'], 'required'],
            [['fk_calendar_id', 'fk_user_id'], 'integer'],
            [['hash'], 'string', 'max' => 32],
            [['description'], 'string', 'max' => 255],
            [['fk_calendar_id'], 'exist', 'skipOnError' => true, 'targetClass' => Calendar::className(), 'targetAttribute' => ['fk_calendar_id' => 'id']],
            [['fk_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['fk_user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fk_calendar_id' => 'Fk Calendar ID',
            'hash' => 'Hash',
            'fk_user_id' => 'Fk User ID',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkCalendar()
    {
        return $this->hasOne(Calendar::className(), ['id' => 'fk_calendar_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkUser()
    {
        return $this->hasOne(UserAuth::className(), ['id' => 'fk_user_id']);
    }
}
