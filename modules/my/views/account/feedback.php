<?php
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;

class FeedBackForm extends \yii\base\Model
{
    public $content;
    public $captchaCode;
}

$this->title = '吐槽反馈';
$model = new FeedBackForm();
?>

<div>
    <div class="container">
        <div class="col-menu">
            <?php require('nav_menu_sidebar.php'); ?>
        </div>
        <div class="col-main">
            <div class="content-box">
                <h3>吐槽反馈</h3>
                <div class="mc">
                    <div class="mc-body">
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
                        <?= $form->field($model, 'content')->label('感谢您的意见：')->textarea(['cols' => 20, 'rows' => 8]); ?>

                        <?= $form->field($model, 'captchaCode')->label('')
                            ->widget(Captcha::className(),
                                ['template' => '{input}{image}'.Html::tag('a', '换一张' , ['id' => 'link-captcha-change']),
                                    'options' => [ 'class' => 'form-control' ,'style' => 'display: inline-block; width:40%;margin-right:10px;'],
                                    'imageOptions' => ['id' => 'captcha-img' ,'alt' => '验证码'],
                                    'captchaAction' => '/support/captcha']);
                        ?>
                        <div class="form-group">
                            <span class="col-md-offset-4">
                                <?= Html::submitButton('提交', ['class' => 'btn btn-primary', 'name' => 'submit']);?>
                            </span>
                        </div>

                        <?php $form::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
