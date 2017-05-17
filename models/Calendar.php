<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "calendar".
 *
 * @property integer $id
 * @property string $name
 * @property string $date
 * @property string $description
 * @property integer $fk_user_id
 * @property string $create_at
 * @property string $update_at
 *
 * @property User $fkUser
 * @property Link[] $links
 */
class Calendar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calendar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'fk_user_id'], 'required'],
            [['date', 'create_at', 'update_at'], 'safe'],
            [['description'], 'string'],
            [['fk_user_id'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['fk_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserAuth::className(), 'targetAttribute' => ['fk_user_id' => 'id']],
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
            'date' => 'Date',
            'description' => 'Description',
            'fk_user_id' => 'Fk User ID',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkUser()
    {
        return $this->hasOne(UserAuth::className(), ['id' => 'fk_user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinks()
    {
        return $this->hasMany(Link::className(), ['fk_calendar_id' => 'id']);
    }
}
