<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

class UpdateTelephoneForm extends \yii\base\Model
{
    public $verifyCode;
    public $newPhoneNumber;
}

$this->title = '电话修改';
$model = new UpdateTelephoneForm();
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
                            <dl class="first <?php if($_POST['updateTel']== 1) echo 'doing'; else echo 'done'; ?>">
                                <dt class="step-num">1</dt>
                                <dd class="step-text">手机验证</dd>
                            </dl>
                            <dl class="second <?php if($_POST['updateTel'] == 2) echo 'doing'; else if($_POST['updateTel']>2) echo 'done'; ?>">
                                <dt class="step-num">2</dt>
                                <dd class="step-text">修改已验证手机</dd>
                            </dl>
                            <dl class="three <?php if($_POST['updateTel']== 3) echo 'doing'; ?>">
                                <dt class="step-num">3</dt>
                                <dd class="step-text">完成</dd>
                            </dl>
                        </div>
                        <?php
                        $form = ActiveForm::begin([
                            'id' => 'updateTeltelephone-form',
                            'options' => ['class' => 'form-horizontal'],
                            'fieldConfig' => [
                                'template' => '<div class="col-md-3">{label}</div><div class="col-md-9">{input}</div>',
                                'labelOptions' => ['class' => 'control-label'],
                            ],
                        ]);
                        ?>
                        <?= Html::input('hidden', 'updateTel', $_POST['updateTel']); ?>

                        <?php
                        switch ($_POST['updateTel']) {
                            case 1:
                                echo "<div><label>已验证手机</label><span>157***0739</span></div>";
                                echo $form->field($model, 'verifyCode')->label('填写手机验证码');
                                echo Html::button('获取短信验证码', ['class' => 'btn btn-default']);
                                echo Html::submitButton('提交', ['class' => 'btn btn-primary', 'name' => 'submit']);
                                break;
                            case 2:
                                echo $form->field($model, 'newPhoneNumber')->label('我的手机号码');
                                echo $form->field($model, 'verifyCode')->label('填写手机验证码');
                                echo Html::button('获取短信验证码', ['class' => 'btn btn-default']);
                                echo Html::submitButton('提交', ['class' => 'btn btn-primary', 'name' => 'submit']);
                                break;
                            case 3:
                                echo Html::tag('div');
                                echo '恭喜您，手机绑定修改成功';
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
