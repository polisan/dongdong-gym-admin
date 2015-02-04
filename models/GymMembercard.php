<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * GymMembercard model
 *
 * @property integer $id
 * @property integer $gym_id
 * @property integer $status
 * @property string $name
 * @property string $description
 * @property integer $start_at
 * @property integer $expire_at
 * @property integer $created_at
 * @property integer $updated_at
 */
class GymMembercard extends ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%gym_membercard}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gym_id', 'name', 'description', 'start_at', 'expire_at'], 'required'],

            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_DELETED, self::STATUS_ACTIVE]],
        ];
    }

    public function getGym()
    {
        return $this->hasOne(Gym::className(), ['id' => 'gym_id']);
    }
}
