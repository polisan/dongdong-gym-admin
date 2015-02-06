<?php
use yii\bootstrap\Nav;
use yii\helpers\Html;

?>

<div class="menu-sidebar">
    <h3 class="menu-sidebar-title">杭州体育馆</h3>
    <?php
    $curModule = Yii::$app->controller->module->getUniqueId();
    $curController = Yii::$app->controller->id;
    $curRoute =  $curModule.'/'.$curController.'/';
    $menuItems = [
        ['label' => '查看场馆', 'url' => ['default/']],
        ['label' => '场地管理', 'url' => ['fields/']],
        ['label' => '教练管理', 'url' => ['coaches/']],
        ['label' => '课程管理', 'url' => ['courses/']],
        ['label' => '会员卡管理', 'url' => ['members/']],
    ];
    echo Nav::widget([
        'options' => ['class' => 'nav nav-tabs nav-stacked menu-sidebar-group'],
        'items' => $menuItems,
        'route' => $curRoute,
    ]);
    ?>
</div>