<?php
use yii\helpers\Html;

$this->title = '认证详情';
?>

<div>
    <div class="container">
        <div class="col-menu">
            <div class="menu-box-home">
                <span class="menu-box-title"> </span>
                <ul class="menu">
                    <li><?= Html::a("账号管理", ['profile']); ?></li>
                    <li><?= Html::a("安全设置", ['security']); ?></li>
                    <li><?= Html::a("场馆认证", ['']); ?></li>
                    <li><?= Html::a("吐槽反馈", ['feedback']); ?></li>
                </ul>
            </div>
        </div>
        <div class="col-main">
            <div class="content-box">
                <h3>认证详情</h3>
                <div class="mc">
                    <div class="mc-body">
                        <table class="table">
                            <thead class="thead">
                            <tr>
                                <th class="table_cell "><div class="td_panel">姓名</div></th>
                                <th class="table_cell "><div class="td_panel">联系电话</div></th>
                                <th class="table_cell "><div class="td_panel">认证时间</div></th>
                                <th class="table_cell "><div class="td_panel">认证状态</div></th>
                                <th class="table_cell opr"><div class="td_panel">操作</div></th>
                            </tr>
                            </thead>
                            <tbody class="tbody">
                            <tr id="js_admin_list" style="">
                                <td class="table_cell"><div class="td_panel">陈**</div></td>
                                <td class="table_cell"><div class="td_panel">157***80739</div></td>
                                <td class="table_cell"><div class="td_panel">2014-12-03 12:00</div></td>
                                <td class="table_cell"><div class="td_panel">通过</div></td>
                                <td class="table_cell opr"><div class="td_panel"><?= Html::a('重新认证',['update_attest']) ?></div></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
