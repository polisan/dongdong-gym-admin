<?php
use yii\helpers\Html;

$this->title = '邮箱修改';
?>

<div>
    <div class="container">
        <div class="col-menu">
            <?php require('nav_menu_sidebar.php'); ?>
        </div>
        <div class="col-main">
            <div class="content-box">
                <h3>邮箱修改</h3>
                <div class="mc">
                    <div class="mc-body">
                        <div class="step-update">
                            <dl class="first <?php if($_POST['update']== 1) echo 'doing'; else echo 'done'; ?>">
                                <dt class="step-num">1</dt>
                                <dd class="step-text">身份验证</dd>
                            </dl>
                            <dl class="second <?php if($_POST['update'] == 2 || $_POST['update'] == 3 ) echo 'doing'; else if($_POST['update'] > 3) echo 'done'; ?>">
                                <dt class="step-num">2</dt>
                                <dd class="step-text">修改邮箱</dd>
                            </dl>
                            <dl class="three <?php if($_POST['update']== 4) echo 'doing'; ?>">
                                <dt class="step-num">3</dt>
                                <dd class="step-text">完成</dd>
                            </dl>
                        </div>
                        <div class="step-form">
                            <?= Html::beginForm('updatemail'); ?>
                            <?= Html::input('hidden', 'update', $_POST['update']); ?>
                            <?php
                            switch ($_POST['update']) {
                                case 1:
                                    echo Html::label('旧邮箱地址');
                                    echo Html::input('text', 'oldMail', '', ['id' => 'old-name']);
                                    echo Html::submitButton('提交', ['class' => 'btn btn-primary', 'name' => 'submit']);
                                    break;
                                case 2:
                                    echo Html::beginTag('div', ['class' => '']);
                                    echo Html::label('我的邮箱地址');
                                    echo Html::input('text', 'NewMail', '', ['id' => 'old-name']);
                                    echo '</div><div>';
                                    echo Html::label('验证码');
                                    echo \yii\captcha\Captcha::widget([
                                        'name' => 'UpdateMainForm[verifyCode]',
                                        'template' => '{input}{image}'.Html::tag('a', '换一张' , ['id' => 'link-captcha-change']),
                                        'options' => [ 'class' => 'form-control' ,'style' => 'display: inline-block; width:40%;margin-right:10px;'],
                                        'imageOptions' => ['id' => 'captcha-img' ,'alt' => '验证码'],
                                        'captchaAction' => '/support/captcha']);
                                    echo Html::endTag('div');
                                    echo Html::submitButton('提交', ['class' => 'btn btn-primary', 'name' => 'submit']);
                                    break;
                                case 3:
                                    echo Html::tag('p');
                                    echo '已发送验证邮件：*****@gmail.com';
                                    echo Html::endTag('p');
                                    echo '验证邮件24小时内有效，请尽快登录您的邮箱';
                                    echo Html::submitButton('查看验证邮件', ['class' => 'btn btn-danger', 'name' => 'submit']);
                                    break;
                            }
                            ?>
                            <?= Html::endForm(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
