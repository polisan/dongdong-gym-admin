<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\PassportAsset;

PassportAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head(); ?>
</head>
<body>

<?php $this->beginBody() ?>
<div id="wrapper">
    <div id="<?php echo Yii::$app->requestedAction->id == 'signup' ? 'reg-main' : 'login-main'; ?>">
        <div class="navarea">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"><span class="logo" ></span></a>
                </div>
                <div class="navbar-right">
                    <?php
                    if (Yii::$app->requestedAction->id == 'login') {
                        echo '现在还不是动动会员？<a class="link" href="'.Url::to(['passport/signup']).'">立即申请</a>';
                    }
                    else if (Yii::$app->requestedAction->id == 'signup') {
                        echo '已有动动场馆账号？<a class="link" href="'.Url::to(['passport/login']).'">立即登录</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <?= $content ?>
    </div>
    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; DongDong Tec. <?= date('Y') ?></p>
        </div>
    </footer>
</div>

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
