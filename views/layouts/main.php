<?php
use yii\helpers\Html;
use app\assets\MainAsset;
use yii\bootstrap\Nav;

MainAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title) ?></title>
    <?php echo $this->head(); ?>
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
                <div class="account-meta account-info">
                    <?php
                    if ( $this->params['gym'][0]['authentic'] ) {
                        echo '<span class="authentic authentic-success"><a href="">已认证</a></span>';
                    }
                    else echo '<span class="authentic authentic-fail"><a href="">未认证</a></span>';
                    ?>
                    <?= Html::a($this->params['account']['name'], ['#'], ['class' => 'nick-name']) ?>
                </div>
                <div class="account-meta account-logout">
                    <?= Html::a('退出', ['#'], ['id' => 'logout']) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <?php
        echo Nav::widget([
            'items' => [
                [
                    'label' => '场馆主页',
                    'url' => ['gym/home'],
                    'options' => [ 'class' => 'active active-item' ],
                ],
                [
                    'label' => '资讯管理',
                    'url' => ['gym/home'],
                ],
                [
                    'label' => '活动管理',
                    'url' => ['gym/home'],
                ],
                [
                    'label' => '消息中心',
                    'url' => ['gym/home'],
                ],
                [
                    'label' => '账号管理',
                    'url' => ['gym/home'],
                ],
            ],
            'options' => [ 'class' => 'nav-pills nav-justified nav-gym']
        ]);
        ?>
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
