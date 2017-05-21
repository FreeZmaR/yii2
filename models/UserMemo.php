<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_memo".
 *
 * @property integer $id
 * @property string $date_create
 * @property string $title
 * @property string $description
 * @property integer $fk_user_id
 *
 * @property User $fkUser
 */
class UserMemo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_memo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_create'], 'safe'],
            [['description', 'fk_user_id'], 'required'],
            [['description'], 'string'],
            [['fk_user_id'], 'integer'],
            [['title'], 'string', 'max' => 100],
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
            'date_create' => 'Date Create',
            'title' => 'Title',
            'description' => 'Description',
            'fk_user_id' => 'Fk User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkUser()
    {
        return $this->hasOne(UserAuth::className(), ['id' => 'fk_user_id']);
    }




}
