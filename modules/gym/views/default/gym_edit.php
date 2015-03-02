<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Button;

$this->title = '场馆编辑';

?>
<div class="container">
    <div class="col-menu">
        <?php require(dirname(__DIR__). '/default/nav_menu_sidebar.php'); ?>
    </div>
    <div class="col-main">
        <div class="gym-add-frame">
            <?php
            $form = ActiveForm::begin([
                'id' => 'gym-add-form',
                'options' => ['class' => 'form-horizontal'],
                'fieldConfig' => [
                    'template' => '<div class="col-md-2">{label}</div><div class="col-md-9">{input}</div>',
                    'labelOptions' => ['class' => 'control-label'],
                ],
            ]);
            ?>

            <?= $form->field($model, 'name')->label('场馆名字')->hint('名字可以帮助人们找到你') ?>

            <div class="form-group">
                <div class="col-md-2">
                    <label class="control-label PR0" for="opentime">营业时间</label>
                </div>
                <div class="col-md-9">
                    <div class="input-group clockpicker">
                        开始时间:
                        <input type="text" name='begin_time' class="form-control" value="09:30">
                    </div>
                    <strong>&nbsp;&nbsp;</strong>
                    <div class="input-group clockpicker">
                        结束时间:
                        <input type="text" name='end_time' class="form-control" value="09:30">
                    </div>
                </div>
            </div>

            <?= $form->field($model, 'contact')->label('联系方式')->hint('11位数字') ?>

            <div class="form-group required">
                <div class="col-md-2">
                    <label class="control-label PR0">场馆地点</label>
                </div>
                <div class="col-md-9">
                    <?php
                    echo Html::dropDownList('province', 0, $provinces);
                    echo "&nbsp;";

                    $citys = array(0 => '请选择城市');
                    echo Html::dropDownList('city', 0, $citys);
                    echo "&nbsp;";

                    $county = array(0 => '请选择区域');
                    echo Html::dropDownList('county', 0, $county);
                    ?>
                    <p></p>
                    <div class="">
                        <?= Html::activeInput('text', $model, 'location', ['class' => 'form-control']); ?>
                    </div>
                </div>
            </div>

            <?php
            $allSports = $model->getAllSports();
            echo $form->field($model, 'sports')->label('营业项目')->hint('最多选择3个')
                ->inline()
                ->checkboxList($allSports, [
                    'template'    => '<div class="col-md-2">{label}</div><div class="col-md-9">{input}{hint}</div><div>{error}</div>',
                    'itemOptions' => ['labelOptions'=> ['class' => 'sports-checkboxlist-inline'] ],
                    'encode'      => true,
                ]);

            echo $form->field($model, 'wechat')->label('微信公共号');

            $isSupport = array('支持', '不支持');
            echo $form->field($model, 'support_membercard', [
                'template' => '<div class="col-md-2">{label}</div><div class="col-md-2">{input}</div>'
            ])->label('支持会员')->dropDownList($isSupport);

            ?>

            <?= $form->field($model, 'description')->label('场馆介绍')->textarea([ 'rows' => '5', 'cols' => '20' ]); ?>

            <div class="form-group">
                <div class="col-md-offset-3 col-md-9">
                    <?= Html::submitButton('提交', ['class' => 'btn btn-primary', 'name' => 'submit']) ?>
                </div>
            </div>

            <?php $form->end(); ?>
        </div>
    </div>
</div>
