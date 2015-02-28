<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = '写资讯';

/**
 * @model the instanceof of ArticleWriteForm
 * @sports the type of sport
 */
?>
<div class="container">
    <div class="editing">
        <div class="hd-wrap">
            <h5>写文章</h5>
        </div>
        <div class="bd-wrap">
            <?php
            $form = ActiveForm::begin([
                'id' => 'article-add-form',
                'options' => ['class' => 'form-horizontal'],
                'fieldConfig' => [
                    'template' => '{label}<div class="col-md-9">{input}</div>',
                    'labelOptions' => ['class' => 'control-label col-md-2']
                ],
            ]);
            ?>
            <div class="news-concise">
                <div class="news-thumb">
                    <img class="js_imgthumb img-thumb" src="">
                    <i class="img-thumb default">封面图片</i>
                </div>
                <div class="news-info">

                    <?= $form->field($model, 'title')->label('标题'); ?>

                    <?= $form->field($model, 'summary')->label('摘要'); ?>

                    <?= $form->field($model, 'sports_id')->label('运动类型')->dropDownList($sports); ?>
                </div>
            </div>
            <div class="news-content clearfix">
                <script id="editor" type="text/plain" style="width:1024px;height:500px;"></script>
            </div>
            <div class="form-group">
                <div class="col-md-9">
                    <?= Html::submitButton('提交', ['class' => 'btn btn-primary', 'name' => 'submit']) ?>
                </div>
            </div>
            <?php $form->end(); ?>
        </div>
    </div>
</div>
