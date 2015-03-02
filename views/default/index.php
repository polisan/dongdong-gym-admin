<?php
use yii\helpers\Html;
use yii\jui\Dialog;

$this->title = "场馆主页";
?>
<div class="homepage-main">
    <div class="container">
        <div class="col-main">
            <div class="add-access"><?= Html::a('+ 新增场馆', ['gym/default/add']) ?></div>
            <div class="list-gym">
                <div class="list-gym-item">
                    <span class="logo-gym"></span>
                    <div class="gym-info">
                        <span class="gym-name"> <?= Html::a('杭州体育馆', ['gym/default', 'id' => 10]); ?> </span>
                        <span class="gym-district">杭州西湖区</span>
                        <span class="gym-authentic">未认证</span>
                        <ul class="gym-sports">
                            <li><?= Html::a("健身", ['#']); ?></li>
                            <li><?= Html::a("游泳", ['#']); ?></li>
                            <li><?= Html::a("羽毛球", ['#']); ?></li>
                        </ul>
                    </div>
                    <div class="estimate-gym">
                        <div class="estimate">
                            <span class="estimate-title">场馆动态评分</span>
                            <span>
                                <p>环境:<i>4.7</i></p>
                                <p>设施:<i>4.7</i></p>
                                <p>服务:<i>4.7</i></p>
                            </span>
                        </div>
                        <div class="estimate">
                            <span class="estimate-title">与同行业相比</span>
                            <span>
                                <p>高于行业:<i>4.57</i></p>
                                <p>高于行业:<i>4.53</i></p>
                                <p>高于行业:<i>4.62</i></p>
                            </span>
                        </div>
                    </div>
                    <div><?= Html::tag('a', '移除', ['href' => 'gym/default/delete', 'class' => 'js_ajax', 'confirm' => '确定要删除该场馆' ]) ?></div>
                </div>
                <div class="list-gym-item">
                    <span class="logo-gym"></span>
                    <div class="gym-info">
                        <span class="gym-name">动动体育馆</span>
                        <span class="gym-district">杭州西湖区</span>
                        <span class="gym-authentic">已认证</span>
                        <ul class="gym-sports">
                            <li><?= Html::a("健身", ['#']); ?></li>
                            <li><?= Html::a("游泳", ['#']); ?></li>
                            <li><?= Html::a("羽毛球", ['#']); ?></li>
                        </ul>
                    </div>
                    <div class="estimate-gym">
                        <div class="estimate">
                            <span class="estimate-title">场馆动态评分</span>
                            <span>
                                <p>环境:<i>4.7</i></p>
                                <p>设施:<i>4.7</i></p>
                                <p>服务:<i>4.7</i></p>
                            </span>
                        </div>
                        <div class="estimate">
                            <span class="estimate-title">与同行业相比</span>
                            <span>
                                <p>高于行业:<i>4.57</i></p>
                                <p>高于行业:<i>4.53</i></p>
                                <p>高于行业:<i>4.62</i></p>
                            </span>
                        </div>
                    </div>
                    <div><?= Html::tag('a', '移除', ['href' => 'gym/default/delete', 'class' => 'js_ajax', 'confirm' => '确定要删除该场馆' ]) ?></div>
                </div>
            </div>
            <div class="notice-block">
                <div class="notice-title">场馆提醒</div>
                <div>
                    <h3>你需要处理：</h3>
                    <span>教练处理：<?= Html::a('待加入教练(5)', null) ?></span>
                    <span>活动提醒：<?= Html::a('新报名人数(5)', null) ?></span>
                    <span>资讯提醒：<?= Html::a('新评论条数(5)', null) ?></span>
                </div>
                <hr>
                <div>
                    <span>教练处理：
                        <ul>
                            <li><?= Html::a('已加入教练(5)', null) ?></li>
                        </ul>
                    </span>
                    <span>资讯处理：
                        <ul>
                            <li><?= Html::a('最近发表(5)', null) ?></li>
                            <li><?= Html::a('总共发表(5)', null) ?></li>
                            <li><?= Html::a('未发表(5)', null) ?></li>
                        </ul>
                    </span>
                    <span>活动管理
                        <ul>
                            <li><?= Html::a('正在进行(5)', null) ?></li>
                            <li><?= Html::a('已发起活动(5)', null) ?></li>
                        </ul>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<?= Dialog::widget([
    'clientOptions' => [
        'modal' => true,
        'autoOpen' => false,
    ],
    'options' => [
        'id' => 'confirmDialog'
    ]
]);