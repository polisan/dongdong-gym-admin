<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\jui\DatePicker;

$this->title = '新增会员卡';

?>

<div class="homepage-main">
    <div class="container">
        <div class="col-menu">
            <?php require(dirname(__DIR__). '/default/nav_menu_sidebar.php'); ?>
        </div>
        <div class="col-main">
            <div class="content-box">
                <h3>新增会员卡</h3>
                <div class="mc">
                    <?php
                    $form = ActiveForm::begin([
                        'id' => 'membercars-add-form',
                        'options' => ['class' => 'form-horizontal'],
                        'fieldConfig' => [
                            'template' => '<div class="col-md-2">{label}</div><div class="col-md-9">{input}</div>',
                            'labelOptions' => ['class' => 'control-label'],
                        ],
                    ]);
                    ?>
                    <?= $form->field($model, 'name')->label('会员卡种类'); ?>

                    <div class="form-group">
                        <div class="col-md-2">
                            <label class="control-label">有效期</label>
                        </div>
                        <div class="col-md-9">
                            <?= DatePicker::widget([
                                'name'  => 'GymMembercard[start_at]',
                                'dateFormat' => 'yyyy-MM-dd',
                                'value'=> Date('Y-m-d'),
                                'options'=>array(
                                    'showAnim'=>'fold',
                                    'showOn'=>'both',
                                    'maxDate'=>'new Date()',
                                    'buttonImageOnly'=>true,
                                    'dateFormat'=>'yy-mm-dd',
                                    'class' => 'datepicker',
                                ),
                            ]); ?>
                            <span> 到 </span>
                            <?= DatePicker::widget([
                                'name'  => 'GymMembercard[expire_at]',
                                'dateFormat' => 'yyyy-MM-dd',
                                'value'=> Date('Y-m-d'),
                                'options'=>array(
                                    'showAnim'=>'fold',
                                    'showOn'=>'both',
                                    'buttonImageOnly'=>true,
                                    'dateFormat'=>'yy-mm-dd',
                                    'class' => 'datepicker',
                                ),
                            ]); ?>
                        </div>
                    </div>

                    <?= $form->field($model, 'description')->label('说明')->textarea(['rows' => 5, 'cols' => 20]); ?>

                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-9">
                            <?= Html::submitButton('提交', ['class' => 'btn btn-primary', 'name' => 'submit']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
