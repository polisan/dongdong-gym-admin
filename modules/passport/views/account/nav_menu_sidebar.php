<?php
use yii\bootstrap\Nav;
use yii\helpers\Html;

?>

<div class="menu-sidebar">
    <h3 class="menu-sidebar-title">管理菜单</h3>
    <?php
    $menuItems = [
        ['label' => '账号管理', 'url' => ['profile']],
        ['label' => '安全设置', 'url' => ['security']],
//        ['label' => '场馆认证', 'url' => ['']],
        ['label' => '吐槽反馈', 'url' => ['feedback']],
    ];
    echo Nav::widget([
        'options' => ['class' => 'nav nav-tabs nav-stacked menu-sidebar-group'],
        'items' => $menuItems,
    ]);
    ?>
</div>