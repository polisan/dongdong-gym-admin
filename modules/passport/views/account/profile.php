<?php
use yii\bootstrap\Nav;
use yii\helpers\Html;

$this->title = '账号设置';
?>

<div>
    <div class="container">
        <div class="col-menu">
            <div class="menu-box-home">
                <span class="menu-box-title"> </span>
                <ul class="menu">
                    <li><?= Html::a("账号管理", ['profile']); ?></li>
                    <li><?= Html::a("安全设置", ['']); ?></li>
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
                                'url' => ['#'],
                                'options' => ['class' => 'active '],
                            ],
                            [
                                'label' => '隐私设置',
                                'url' => ['privacy'],

                            ]
                        ],
                        'options' => ['class' => 'nav nav-tabs']
                    ]) ?>


                    <div class="mc-body">
                        <dl class="mc-info">
                            <dd class="mc-item">
                                <span class="item-label">头像</span>
                                <span class="item-info"><img src="."></span>
                                <span class="item-op"><?= Html::a('编辑', ['#']) ?></span>
                            </dd>
                            <dd class="mc-item">
                                <span class="item-label">昵称</span>
                                <span class="item-info">热力</span>
                                <span class="item-op"><?= Html::a('编辑', ['#']) ?></span>
                            </dd>
                            <dd class="mc-item">
                                <span class="item-label">登录邮箱</span>
                                <span class="item-info">fir***@163.com</span>
                                <span class="item-op"><?= Html::a('更换邮箱', ['#']) ?></span>
                            </dd>
                            <dd class="mc-item">
                                <span class="item-label">认证信息</span>
                                <?php
                                if (1) {
                                ?>
                                    <span class="item-info">未认证</span>
                                    <span class="item-op"><?= Html::a('认证申请', ['#']) ?></span>
                                <?php
                                } else {
                                ?>
                                    <span class="item-info">陈**</span>
                                    <span class="item-op"><?= Html::a('详情', ['#']) ?></span>
                                <?php } ?>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
