<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * FieldCategory model
 *
 * @property integer $id
 * @property integer $gym_id
 * @property integer $sports_id
 * @property string $name
 * @property integer $status
 * @property integer $quantity
 * @property string $open_time
 * @property integer $created_at
 * @property integer $updated_at
 */
class FieldCategory extends ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%field_category}}';
    }

    /**
     * inheritdoc
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
            [['gym_id', 'sports_id', 'name', 'open_time'], 'required'],

            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_DELETED, self::STATUS_ACTIVE]],
        ];
    }

    public function getFields()
    {
        return $this->hasMany(Field::className(), ['category' => 'id'])
            ->where(['not', ['status' => Field::STATUS_DELETED]])
            ->orderBy('id');
    }

    public function getFieldCharges()
    {
        return $this->hasMany(FieldCharge::className(), ['field_category_id' => 'id'])
            ->orderBy('id');
    }

    public function getGym()
    {
        return $this->hasOne(Gym::className(), ['id' => 'gym_id']);
    }

    public function getSports()
    {
        return $this->hasOne(Sports::className(), ['id' => 'sports_id']);
    }
}
