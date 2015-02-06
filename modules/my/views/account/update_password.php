<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '密码修改';
?>

<div>
    <div class="container">
        <div class="col-menu">
            <?php require('nav_menu_sidebar.php'); ?>
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
                                'template' => '<div class="col-md-3">{label}</div><div class="col-md-7">{input}</div><div>{error}</div>',
                                'labelOptions' => ['class' => 'control-label'],
                            ],
                        ]);
                        ?>

                        <?= $form->field($model, 'oldPassword')->label('旧密码')->passwordInput() ?>

                        <?= $form->field($model, 'password')->label('新密码')->passwordInput() ?>

                        <?= $form->field($model, 'verifyPassword')->label('确认密码')->passwordInput() ?>

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
