<?php

namespace app\modules\news\models;

use Yii;
use yii\base\Model;

class ArticleWriteForm extends Model
{
    public $title;
    public $image;
    public $summary;
    public $category;
    public $sports_id;
    public $content;
}
