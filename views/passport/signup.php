<?php
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;

$this->title = '注册';
?>
<div class="content">
    <div class="container">
        <div class="reg-frame">
            <?php
            $form = ActiveForm::begin( [
                'id' => 'reg-form',
                'options' => ['class' => 'form-horizontal'],
                'fieldConfig' => [
                    'template' => '{label}<div class="col-md-7">{input}{hint}</div><div>{error}</div>',
                    'labelOptions' => ['class' => 'col-md-2 control-label', 'style' => 'padding-right:0px;'],
//                    'errorOptions' => ['tag' => 'div','class'=> 'col-md-2 help-block' ],
                    'hintOptions' => ['tag' => 'span', 'class'=> 'help-block reg-hint'],
                ],
            ]);
            ?>
            <div id="reg-tips">
                <i class="icon-msg-mini info col-md-offset-2"></i>
                每个邮箱只能注册一个账号
            </div>
            <?= $form->field($model, 'username')->label('用户名') ?>

            <?= $form->field($model, 'email')->label('邮箱') ?>

            <?= $form->field($model, 'password')->label('密码')->passwordInput()->hint('最短6位，区分大小写') ?>

            <?= $form->field($model, 'passwordRepeat')->label('确认密码')->passwordInput()->hint('再次输入密码') ?>

            <?= $form->field($model, 'verifyCode')->label('验证码')->Widget(Captcha::className(),
                ['template' => '{input}{image}'.Html::tag('a', '换一张' , ['id' => 'link-captcha-change']),
                    'options' => [ 'class' => 'form-control verify-code'],
                    'imageOptions' => ['id' => 'captcha-img', 'alt' => '验证码'],
                    'captchaAction' => 'passport/captcha'])
            ?>

            <?= $form->field($model, 'isAgree')
                     ->label('我同意并遵守', ['class' => 'control-label col-md-offset-2'])
                     ->checkbox([
                    'template' => '<div class="checkbox">{beginLabel}{input}{labelTitle}{endLabel}<a href="#">《动动场馆服务协议》</a></div>' ]);
            ?>

            <div class="form-group">
                <span class="col-md-offset-3">
                    <?= Html::submitButton('', ['class' => 'reg-button', 'name' => 'submit']) ?>
                </span>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="reg-step">
            <span class="separator">
            </span>
            <div class="reg-step-info">
                注册步骤
                <ul>
                    <li class="active">邮箱注册</li>
                    <li>邮箱验证</li>
                    <li>信息填写</li>
                    <li>完成</li>
                </ul>
            </div>
        </div>
    </div>

</div>