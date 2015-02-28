<?php

namespace app\modules\news\controllers;

use app\components\NeedLoginController;
use app\modules\news\models\ArticleWriteForm;
use app\models\Sports;
use Yii;

class ArticlesController extends NeedLoginController
{
    /**
     * TODO: 查看已发表资讯的简要信息
     *       简要信息包括：标题、摘要、运动类型、文章分类、阅读/赞/评论数量、发表时间
     * @return  资讯列表页面
     */
    public function actionIndex()
    {
        $allSports = Sports::listAll();
        return $this->render('posts');
    }

    /**
     * TODO: 查看草稿箱里资讯的简要信息
     *       简要信息包括：标题、摘要、运动类型、保存时间
     */
    public function actionDraft()
    {
        return $this->render('draft');
    }

    /**
     * TODO: 查看资讯详细信息
     *       详细信息包括：标题、封面、分类、运动类型、阅读/赞/评论数、评论人员、发表时间
     */
    public function actionDetail()
    {
    }

    public function actionDeletePost()
    {
        $message = [
            'statusCode' => 200,
            'message' => '删除成功',
        ];
        return json_encode($message);
    }

    /**
     * 加载文章发布页面
     */
    public function actionAdd()
    {
        $model = new ArticleWriteForm();
        $sports = Sports::listAll();
        return $this->render('add', ['model' => $model, 'sports' => $sports]);
    }
}
