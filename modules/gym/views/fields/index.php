<?php

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
        </div>
    </div>
</div>
