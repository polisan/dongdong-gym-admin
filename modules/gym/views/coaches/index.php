<?php

use yii\bootstrap\Modal;
use yii\bootstrap\Nav;

$this->title = '已加入的教练列表';
?>

<div class="homepage-main">
    <div class="container">
        <div class="col-menu">
            <?php require(dirname(__DIR__). '/default/nav_menu_sidebar.php'); ?>
        </div>
        <div class="col-main">
            <div class="content-box">
                <h3>教练管理</h3>
                <div class="mc">
                    <?= Nav::widget([
                        'items' => [
                            [
                                'label' => '全部教练',
                                'url' => ['index'],
                                'options' => ['class' => 'active '],
                            ],
                            [
                                'label' => '加入邀请',
                                'url' => ['attend'],

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
