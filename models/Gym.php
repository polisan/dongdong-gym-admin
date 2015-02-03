<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * Gym model
 *
 * @property integer $id
 * @property integer $gym_admin_id
 * @property string $name
 * @property integer $status
 * @property string $logo
 * @property string $open_time
 * @property integer $area_id
 * @property string $location
 * @property string $description
 * @property string $manager
 * @property string $contact
 * @property string $wechat
 * @property string $gallery
 * @property string $latitude
 * @property string $longitude
 * @property integer $support_membercard
 * @property integer $created_at
 * @property integer $updated_at
 */
class Gym extends ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%gym}}';
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
            [['gym_admin_id', 'name', 'open_time', 'area_id', 'location', 'description', 'manager', 'contact'], 'required'],

            [['name'], 'unique'],

            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],

            ['support_membercard', 'default', 'value' => 1],
            ['support_membercard', 'in', 'range' => [0, 1]],
        ];
    }

    public function getGymAdmin()
    {
        return $this::hasOne(GymAdmin::className(), ['id', 'gym_admin_id']);
    }
}
