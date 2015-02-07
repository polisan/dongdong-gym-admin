<?php
use yii\bootstrap\Nav;
use yii\helpers\Html;
use yii\jui\Dialog;

$this->title = '课程列表';

// 模拟数据
$courses[1]['id'] = 1;
$courses[1]['name'] = '摩登舞';
$courses[1]['times'] = 8;
$courses[1]['prices'] = 1000;
$courses[1]['description'] = '一种带有阿拉伯风格的舞蹈形式，有助于减肥';

?>

<div class="homepage-main">
    <div class="container">
        <div class="col-menu">
            <?php require(dirname(__DIR__). '/default/nav_menu_sidebar.php'); ?>
        </div>
        <div class="col-main">
            <div class="content-box">
                <h3>课程管理</h3>
                <div class="mc">
                    <?= Nav::widget([
                        'items' => [
                            [
                                'label' => '课程表',
                                'url' => ['index'],
                            ],
                            [
                                'label' => '课程套餐',
                                'url' => ['courses'],
                                'options' => ['class' => 'active '],
                            ]
                        ],
                        'options' => ['class' => 'nav nav-tabs']
                    ]) ?>

                    <div class="mc-body">
                        <div class="mc-header">
                            <?= Html::beginTag('a',['href' => 'membercards/add', 'class' => 'add-access-mini']) ?>
                            <span class="label label-default link">新增课程</span>
                            <?= Html::endTag('a') ?>
                        </div>
                        <div class="mc-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>课程名字</th>
                                    <th>课时</th>
                                    <th>课程价格</th>
                                    <th>课程内容</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($courses as $id => $course) {
                                    ?>
                                    <tr>
                                        <td><?= $course['name'] ?></td>
                                        <td><?= $course['times'] ?>节课</td>
                                        <td><?= $course['prices'] ?>元</td>
                                        <td><?= $course['description'] ?></td>
                                        <td><?= Html::tag('a', '修改', ['href' => 'edit']) ?>&nbsp;<?= Html::tag('a', '删除', ['href' => 'delete', 'class' => 'js_ajax red', 'confirm' => '确定要删除课程', 'query' => $course['id']]) ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= Dialog::widget([
    'clientOptions' => [
        'dialogClass' => 'black-tie',
        'modal' => true,
        'autoOpen' => false,
    ],
    'options' => [
        'id' => 'confirmDialog'
    ]
]);
