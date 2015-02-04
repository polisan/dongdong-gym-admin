<?php

use yii\bootstrap\Nav;
use yii\helpers\Html;

$this->title = "场地详情";
?>

<div class="homepage-main">
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
                        <div class="add-fd">增加场地</div>
                        <div class="fd-category">
                            <h2 class="fd-category-name">普通羽毛球场</h2>
                            <span class="fd-category-detail"></span>
                            <span class="fd-info"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
