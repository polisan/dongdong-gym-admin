<?php
use yii\helpers\Html;

$this->title = '查看场馆';
$gym = $model;    // 场馆信息（模拟）
?>

<div class="homepage-main">
    <div class="container">
        <div class="col-menu">
            <?php require('nav_menu_sidebar.php'); ?>
        </div>
        <div class="col-main">
            <div class="gym-box">
                <div class="main-gym">
                    <h3>场馆信息</h3>
                    <div class="profile-gym">
                        <?= Html::a('<img src="/dongdong/gym-admin/images/gym-logo.jpg"', ['edit'], ['class' => 'logo-gym'] ) ?>
                        <div class="btn-venuse-setting"><?= Html::a('编辑', ['edit', 'op'=> 'edit']) ?></div>
                        <div class="simple-info">
                            <h3 class="name"> <?= $gym['name']; ?>【<strong class="status">营业中</strong>】</h3>
                            <ul>
                                <li class="district"><b>所在地区：</b>杭州 西湖区 <span><?= $gym['location'] ?></span></li>
                                <li><b>联系方式：</b><?= $gym['contact'] ?></li>
                                <li><b>营业时间：</b><?= $gym['open_time'] ?></li>
                                <?php
                                if (!empty($gym['wechat'])) {
                                    echo '<li><b>微信公共号：</b>'.$gym['wechat'].'</li>';
                                }
                                ?>
                                <li><b>支持会员：</b>
                                    <?php
                                    if ($gym['support_membercard']) {
                                        echo '支持';
                                    }
                                    else echo '不支持';
                                    ?>
                                </li>
                                <li><b>经营项目：</b>
                                    <?php
                                    foreach ($gym['sports'] as $sport) {
                                        echo $sport.'  ';
                                    }
                                    ?>
                                </li>
                                <li class="des-gym"><b>场馆简介：</b> <?= $gym['description'] ?> </li>
                            </ul>
                        </div>
                        <div class="others-info-gym">
                            <h3>场地列表</h3>
                            <ul>
                                <?php
                                foreach ($gym['field'] as $field) {
                                    echo '<li>'.Html::a($field['name'].'('.$field['number'], ['/gym/fields/index']).')</li>';
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="others-info-gym coach">
                            <h3>教练列表</h3>
                            <?= Html::a("查看更多", ['/gym/coaches/index'], ['class' => 'link-more']) ?>
                            <ul>
                                <?php
                                foreach ($gym['coach'] as $coach) {
                                    ?>
                                    <li>
                                        <a href="#" class="coach-portrait"><img src="../../dongdong/images/gym-logo.jpg"></a>
                                        <h2><?= $coach['name'] ?></h2>
                                        <ul class="coach-simple-info">
                                            <li><b>性别:</b>
                                                <?php
                                                if ($coach['gender'])
                                                    echo '女';
                                                else echo '男';
                                                ?>
                                            </li>
                                            <li><b>工作类型:</b>
                                                <?php
                                                if ($coach['work_type'])
                                                    echo '全职';
                                                else echo '兼职'
                                                ?>
                                            </li>
                                            <li><b>运动类型:</b>羽毛球 </li>
                                        </ul>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
