<?php
/*****************************************************************
 * File   : RegisterForm.php
 * Author : dove
 * Date   : 1/26/15
 * Update : 1/26/15
 * Description: 
 *****************************************************************/
namespace app\models;

use yii\base\Model;

class RegisterForm extends Model {
    public $email;
    public $password;
    public $passwordRepeat;
    public $verifyCode;
    public $isAgree = false;

    public function rules() {

        return [
            [['email', 'password'], 'required'],
        ];
    }

    public function register() {
        if ( $this->validate() ) {
            return true;
        }
        return null;
    }
}
