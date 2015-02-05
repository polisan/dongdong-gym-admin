<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

class UpdatePasswordForm extends \yii\base\Model
{
    public $oldPassword;
    public $newPassword;
    public $passwordRepeat;

}

$this->title = '密码修改';
$model = new UpdatePasswordForm();
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
                <h3>密码修改</h3>
                <div class="mc">
                    <div class="mc-body">
                        <?php
                        $form = ActiveForm::begin([
                            'id' => 'updatepassword-form',
                            'options' => ['class' => 'form-horizontal'],
                            'fieldConfig' => [
                                'template' => '<div class="col-md-3">{label}</div><div class="col-md-9">{input}</div>',
                                'labelOptions' => ['class' => 'control-label'],
                            ],
                        ]);
                        ?>

                        <?= $form->field($model, 'oldPassword')->label('旧密码') ?>

                        <?= $form->field($model, 'newPassword')->label('新密码')->passwordInput()->hint('最短6位，区分大小写') ?>

                        <?= $form->field($model, 'passwordRepeat')->label('确认密码')->passwordInput()->hint('再次输入密码') ?>

                        <div class="form-group">
                            <span class="col-md-offset-3">
                                <?= Html::submitButton('提交', ['class' => 'btn btn-primary', 'name' => 'submit']) ?>
                            </span>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
