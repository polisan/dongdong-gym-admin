<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

class UpdateAttestForm extends \yii\base\Model
{
    public $oldName;
    public $verifyCode;
    public $newName;
    public $newAttestephone;
}

$this->title = '修改认证';
$model = new UpdateAttestForm();
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
                <h3>电话修改</h3>
                <div class="mc">
                    <div class="mc-body">
                        <div class="step-update">
                            <dl class="first <?php if($_POST['updateAttest']== 1) echo 'doing'; else echo 'done'; ?>">
                                <dt class="step-num">1</dt>
                                <dd class="step-text">身份验证</dd>
                            </dl>
                            <dl class="second <?php if($_POST['updateAttest'] == 2) echo 'doing'; else if($_POST['updateAttest']>2) echo 'done'; ?>">
                                <dt class="step-num">2</dt>
                                <dd class="step-text">重新认证</dd>
                            </dl>
                            <dl class="three <?php if($_POST['updateAttest']== 3) echo 'doing'; ?>">
                                <dt class="step-num">3</dt>
                                <dd class="step-text">完成</dd>
                            </dl>
                        </div>
                        <?php
                        $form = ActiveForm::begin([
                            'id' => 'updateAttesttelephone-form',
                            'options' => ['class' => 'form-horizontal'],
                            'fieldConfig' => [
                                'template' => '<div class="col-md-3">{label}</div><div class="col-md-9">{input}</div>',
                                'labelOptions' => ['class' => 'control-label'],
                            ],
                        ]);
                        ?>
                        <?= Html::input('hidden', 'updateAttest', $_POST['updateAttest']); ?>

                        <?php
                        switch ($_POST['updateAttest']) {
                            case 1:
                                echo "<div><label>已验证信息:</label><strong>陈**</strong><span>157***0739</span></div>";
                                echo $form->field($model, 'oldName')->label('填写旧的联系人');
                                echo $form->field($model, 'verifyCode')->label('填写手机验证码');
                                echo Html::button('获取短信验证码', ['class' => 'btn btn-default']);
                                echo Html::submitButton('提交', ['class' => 'btn btn-primary', 'name' => 'submit']);
                                break;
                            case 2:
                                echo $form->field($model, 'newName')->label('新的联系人');
                                echo $form->field($model, 'newAttestephone')->label('填写新的手机号');
                                echo Html::submitButton('提交', ['class' => 'btn btn-primary', 'name' => 'submit']);
                                break;
                            case 3:
                                echo Html::tag('div');
                                echo '认证信息已成功修改，正在审核';
                                echo Html::endTag('div');
                                break;
                        }
                        ?>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
