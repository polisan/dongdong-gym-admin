<?php
use yii\helpers\Html;

$this->title = '认证申请';
?>

<div>
    <div class="container">
        <div class="col-menu">
            <?php require('nav_menu_sidebar.php'); ?>
        </div>
        <div class="col-main">
            <div class="content-box">
                <h3>认证申请</h3>
                <div class="mc">
                    <div class="mc-body">
                        <div class="account">
                            <?= Html::img('/dongdong/images/gym-logo.jpg', ['alt' => '头像', 'class' => 'portrait']) ?>
                            <div class="account-meta account-info">
                                <h3 class="nick-name">
                                    <?= Html::a(Yii::$app->user->identity->username, ['profile']) ?>
                                </h3>
                                <span class="info">杭州西湖 浙大玉泉9舍 </span>
                            </div>
                        </div>
                        <?= Html::beginForm('accountattest', 'post', ['class' => 'form-horizontal']); ?>
                        <ul class="attest-info">
                            <li>
                                <label for="attest-name">认证人：</label>
                                <input type="text" value="" />
                            </li>
                            <li>
                                <label for="attest-name">联系电话：</label>
                                <input type="text" value="" />
                            </li>
                        </ul>
                        <?= Html::submitButton('提交', ['class' => 'btn btn-primary']) ?>
                        <?= Html::endForm(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
