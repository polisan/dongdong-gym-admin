<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = '登录';
?>
<div id="content">
    <div class="container">
        <div id="login-frame">
            <?php
            $form = ActiveForm::begin( [
                'id' => 'login-form',
                'options' => ['class' => 'form-horizontal'],
                'fieldConfig' => [
                    'template' => '<div class="col-md-3">{label}</div><div class="col-md-9">{input}</div>',
                    'labelOptions' => ['class' => 'control-label'],
                ],
            ]);
            ?>
            <div class="col-md-12" id="login-tips">
                <i class="icon-msg-mini warning col-md-offset-3"></i>
                密码输入错误
            </div>

            <?= $form->field($model, 'username')->label('用户名:'); ?>

            <?= $form->field($model, 'password')->label('密码:')->passwordInput() ?>

            <?= $form->field($model, 'verifyCode')->label('验证码:')
                ->widget(Captcha::className(),
                    ['template' => '{input}{image}'.Html::tag('a', '换一张' , ['id' => 'link-captcha-change']),
                        'options' => [ 'class' => 'form-control' ,'style' => 'display: inline-block; width:40%;margin-right:10px;'],
                        'imageOptions' => ['id' => 'captcha-img' ,'alt' => '验证码'],
                        'captchaAction' => '/support/captcha']);
            ?>

            <?= $form->field($model, 'rememberMe', [
                'template' => '<div class="checkbox col-md-6 col-md-offset-3">{label}</div>',
            ])->label('一周内自动登录', ['style' => 'margin-left: 14px;'])->checkbox(['labelOption'=>'col-md-offset-3']) ?>

            <div class="form-group">
                <div class="col-md-offset-3 col-md-9">
                    <?= Html::submitButton('', ['class' => 'login-button', 'name' => 'submit']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

