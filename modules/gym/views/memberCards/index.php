<?php
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\jui\Dialog;

$this->title = '会员卡列表';

$memCards[1]['id'] = 1;
$memCards[1]['name'] = '季度卡';
$memCards[1]['start_at'] = date('Y-m-d');
$memCards[1]['expire_at'] = date('Y-m-d');
$memCards[1]['description'] = '有效时间3月，价格为2200元，刷卡次数不限';

$memCards[2]['id'] = 2;
$memCards[2]['name'] = '月卡';
$memCards[2]['start_at'] = date('Y-m-d');
$memCards[2]['expire_at'] = date('Y-m-d');
$memCards[2]['description'] = '有效时间1年，价格为5000元，刷卡次数不限';

$memCards[3]['id'] = 3;
$memCards[3]['name'] = '普通会员卡';
$memCards[3]['start_at'] = date('Y-m-d');
$memCards[3]['expire_at'] = date('Y-m-d');
$memCards[3]['description'] = '有效时间不限，价格为100元，可以充值，刷卡次数不限';

$memCards[4]['id'] = 4;
$memCards[4]['name'] = 'VIP会员卡';
$memCards[4]['start_at'] = date('Y-m-d');
$memCards[4]['expire_at'] = date('Y-m-d');
$memCards[4]['description'] = '有效时间不限，价格为1000元，可以充值，刷卡次数不限';

$memCards[5]['id'] = 5;
$memCards[5]['name'] = '月卡';
$memCards[5]['start_at'] = date('Y-m-d');
$memCards[5]['expire_at'] = date('Y-m-d');
$memCards[5]['description'] = '有效时间1月，价格为1000元，刷卡次数30次';
?>

<div class="homepage-main">
    <div class="container">
        <div class="col-menu">
            <?php require(dirname(__DIR__). '/default/nav_menu_sidebar.php'); ?>
        </div>
        <div class="col-main">
            <div class="content-box">
                <h3>会员管理</h3>
                <div class="mc">
                    <div class="mc-header">
                        <h3>会员卡种类(<?= count($memCards) ?>)</h3>
                        <?= Html::beginTag('a',['href' => 'membercards/add', 'class' => 'add-access-mini']) ?>
                        <span class="label label-default link">新增会员卡</span>
                        <?= Html::endTag('a') ?>
                    </div>
                    <div class="mc-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>会员卡种类</th>
                                <th>有效期</th>
                                <th>说明</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($memCards as $id => $card) {
                                ?>
                                <tr>
                                    <td><?= $card['name'] ?></td>
                                    <td><?= $card['start_at'] ?> 到 <?= $card['expire_at'] ?></td>
                                    <td><?= $card['description'] ?></td>
                                    <td><?= Html::tag('a', '修改', ['href' => 'membercards/edit']) ?>&nbsp;<?= Html::tag('a', '删除', ['href' => 'membercards/delete', 'class' => 'js_ajax red', 'confirm' => '确定要删除会员卡', 'query' => $card['id']]) ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= Dialog::widget([
    'clientOptions' => [
        'dialogClass' => 'black-tie',
        'modal' => true,
        'autoOpen' => false,
    ],
    'options' => [
        'id' => 'confirmDialog'
    ]
]);
