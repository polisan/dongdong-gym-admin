<?php
use yii\bootstrap\Nav;
use yii\helpers\Html;

$this->title = '隐私设置';
?>

<div>
    <div class="container">
        <div class="col-menu">
            <div class="menu-box-home">
                <span class="menu-box-title"> </span>
                <ul class="menu">
                    <li><?= Html::a("账号管理", ['profile']); ?></li>
                    <li><?= Html::a("安全设置", ['security']); ?></li>
                    <li><?= Html::a("场馆认证", ['']); ?></li>
                    <li><?= Html::a("吐槽反馈", ['']); ?></li>
                </ul>
            </div>
        </div>
        <div class="col-main">
            <div class="content-box">
                <h3>账号管理</h3>
                <div class="mc">
                    <?= Nav::widget([
                        'items' => [
                            [
                                'label' => '账号详情',
                                'url' => ['profile'],
                            ],
                            [
                                'label' => '隐私设置',
                                'url' => ['#'],
                                'options' => ['class' => 'active '],

                            ]
                        ],
                        'options' => ['class' => 'nav nav-tabs']
                    ]) ?>

                    <?php
                    $tip_content = array(
                        'interest_gym' => '关注我的场馆',
                        'comment_gym' => '评论我的场馆',
                        'comment_news' => '评论我的资讯',
                        'like_news' => '赞了我的资讯',
                        'comment_activity' => '评论我发起的活动',
                        'attend_activity' => '报名我发起的活动',
                        'like_activity' => '感兴趣我发起的活动',
                    );
                    $watermark = array(
                        'no_watermark' => '不使用水印',
                        'gym_name' => '场馆名称',
                        'account_name' => '用户昵称',
                    );

                    ?>
                    <div class="mc-body">
                        <dl>
                            <dt>消息提醒</dt>
                            <dd>
                                <?= Html::checkboxList('messageRemind','', $tip_content) ?>
                            </dd>
                            <dt>图片水印</dt>
                            <dd>
                                    <?= Html::checkboxList('waterMark','', $watermark) ?>
                                    <img width="250" height="360" src="#" />
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
