<?php

use yii\bootstrap\Modal;
use yii\bootstrap\Nav;
use yii\helpers\Html;
use yii\jui\Dialog;

$this->title = '场地详情';
// 模拟数据：场地种类，共有3类
$fieldCategory[1]['id'] = 1;
$fieldCategory[1]['name'] = '普通羽毛球场';
$fieldCategory[1]['sportType'] = 'tennis';
$fieldCategory[1]['quantity'] = 5;

$fieldCategory[2]['id'] = 2;
$fieldCategory[2]['name'] = 'VIP羽毛球场';
$fieldCategory[2]['sportType'] = 'tennis';
$fieldCategory[2]['quantity'] = 2;

$fieldCategory[3]['id'] = 3;
$fieldCategory[3]['name'] = '普通足球场';
$fieldCategory[3]['sportType'] = 'football';
$fieldCategory[3]['quantity'] = 3;
// 模拟数据：第一类场地,共5个
$field[1][0]['id'] = 1;
$field[1][0]['category'] = 1;
$field[1][0]['name'] = '1号场';
$field[1][1]['id'] = 2;
$field[1][1]['category'] = 1;
$field[1][1]['name'] = '2号场';
$field[1][2]['id'] = 3;
$field[1][2]['category'] = 1;
$field[1][2]['name'] = '3号场';
$field[1][3]['id'] = 4;
$field[1][3]['category'] = 1;
$field[1][3]['name'] = '4号场';
$field[1][4]['id'] = 5;
$field[1][4]['category'] = 1;
$field[1][4]['name'] = '5号场';
// 模拟数据：第2类场地,共2个
$field[2][0]['id'] = 6;
$field[2][0]['category'] = 2;
$field[2][0]['name'] = 'vip 1号';
$field[2][1]['id'] = 7;
$field[2][1]['category'] = 2;
$field[2][1]['name'] = 'vip 2号';
// 模拟数据：第3类场地,共3个
$field[3][0]['id'] = 8;
$field[3][0]['category'] = 3;
$field[3][0]['name'] = '西区';
$field[3][1]['id'] = 9;
$field[3][1]['category'] = 3;
$field[3][1]['name'] = '东区';
$field[3][2]['id'] = 10;
$field[3][2]['category'] = 3;
$field[3][2]['name'] = '南区1号';
?>

<div class="homepage-main">
    <div class="container">
        <div class="col-menu">
            <?php require(dirname(__DIR__). '/default/nav_menu_sidebar.php'); ?>
        </div>
        <div class="col-main">
            <div class="content-box">
                <h3>场地管理</h3>
                <div class="mc">
                    <?php
                    // 模拟该场馆下的场地运动类型. array类型，key为参数，value为标题
                    $sportType = array(
                        'all' => '全部场地',
                        'tennis' => '羽毛球场',
                        'football' => '足球场',
                    );
                    $menuItems = array();
                    if (!isset($_GET['ft']) || !array_key_exists($_GET['ft'], $sportType))
                        $ft = 'all';
                    else $ft = $_GET['ft'];

                    // 生成场地运动类型导航栏
                    foreach ($sportType as $fieldType => $name) {
                        if ($ft == $fieldType) {
                            $menuItems[] = array(
                                'label' => $name,
                                'url' => ['index', 'ft' => $fieldType],
                                'options' => ['class' => 'active'],
                            );
                        }
                        else {
                            $menuItems[] = array(
                                'label' => $name,
                                'url' => ['index', 'ft' => $fieldType],
                            );
                        }
                    }
                    echo Nav::widget([
                        'options' => ['class' => 'nav nav-tabs'],
                        'items' => $menuItems,
                    ]);
                    ?>
                    <div class="mc-body">
                        <div class="add-access"><?= Html::a('+ 增加场地类型', ['fields/add-field-category']) ?></div>
                        <div class="fc">
                            <?php
                            foreach ($fieldCategory as $id => $fc) {
                                ?>
                                <dl>
                                    <dt>
                                        <span><?= Html::tag('a', '编辑', ['href' => 'fields/edit-field-category',]) ?></span>
                                        <span><?= Html::tag('a', '删除', ['href' => 'fields/delete-field-category', 'query' => $id, 'class' => 'js_ajax', 'confirm' => '确定要删除']) ?></span>
                                        <h3> <?= $fc['name']; ?> </h3>
                                    </dt>
                                    <dd class="fc-detail">
                                        <ul>
                                            <li><label>当前数量：</label><?= $fc['quantity'] ?></li>
                                            <li><label>价格明细：</label><?= Html::tag('img', ''); ?></li>
                                        </ul>
                                    </dd>
                                    <dd class="fd-container">
                                        <ul class="fd-list">
                                            <?php foreach ($field[$id] as $fd) { ?>
                                                <li class="fd-item self">
                                                    <input type="checkbox" />
                                                    <h5 class="fd-name"><?= $fd['name'] ?></h5>
                                                    <h5 class="fd-status orange">营业中</h5>
                                                    <input type="hidden" value="<?= $fd['id'] ?>" class="fdid" />
                                                    <span class="fd-name-edit"><?= Html::tag('a', '修改', ['class' => 'js_editfield', 'href' => 'javascript:0;']) ?></span>
                                                </li>
                                            <?php  } ?>
                                            <li class="opr-regulation"><?= Html::tag('a', '+', ['class' => 'opr-mid js_addfield', 'href' => 'javascript:;']) ?></li>
                                            <li class="opr-confirm"><?= Html::tag('a', 'Yes', ['class' => 'opr-mid js_delsubmit', 'href' => 'javascript:;']) ?></li>
                                            <li class="opr-regulation"><?= Html::tag('a', '-', ['class' => 'opr-mid js_delfield', 'href' => 'javascript:;']) ?></li>
                                            <li class="opr-confirm"><?= Html::tag('a', 'No', ['class' => 'opr-mid js_delcancel', 'href' => 'javascript:;']) ?></li>
                                        </ul>
                                    </dd>
                                </dl>
                            <?php } ?>
                            <dl>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= Modal::widget([
    'header' => '<h5 style="color:#000;">场地名字</h5>',
    'toggleButton' => ['id' => 'showModal', 'style' => 'display:none;'],
])?>

<?= Dialog::widget([
    'clientOptions' => [
        'modal' => true,
        'autoOpen' => false,
    ],
    'options' => [
        'id' => 'confirmDialog'
    ]
]);
