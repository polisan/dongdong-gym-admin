<?php
/**
 * @author deofly
 * @since 1.0 2015/01/17
 */

namespace app\components;

use yii\base\UserException;

class DDException extends UserException
{
    const INTERNAL_SERVER_ERROR = 1;
    const USERNAME_MISSING = 200; // none or empty
    const USERNAME_INVALID = 201; // wrong format
    const USERNAME_TAKEN = 204;
    const PASSWORD_MISSING = 202;
    const PASSWORD_INVALID = 203;
    const EMAIL_MISSING = 204;
    const EMAIL_INVALID = 205;
    const EMAIL_TAKEN = 206;
    const PHONE_MISSING = 207;
    const PHONE_INVALID = 208;
    const PHONE_TAKEN = 209;
    const ACCOUNT_ALREADY_LINKED = 210;
    const USER_PASSWORD_MISMATCH = 211;
    const USERNAME_PASSWORD_MISMATCH = 212;
    const USER_EMAIL_PASSWORD_MISMATCH = 213;
    const USER_PHONE_PASSWORD_MISMATCH = 214;
    const USER_NOT_FOUND = 215;
    const USERNAME_NOT_FOUND = 216;
    const USER_EMAIL_NOT_FOUND = 217;
    const USER_PHONE_NOT_FOUND = 218;
    const USER_EMAIL_NOT_VERIFIED = 219;
    const USER_PHONE_NOT_VERIFIED = 220;
    const UNKNOWN_ERROR = 999;

    public static $names = [
        self::INTERNAL_SERVER_ERROR => 'Internal Server Error',
        self::USERNAME_MISSING => 'Username Missing',
        self::USERNAME_INVALID => 'Username Invalid',
        self::USERNAME_TAKEN => 'Username Exists',
        self::PASSWORD_MISSING => 'Missing Password',
        self::PASSWORD_INVALID => 'Invalid Password',
        self::EMAIL_MISSING => 'Missing Email',
        self::EMAIL_INVALID => 'Invalid Email',
        self::EMAIL_TAKEN => 'Email Exists',
        self::PHONE_MISSING => 'Missing Phone',
        self::PHONE_INVALID => 'Invalid Phone',
        self::PHONE_TAKEN => 'Phone Exists',
        self::ACCOUNT_ALREADY_LINKED => 'Account Already Linked',
        self::USER_PASSWORD_MISMATCH => 'Password Not Match User',
        self::USERNAME_PASSWORD_MISMATCH => 'Password Not Match Username',
        self::USER_EMAIL_PASSWORD_MISMATCH => 'Password Not Match Email',
        self::USER_PHONE_PASSWORD_MISMATCH => 'Password Not Match Phone',
        self::USER_NOT_FOUND => 'User Not Found',
        self::USERNAME_NOT_FOUND => 'Username Not Found',
        self::USER_EMAIL_NOT_FOUND => 'Email Not Found',
        self::USER_PHONE_NOT_FOUND => 'Phone Not Found',
        self::USER_EMAIL_NOT_VERIFIED => 'Email Not Verified',
        self::USER_PHONE_NOT_VERIFIED => 'Phone Not Verified',
        self::UNKNOWN_ERROR => 'Unknown Error',
    ];

    public static $messages = [
        self::INTERNAL_SERVER_ERROR => 'Something has gone wrong with the server.',
        self::USERNAME_MISSING => 'The username is missing or empty.',
        self::USERNAME_INVALID => 'The username is invalid.',
        self::USERNAME_TAKEN => 'The username has already been taken.',
        self::PASSWORD_MISSING => 'The password is missing or empty.',
        self::PASSWORD_INVALID => 'The password is invalid.',
        self::EMAIL_MISSING => 'The email is missing or empty.',
        self::EMAIL_INVALID => 'The email is invalid','Invalid Email.',
        self::EMAIL_TAKEN => 'The username has already been taken.',
        self::PHONE_MISSING => 'The phone is missing or empty.',
        self::PHONE_INVALID => 'The phone is invalid.',
        self::PHONE_TAKEN => 'The username has already been taken.',
        self::ACCOUNT_ALREADY_LINKED => 'The account being linked is already linked to another.',
        self::USER_PASSWORD_MISMATCH => 'User and password mismatched.',
        self::USERNAME_PASSWORD_MISMATCH => 'Username and password mismatched.',
        self::USER_EMAIL_PASSWORD_MISMATCH => 'Email and password mismatched.',
        self::USER_PHONE_PASSWORD_MISMATCH => 'Phone and password mismatched.',
        self::USER_NOT_FOUND => 'The user is not found.',
        self::USERNAME_NOT_FOUND => 'The username is not found.',
        self::USER_EMAIL_NOT_FOUND => 'The email is not found.',
        self::USER_PHONE_NOT_FOUND => 'The phone is not found.',
        self::USER_EMAIL_NOT_VERIFIED => 'The email is not verified.',
        self::USER_PHONE_NOT_VERIFIED => 'The phone is not verified.',
        self::UNKNOWN_ERROR => 'Unknown error.'
    ];

    private $defaultCode = self::INTERNAL_SERVER_ERROR;
    private $defaultName = 'Error';

    public function __construct($code = null) {
        if (!$code || !isset(static::$messages[$code])) {
            $code = $this->defaultCode;
        }

        parent::__construct(static::$messages[$code], $code);
    }

    public function getName() {
        if (isset(static::$names[$this->getCode()])) {
            return static::$names[$this->getCode()];
        }
        return $this->defaultName;
    }
}
