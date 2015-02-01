<?php
use yii\helpers\Html;
use app\assets\MainAsset;

MainAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
<div id = "wrapper">
    <div id="gym-header">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><span class="logo" ></span></a>
            </div>
            <div class="navbar-right account">
                <a href=""><span class="portrait"></span></a>
                <div class="account-meta">
                    <span class="type-gym"><a href="">未认证</a></span>
<!--                    <a href="">--><?php //echo $this->params['gym']['accountName']; ?><!--</a>-->
                </div>
            </div>
        </div>
    </div>
    <div id="gym-nav">
        <div class="container">

        </div>
    </div>
    <?= $content ?>
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

