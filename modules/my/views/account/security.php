<?php
use yii\helpers\Html;

$this->title = '安全设置';

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
                <h3>安全设置</h3>
                <div class="mc">
                    <div class="mc-body">
                        <div class="account">
                            <?= Html::img('/dongdong/images/gym-logo.jpg', ['alt' => '头像', 'class' => 'portrait']) ?>
                            <div class="account-meta account-info">
                                <h3 class="nick-name">
                                    <?= Html::a(Yii::$app->user->identity->username, ['profile']) ?>
                                </h3>
                                <span class="history-login">上次登录:&nbsp;&nbsp;2015年01月08日 22:01 </span>
                            </div>
                        </div>
                        <ul class="safe-list">
                            <li class="safe-item">
                                <dl>
                                    <dt class="title">邮箱绑定</dt>
                                    <?php
                                    if (1) {
                                    ?>
                                    <dd class="detail">fi**163.com</dd>
                                    <dd class="opr"><?= Html::a('更改', ['updatemail']) ?></dd>
                                    <?php
                                    } else {
                                    ?>
                                        <dd class="detail">你还未绑定邮箱</dd>
                                        <dd class="opr"><?= Html::a('绑定', ['bindmail']) ?></dd>
                                    <?php } ?>
                                </dl>
                            </li>
                        </ul>
                        <ul class="safe-list">
                            <li class="safe-item">
                                <dl>
                                    <dt class="title">密码修改</dt>
                                    <dd class="opr"><?= Html::a('更改', ['/my/account/update-password']) ?></dd>
                                </dl>
                            </li>
                        </ul>
                        <ul class="safe-list">
                            <li class="safe-item">
                                <dl>
                                    <dt class="title">手机绑定</dt>
                                    <?php
                                    if (1) {
                                        ?>
                                        <dd class="detail">157****0739</dd>
                                        <dd class="opr"><?= Html::a('更改', ['updatetelephone']) ?></dd>
                                    <?php
                                    } else {
                                        ?>
                                        <dd class="detail">未绑定</dd>
                                        <dd class="opr"><?= Html::a('绑定', ['#']) ?></dd>
                                    <?php } ?>
                                </dl>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
