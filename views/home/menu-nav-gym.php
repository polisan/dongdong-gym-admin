<?php
use yii\helpers\Html;
?>
<div class="menu-box-home">
    <span class="menu-box-title"> </span>
    <ul class="menu">
        <li><?= Html::a("查看场馆", ['home/gymlist']); ?></li>
        <li><?= Html::a("场地管理", ['home/gymfield']); ?></li>
        <li><?= Html::a("教练管理", ['home/gymcoach']); ?></li>
        <li><?= Html::a("课程管理", ['home/course']); ?></li>
        <li><?= Html::a("会员卡管理", ['home/membercard']); ?></li>
    </ul>
</div>
