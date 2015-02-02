<?php
use yii\helpers\Html;

$this->title = "场馆主页";
$this->params['account'] = $model->getAccount();   // 场馆账号信息（模拟）
$this->params['gym'] = $model->getGymInfo();      // 场馆信息（模拟）
?>
<div class="homepage-main">
    <div class="container">
        <div class="col-menu">
            <?php require("menu-nav-gym.php") ?>
        </div>
        <div class="col-main">
            <div class="list-gym">
                <div class="list-gym-item">
                    <span class="logo-gym"></span>
                    <div class="gym-info">
                        <span class="gym-name">杭州体育馆</span>
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
            <div class="recent-info">
                <div class="recent-info-title">最近情况</div>
                <div>
                    <span>最近浏览记录</span>
                    <table>
                        <tr>
                            <th>时间</th>
                            <th>教练</th>
                            <th>普通用户</th>
                        </tr>
                        <tr>
                            <td>最近30天</td>
                            <td>20</td>
                            <td>30</td>
                        </tr>
                        <tr>
                            <td>2014年11月</td>
                            <td>30</td>
                            <td>50</td>
                        </tr>
                    </table>
                </div>
                <div>
                    <span>最近评价情况</span>
                    <table>
                        <tr>
                            <th>时间</th>
                            <th>场馆评价</th>
                            <th>资讯评价</th>
                            <th>活动评价</th>
                        </tr>
                        <tr>
                            <td>最近30天</td>
                            <td>20</td>
                            <td>30</td>
                            <td>30</td>
                        </tr>
                        <tr>
                            <td>2014年11月</td>
                            <td>30</td>
                            <td>50</td>
                            <td>50</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

