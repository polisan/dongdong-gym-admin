<?php
use app\models\Sports;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\jui\DatePicker;

$this->title = '新增场地';
$priceTableType = [
    'general' => '正常',
    'special' => '特殊日期',
];
$weekdays = [
    'Mon' => '星期一',
    'Tues' => '星期二',
    'Wed' => '星期三',
    'Thur' => '星期四',
    'Fri' => '星期五',
    'Sat' => '星期六',
    'Sum' => '星期日',
];
?>

<div class="homepage-main">
    <div class="container">
        <div class="col-menu">
            <?php require(dirname(__DIR__). '/default/nav_menu_sidebar.php'); ?>
        </div>
        <div class="col-main">
            <div class="content-box">
                <h3>新增场地类型</h3>
                <div class="mc">
                    <div class="mc-body">
                        <?php
                        $form = ActiveForm::begin([
                            'id' => 'fc-add-form',
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
                                <?= Html::radioList('priceType', 'general', $priceTableType, ['class' => 'js_pricetype']); ?>
                            </div>
                        </div>
                        <div id="js_ptgeneral" class="form-group">
                            <ul class="col-md-12 fd-gen-timetable">
                                <li class="time-item">
                                    <h5 class="title">时间段: </h5>
                                    <?= Html::dropDownList('AddFieldcategoryForm[0][time-sel]', 'mon', $weekdays, ['class' => 'time-sel']); ?>
                                    <span class="clockpicker"> <input type="text" name="AddFieldcategoryForm[0][time][start]" value="09:30">
                                    </span>
                                    <strong> 到 </strong>
                                    <span class="clockpicker">
                                        <input type="text" name="AddFieldcategoryForm[0][time][end]" value="21:30">
                                    </span>
                                    <div class="charge col-md-offset-2">
                                        <label class="charge-type" >收费方式</label>
                                        <select name="AddFieldcategoryForm[0][charge]">
                                            <option value="1">按小时收费</option>
                                            <option value="2">按次收费</option>
                                        </select>
                                        <input type="text" name="AddFieldcategoryForm[0][pricenum]" placeholder="0" /> 元
                                    </div>
                                </li>
                                <li class="addtime js_addtime"><?= Html::tag('a', '增加时间段', ['href' => 'javascript:void(0);']) ?> </li>
                            </ul>
                        </div>

                        <div id="js_ptspecial" class="form-group">
                            <ul class="col-md-12 fd-special-timetable">
                                <li class="time-item">
                                    <h5 class="title">时间段: </h5>
                                    <?= DatePicker::widget([
                                        'name'  => 'from_date',
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
                                    <span class="clockpicker">
                                        <input type="text" name="AddFieldcategoryForm[time][1][start]" value="09:30">
                                    </span>
                                    <strong> 到 </strong>
                                    <span class="clockpicker">
                                        <input type="text" name="AddFieldcategoryForm[time][1][start]" value="09:30">
                                    </span>
                                     <div class="charge col-md-offset-2">
                                        <label class="charge-type" >收费方式</label>
                                        <select name="AddFieldcategoryForm[0][charge]">
                                            <option value="1">按小时收费</option>
                                            <option value="2">按次收费</option>
                                        </select>
                                        <input type="text" name="AddFieldcategory[0][pricenum]" placeholder="0" /> 元
                                    </div>
                                </li>
                                <li class="addtime js_addtime"><?= Html::tag('a', '增加时间段', ['href' => 'javascript:void(0);']) ?></li>
                            </ul>
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
