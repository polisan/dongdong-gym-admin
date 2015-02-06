<?php

use yii\bootstrap\Modal;
use yii\bootstrap\Nav;

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
                    <?php
                    // 模拟该场馆下的场地运动类型. array类型，key为参数，value为标题
                    $coachTypes = array(
                        'all' => '全部教练',
                        'unJoin' => '加入申请',
                    );
                    $menuItems = array();
                    if (!isset($_GET['coach']) || !array_key_exists($_GET['coach'], $coachType))
                        $ct = 'all';
                    else $ct = $_GET['coach'];
                    foreach ($coachTypes as $coachType => $name) {
                        if ($ct == $coachType) {
                            $menuItems[] = array(
                                'label' => $name,
                                'url' => ['index', 'ct' => $coachType],
                                'options' => ['class' => 'active'],
                            );
                        }
                        else {
                            $menuItems[] = array(
                                'label' => $name,
                                'url' => ['index', 'ct' => $coachType],
                            );
                        }
                    }
                    // 生成教练类型导航栏
                    echo Nav::widget([
                        'options' => ['class' => 'nav nav-tabs'],
                        'items' => $menuItems,
                    ]);
                    ?>

                    <div class="mc-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= Modal::widget([
    'header' => '<h5 style="color:#000;">场地名字</h5>',
    'toggleButton' => ['clike'],
])?>
