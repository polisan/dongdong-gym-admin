<?php
use app\models\Sports;
use yii\bootstrap\ActiveForm;

$this->title = '新增场地';
?>

<div class="homepage-main">
    <div class="container">
        <div class="col-menu">
            <?php require(dirname(__DIR__). '/default/nav_menu_sidebar.php'); ?>
        </div>
        <div class="col-main">
            <div class="content-box">
                <h3>新增场地</h3>
                <div class="mc">
                    <div class="mc-body">
                        <?php
                        $form = ActiveForm::begin([
                            'id' => 'fc-add-form',
                            'options' => ['class' => 'form-horizontal'],
                            'fieldConfig' => [
                                'template' => '<div class="col-md-2">{label}</div><div class="col-md-9">{input}</div>',
                                'labelOptions' => ['class' => 'control-label'],
                            ],
                        ]);
                        $sports = Sports::listAll();
                        ?>
                        <?= $form->field($model, 'name')->label('场地类型名字')->hint('方便场地集中管理') ?>

                        <?= $form->field($model, 'sports_id')->label('运动类型')
                            ->dropDownList($sports) ?>

                        <?= $form->field($model, 'quantity')->label('场地数量') ?>

                        <?php $form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
