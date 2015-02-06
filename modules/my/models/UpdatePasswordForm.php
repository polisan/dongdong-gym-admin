<?php

namespace app\modules\my\models;

use Yii;
use yii\base\Model;

/**
 * ResetPasswordForm is the model behind the reset-password form.
 */
class UpdatePasswordForm extends Model
{
    public $oldPassword;
    public $password;
    public $verifyPassword;

    public function rules()
    {
        return [
            ['oldPassword', 'required', 'message' => '请输入旧密码'],
            ['oldPassword', 'validatePassword'],

            ['password', 'required', 'message' => '请输入新密码'],
            ['password', 'string', 'min' => 6],
            ['password', 'compare', 'compareAttribute' => 'oldPassword', 'operator' => '!=', 'message' => '与旧密码不能相同'],

            ['verifyPassword', 'required', 'message' => '请输入确认密码'],
            ['verifyPassword', 'compare', 'compareAttribute' => 'password', 'message' => '请再次输入确认密码'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'oldPassword' => '旧密码',
            'password' => '新密码',
            'verifyPassword' => '确认密码',
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = Yii::$app->user->identity;

            if (!$user || !$user->validatePassword($this->oldPassword)) {
                $this->addError($attribute, '原密码错误');
            }
        }
    }

    public function updatePassword()
    {
        if ($this->validate()) {
            $user = Yii::$app->user->identity;
            $user->setPassword($this->password);
            $user->generateAccessToken();
            return $user->save();
        }

        return false;
    }
}
