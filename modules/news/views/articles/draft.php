<?php

use yii\bootstrap\Nav;
use yii\helpers\Html;
use yii\jui\Dialog;

$this->title = '文章列表';

// 模拟数据
$articles = [
    [
        'id' => 1,
        'caption' => '中国奥委会名誉主席何振梁逝世',
        'sport' => '户外',
        'time' => Date('Y-m-d'),
    ],
    [
        'id' => 2,
        'caption' => '小德出战 纳达尔伯蒂奇同区盼卫冕',
        'sport' => '网球',
        'time' => Date('Y-m-d'),
    ],
    [
        'id' => 3,
        'caption' => '谌龙领衔男单 赵芸蕾双打两项第一',
        'sport' => '羽毛球',
        'time' => Date('Y-m-d'),
    ],
]
?>

<div class="homepage-main">
    <div class="container">
        <div class="panel panel-default content-sidebar-wrap">
            <div class="panel-heading">
                <?= Nav::widget([
                    'items' => [
                        [
                            'label' => '文章列表',
                            'url' => ['index'],
                        ],
                        [
                            'label' => '草稿箱',
                            'url' => ['draft'],
                            'options' => ['class' => 'active '],
                        ],
                    ],
                    'options' => ['class' => 'nav nav-tabs']
                ]) ?>
            </div>
            <div class="panel-body">
                <div class="p-main">
                    <h4 class="caption">草稿</h4>
                    <table class="table table-bordered table-hover table-lg">
                        <thead>
                        <tr>
                            <th>标题名</th>
                            <th>运动标签</th>
                            <th>保存时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($articles as $at) {
                            ?>
                            <tr>
                                <td>
                                    <input class="checkitem" type="checkbox" style="display: none;">
                                    <?= $at['caption'] ?>
                                </td>
                                <td><?= $at['sport'] ?></td>
                                <td><?= $at['time'] ?></td>
                                <td><?= Html::tag('a', '删除', ['href' => 'articles/delete-post', 'class' => 'js_ajax', 'confirm' => '确定要删除', 'query' => $at['id']]) ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?= Dialog::widget([
        'clientOptions' => [
            'modal' => true,
            'autoOpen' => false,
        ],
        'options' => [
            'id' => 'confirmDialog'
        ]
    ]);
    ?>
