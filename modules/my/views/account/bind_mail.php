<?php
use yii\helpers\Html;

$this->title = '邮箱绑定';
?>

<div>
    <div class="container">
        <div class="col-menu">
            <?php require('nav_menu_sidebar.php'); ?>
        </div>
        <div class="col-main">
            <div class="content-box">
                <h3>邮箱绑定</h3>
                <div class="mc">
                    <div class="mc-body">
                        <?= Html::beginForm('bindmail', 'post', ['class' => '']); ?>
                        <?= Html::label('你所绑定的邮箱地址'); ?>
                        <?= Html::input('text', 'Name', '', ['id' => 'old-name']); ?>
                        <?= Html::submitButton('提交', ['class' => 'btn btn-primary', 'name' => 'submit']); ?>
                        <?= Html::endForm(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
