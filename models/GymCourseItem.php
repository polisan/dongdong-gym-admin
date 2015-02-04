<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * GymCourseItem model
 *
 * @property integer $id
 * @property integer $gym_course_id
 * @property integer $status
 * @property integer $day_in_week
 * @property integer $start_time_in_day
 * @property integer $expire_time_in_day
 * @property string $name
 * @property integer $sports_id
 * @property string $coach_name
 * @property string $description
 * @property integer $created_at
 * @property integer $updated_at
 */
class GymCourseItem extends ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%gym_course_item}}';
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
            [['gym_course_id', 'day_in_week', 'start_time_in_day', 'expire_time_in_day', 'name', 'sports_id', 'coach_name', 'description'], 'required'],

            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
        ];
    }

    public function getGymCourse()
    {
        return $this->hasOne(GymCourse::className(), ['id' => 'gym_course_id']);
    }

    public function getSports()
    {
        return $this->hasOne(Sports::className(), ['id' => 'sports_id']);
    }
}
