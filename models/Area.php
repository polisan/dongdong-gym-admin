<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * Area model
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property integer $level
 * @property integer $parent
 * @property integer $created_at
 * @property integer $updated_at
 */
class Area extends ActiveRecord
{
    const LEVEL_PROVINCE = 1;
    const LEVEL_CITY = 2;
    const LEVEL_COUNTY = 3;
    const LEVEL_TOWN = 4;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%area}}';
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
            [['name', 'level', 'parent'], 'required'],

            [['name'], 'unique'],

            ['level', 'in', 'range' => [
                self::LEVEL_PROVINCE, self::LEVEL_CITY, self::LEVEL_COUNTY, self::LEVEL_TOWN,
            ]]
        ];
    }

    public static function findProvinces()
    {
        return static::findAll(['level' => self::LEVEL_PROVINCE]);
    }

    public static function findCities()
    {
        return static::findAll(['level' => self::LEVEL_CITY]);
    }

    public static function findCitiesByProvinceId($provinceId)
    {
        return static::findAll(['parent' => $provinceId]);
    }
}
