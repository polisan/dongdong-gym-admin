<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * NewsComment model
 *
 * @property integer $id
 * @property integer $news_id
 * @property integer $parent
 * @property integer $customer_id
 * @property integer $is_anonymous
 * @property string $content
 * @property integer $reply_count
 * @property integer $like_count
 * @property integer $created_at
 * @property integer $updated_at
 */
class NewsComment extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%news_comment}}';
    }

    /**
     * @inheritdoc
     */


    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function rules()
    {
        return [
            [['news_id', 'customer_id', 'content'], 'required'],
        ];
    }

    public function getNews()
    {
        return $this->hasOne(News::className(), ['id' => 'news_id']);
    }
}
