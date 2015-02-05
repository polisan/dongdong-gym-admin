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
                    <li><?= Html::a("安全设置", ['security']); ?></li>
                    <li><?= Html::a("场馆认证", ['']); ?></li>
                    <li><?= Html::a("吐槽反馈", ['feedback']); ?></li>
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
                                <span class="item-info"><?= Html::img('/dongdong/images/avatar.png', ['alt' => '动动场馆']) ?></span>
                                <span class="item-op">
                                    <input id="fToUpload" type="file" size="45" name="fileToUpload" class="input">
                                    <?= Html::a('选择头像', null , ['id' => 'btn-avatar-edit']) ?>
                                </span>
                            </dd>
                            <dd class="mc-item">
                                <span class="item-label">用户名</span>
                                <span class="item-info" id="nickname"><?= Yii::$app->user->identity->username ?></span>
                                <input class="item-info text" id="nickname-edit" value="热力" style="display:none;" />
                                <span class="item-op"><?= Html::button('更改用户名', ['id' => 'btn-nickname-edit']) ?></span>
                                <span class="item-op"><?= Html::button('确认更改', ['id' => 'btn-nickname-change', 'style' => 'display:none;']) ?></span>
                            </dd>
                            <dd class="mc-item">
                                <span class="item-label">登录邮箱</span>
                                <?php if (1) {
                                    ?>
                                    <span class="item-info"><?= Yii::$app->user->identity->email ?></span>
                                    <span class="item-op"><?= Html::a('更换邮箱', ['updateMail']) ?></span>
                                <?php } else { ?>
                                    <span class="item-info">你还未绑定邮箱</span>
                                    <span class="item-op"><?= Html::a('绑定邮箱', ['bindmail']) ?></span>
                                <?php } ?>
                            </dd>
                            <dd class="mc-item">
                                <span class="item-label">认证信息</span>
                                <?php
                                if (1) {
                                ?>
                                    <span class="item-info">未认证</span>
                                    <span class="item-op"><?= Html::a('认证申请', ['accountattest']) ?></span>
                                <?php
                                } else {
                                ?>
                                    <span class="item-info"><p>陈**</p><p>157***80739</p></span>
                                    <span class="item-op"><?= Html::a('详情', ['attestdetail']) ?></span>
                                <?php } ?>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
