<?php
use yii\helpers\Html;

$this->title = '邮箱绑定';
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
                    <li><?= Html::a("吐槽反馈", ['feedback']); ?></li>
                </ul>
            </div>
        </div>
        <div class="col-main">
            <div class="content-box">
                <h3>邮箱绑定</h3>
                <div class="mc">
                    <div class="mc-body">
                        <?= Html::beginForm('bindmail', 'post', ['class' => '']); ?>
                        <?= Html::label('你所绑定的邮箱地址'); ?>
                        <?= Html::input('text', 'Name', '', ['id' => 'old-name']); ?>
                        <?= Html::submitButton('提交', ['class' => 'btn btn-primary', 'name' => 'submit']); ?>
                        <?= Html::endForm(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
