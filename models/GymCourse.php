<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * GymCourse model
 *
 * @property integer $id
 * @property integer $gym_id
 * @property integer $status
 * @property integer $start_day
 * @property integer $expire_day
 * @property string $name
 * @property integer $created_at
 * @property integer $updated_at
 */
class GymCourse extends ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%gym_course}}';
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
            [['gym_id', 'start_day', 'expire_day', 'name'], 'required'],

            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_DELETED, self::STATUS_ACTIVE]],
        ];
    }

    public function getGym()
    {
        return $this->hasOne(Gym::className(), ['id' => 'gym_id']);
    }

    public function getItems()
    {
        return $this->hasMany(GymCourseItem::className(), ['gym_course_id', 'id'])
            ->where(['status' => GymCourseItem::STATUS_ACTIVE])
            ->orderBy('id');
    }
}
