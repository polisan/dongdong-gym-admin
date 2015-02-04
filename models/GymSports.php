<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * GymSports model
 *
 * @property integer $id
 * @property integer $gym_id
 * @property integer $sports_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class GymSports extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%gym_sports}}';
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
            [['gym_id', 'sports_id'], 'required'],
        ];
    }

}
