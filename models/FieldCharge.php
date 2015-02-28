<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * FieldCharge model
 *
 * @property integer $id
 * @property integer $field_category_id
 * @property integer $start_day
 * @property integer $expire_day
 * @property integer $start_time_in_day
 * @property integer $expire_time_in_day
 * @property integer $type
 * @property string $price
 * @property integer $created_at
 * @property integer $updated_at
 */
class FieldCharge extends ActiveRecord
{
    const TYPE_BY_HOUR = 1;
    const TYPE_BY_TIME = 2;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%field_charge}}';
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
            [['field_category_id', 'start_day', 'expire_day', 'start_time_in_day', 'expire_time_in_day', 'price', 'created_at', 'updated_at'], 'required'],

            ['type', 'default', 'value' => self::TYPE_BY_HOUR],
            ['type', 'in', 'range' => [self::TYPE_BY_HOUR, self::TYPE_BY_TIME]],
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(FieldCategory::className(), ['id' => 'field_category_id']);
    }
}
