<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Button;

$this->title = "查看场馆";

?>
<div class="container">
    <div class="col-menu">
        <div class="menu-box-home">
            <span class="menu-box-title"> </span>
            <ul class="menu">
                <li><?= Html::a("查看场馆", ['/']); ?></li>
                <li><?= Html::a("场地管理", ['/gym/fields']); ?></li>
                <li><?= Html::a("教练管理", ['/gym/coaches']); ?></li>
                <li><?= Html::a("课程管理", ['/gym/courses']); ?></li>
                <li><?= Html::a("会员卡管理", ['/gym/members']); ?></li>
            </ul>
        </div>
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
                        <input type="text" class="form-control" value="09:30">
                    </div>
                    <strong>&nbsp;&nbsp;</strong>
                    <div class="input-group clockpicker">
                        结束时间:
                        <input type="text" class="form-control" value="09:30">
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
                    $provinces = [
                        'Beijing' => '北京',
                        'Shanghai' => '上海',
                        'Tianjin' => '天津',
                        'Zhejiang' => '浙江',
                    ];
                    echo Html::dropDownList('province', 'Zhejiang', $provinces);
                    echo "&nbsp;";

                    $citys = array(0 => '请选择城市');
                    echo Html::dropDownList('city', 0, $citys);
                    echo "&nbsp;";

                    $districts = array(0 => '请选择区域');
                    echo Html::dropDownList('district', 0, $districts);
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

            <div class="form-group required">
                <div class="col-md-2">
                    <label class="control-label PR0">场馆Logo</label>
                </div>
                <div class="col-md-2">
                    <?= Button::widget([
                        'label' => '上传图片',
                        'options' => ['class' => 'btn btn-lg icon-btn-upload']
                    ]) ?>
                </div>
                <div class="col-md-7">
                    <?= Html::img('', ['alt'=> 'logo']) ?>
                </div>
            </div>
            <?= $form->field($model, 'description')->label('场馆介绍')->textarea([ 'rows' => '5', 'cols' => '20' ]); ?>
        </div>
    </div>
</div>
