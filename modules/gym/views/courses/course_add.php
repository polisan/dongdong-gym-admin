<?php
use yii\bootstrap\Nav;

$this->title = '新增课程';

// 模拟数据

?>

<div class="homepage-main">
    <div class="container">
        <div class="col-menu">
            <?php require(dirname(__DIR__). '/default/nav_menu_sidebar.php'); ?>
        </div>
        <div class="col-main">
            <div class="content-box">
                <h3>课程编辑</h3>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
