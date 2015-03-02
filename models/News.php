<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * News model
 *
 * @property integer $id
 * @property integer $status
 * @property integer $source_type
 * @property integer $source_id
 * @property string $category
 * @property integer $sports_id
 * @property string $title
 * @property string $image
 * @property integer $released_at
 * @property string $author
 * @property string $summary
 * @property string $content
 * @property integer $view_count
 * @property integer $comment_count
 * @property integer $favorite_count
 * @property integer $created_at
 * @property integer $updated_at
 */
class News extends ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_RELEASE_CANDIDATE = 10;
    const STATUS_UNCHECKED = 20;
    const STATUS_PASSED = 30;
    const STATUS_FAILED = 31;

    const SOURCE_TYPE_OFFICIAL = 0;
    const SOURCE_TYPE_GYM = 100;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%news}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
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
            [['source_id', 'category', 'sports_id', 'title', 'image', 'released_at', 'summary', 'content'], 'required'],

            ['status', 'default', 'value' => self::STATUS_RELEASE_CANDIDATE],
            ['status', 'in', 'range' => [
                self::STATUS_DELETED,
                self::STATUS_RELEASE_CANDIDATE,
                self::STATUS_UNCHECKED,
                self::STATUS_PASSED,
                self::STATUS_FAILED
            ]],

            ['source_type', 'default', 'value' => self::SOURCE_TYPE_OFFICIAL],
            ['source_type', 'in', 'range' => [self::SOURCE_TYPE_OFFICIAL, self::SOURCE_TYPE_GYM]],

            [['view_count', 'comment_count', 'favorite_count'], 'default', 'value' => 0],
        ];
    }

    public function getComments()
    {
        return $this->hasMany(NewsComment::className(), ['news_id' => 'id']);
    }

    public function getFavorites()
    {
        return $this->hasMany(NewsFavorite::className(), ['news_id' => 'id']);
    }
}
