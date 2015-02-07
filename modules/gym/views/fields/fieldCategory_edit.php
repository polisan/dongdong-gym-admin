<?php
use app\models\Sports;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = '新增场地';
$priceTablePrice = [
    'general' => '正常',
    'special' => '特殊日期',
];
?>

<div class="homepage-main">
    <div class="container">
        <div class="col-menu">
            <?php require(dirname(__DIR__). '/default/nav_menu_sidebar.php'); ?>
        </div>
        <div class="col-main">
            <div class="content-box">
                <h3>场地类型修改</h3>
                <div class="mc">
                    <div class="mc-body">
                        <?php
                        $form = ActiveForm::begin([
                            'id' => 'fc-edit-form',
                            'options' => ['class' => 'form-horizontal'],
                            'fieldConfig' => [
                                'template' => '<div class="col-md-2">{label}</div><div class="col-md-3">{input}</div>',
                                'labelOptions' => ['class' => 'control-label'],
                            ],
                        ]);
                        $sports = Sports::listAll();
                        ?>
                        <?= $form->field($model, 'name')->label('场地类型名字')->hint('方便场地集中管理') ?>

                        <?= $form->field($model, 'sports_id')->label('运动类型')
                            ->dropDownList($sports) ?>

                        <?= $form->field($model, 'quantity')->label('场地数量') ?>

                        <div class="form-group">
                            <div class="col-md-2">
                                <label class="control-label">价格表</label>
                            </div>
                            <div class="col-md-7">
                                <!--                                 价格表样式未做好，暂时不传输-->
                            </div>
                        </div>
                        <div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-9">
                                <?= Html::submitButton('提交', ['class' => 'btn btn-primary', 'name' => 'submit']) ?>
                            </div>
                        </div>

                        <?php $form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
