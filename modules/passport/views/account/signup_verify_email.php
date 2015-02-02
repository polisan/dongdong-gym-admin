<?php
use yii\helpers\Url;

$this->title = '注册';
?>
<div class="content">
    <div class="container">
        <div class="reg-frame">
            <div id="reg-form">
                <div id="reg-tips">
                    <span class="reg-tips-logo"></span>
                    <span class="reg-tips">请激活邮箱</span>
                </div>
                <div id="reg-msg">
                    感谢注册!<br />
                    邮箱确认信息已发到你的邮箱<br /><a href="#" class="reg-mail" ><?= $email ?></a><br />
                    请进入邮箱查看邮件，并激活场馆账号!
                </div>
                <div class="notice">
                    <span class="red">没有收到邮件</span>
                    <div class="notice-tips">
                        <ol>
                            <li>请检查邮箱地址是否正确</li>
                            <li>请检查你的邮件垃圾箱</li>
                            <li>如仍未收到确认，请尝试<a href="#" >重新发送</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <a href="<?php echo Url::to(['gym/registergym']);?>">下一步（测试所用）</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="reg-step">
            <span class="separator">
            </span>
            <div class="reg-step-info">
                注册步骤
                <ul>
                    <li class="active">邮箱注册</li>
                    <li class="active">邮箱验证</li>
                    <li>信息填写</li>
                    <li>完成</li>
                </ul>
            </div>
        </div>
    </div>

</div>
