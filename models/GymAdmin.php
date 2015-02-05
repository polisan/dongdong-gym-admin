<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * GymAdmin model
 *
 * @property integer $id
 * @property string $username
 * @property string $access_token
 * @property string $access_token_expire_at
 * @property string $password_hash
 * @property string $email
 * @property integer $is_email_verified
 * @property string $phone
 * @property integer $is_phone_verified
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class GymAdmin extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    public $access_token_during = 2592000; // 30 * 24 * 3600s

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%gym_admin}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],

            ['is_email_verified', 'default', 'value' => 0],
            ['is_email_verified', 'in', 'range' => [0, 1]],

            ['is_phone_verified', 'default', 'value' => 0],
            ['is_phone_verified', 'in', 'range' => [0, 1]],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        if ($token) {
            return static::findOne([
                'access_token' => $token,
                'access_token_expire_at >= '.time(),
                'status' => self::STATUS_ACTIVE,
            ]);
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }


    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    // TODO:
    public function generateAccessToken($isNull = false)
    {
        if ($isNull) {
            $this->access_token = null;
            $this->access_token_expire_at = 0;
            return;
        }

        $s1 = time();
        $s2 = $this->username;
        $s3 = $this->phone != null ? $this->phone : '';
        $s4 = $this->email != null ? $this->email : '';
        $s5 = $this->password_hash;
        $s6 = Yii::$app->security->generateRandomString();
        $s7 = hash('sha1', $s1 . $s2 . $s3 . $s4 . $s5, false);
        $this->access_token = hash('sha256', $s6 . $s7, false);
        $this->access_token_expire_at = time() + $this->access_token_during;
    }

    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findByPhone($phone)
    {
        return static::findOne(['phone' => $phone, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findByUsernameOrEmailOrPhone($loginName)
    {
        if (empty($loginName)) {
            return null;
        }

        return static::find()
            ->where(['and', ['status' => self::STATUS_ACTIVE], [
                'or', ['username' => $loginName], [
                    'or', ['email' => $loginName], ['phone' => $loginName]]]])
            ->one();
    }

    public function getGyms()
    {
        return $this->hasMany(Gym::className(), ['gym_admin_id' => 'id'])
            ->where(['not', ['status' => Gym::STATUS_DELETED]])
            ->orderBy('id');
    }
}
