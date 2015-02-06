<?php

namespace app\modules\passport\models;

use app\models\GymAdmin;
use yii\base\Model;

/**
 * SignupForm is the model behind the signup form.
 *
 * @package app\modules\passport\models
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $passwordRepeat;
    public $verifyCode;
    public $isAgree;

    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required', 'message' => '请填写用户名'],
            ['username', 'unique', 'targetClass' => '\app\models\GymAdmin', 'message' => '该用户名已被注册'],
            ['username', 'match', 'pattern' => '/^[\x{4e00}-\x{9fa5}a-zA-Z0-9_]{2,20}$/u', 'message' => '用户名不合法'], // only letter, digit, chinese and '_'

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required', 'message' => '请填写邮箱地址'],
            ['email', 'email', 'message' => '邮箱格式错误'],
            ['email', 'unique', 'targetClass' => '\app\models\GymAdmin', 'message' => '该邮箱已被注册'],

            ['password', 'required', 'message' => '请填写密码'],
            ['password', 'string', 'min' => 6],

            ['passwordRepeat', 'required', 'message' => '请输入确认密码'],
            ['passwordRepeat', 'compare', 'compareAttribute' => 'password', 'message' => '请再次输入确认密码'],

            ['verifyCode', 'captcha', 'captchaAction' => '/support/captcha'],

            ['isAgree', 'required', 'requiredValue' => true, 'message' => '请确认是否同意该协议'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'email' => '邮箱',
            'password' => '密码',
            'passwordRepeat' => '确认密码',
            'verifyCode' => '验证码',
            'isAgree' => '是否同意',
        ];
    }

    public function signup()
    {
        if ($this->validate()) {
            $user = new GymAdmin();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->generateAccessToken();
            if ($user->save()) {
                return $user;
            }
        }
        return null;
    }
}
