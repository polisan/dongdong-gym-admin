<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * Field model
 *
 * @property integer $id
 * @property string $name
 * @property integer $category
 * @property integer $status
 * @property string $reservation_info
 * @property integer $created_at
 * @property integer $updated_at
 */
class Field extends ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    const STATUS_CLOSED = 11;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%field}}';
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
            [['name', 'category', 'reservation_info'], 'required'],

            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_DELETED, self::STATUS_ACTIVE, self::STATUS_CLOSED]],
        ];
    }

    public function getFieldCategory()
    {
        return $this->hasOne(FieldCategory::className(), ['id' => 'category']);
    }

}
