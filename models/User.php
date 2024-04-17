<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{

    const STATUS_INACTIVE = 0;
    /**
     * Konto aktywne.
     */
    const STATUS_ACTIVE = 1;
    const ROLE_ADMIN = 'admin';
    const ROLE_MANAGER = 'manager';
    const ROLE_EMPLOYEE = 'employee';
    const ROLE_RECEPTION = 'reception';
    const ROLE_MENAGEMENT = 'menagement';
    public $register = false;
    /**
     * @var string atrybut na potrzeby zmiany hasła.
     */
    public $password_new;
    public $password_repeat;
    public $agree = false;

    public $authKey;
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'Imię',
            'last_name' => 'Nazwisko',
            'firm_name' => 'Pełna nazwa firmy',
            'email' => 'Email',
            'role' => 'Uprawnienia',
            'password_hash' => 'Password Hash',
            'password_new' => 'Hasło',
            'password_repeat' => 'Powtórz hasło',
            'password_reset_token' => 'Password Reset Token',
            'auth_key' => 'Auth Key',
            'image' => 'Zdjęcie profilowe',
            'status' => 'Status konta',
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email'], 'required'],
            [['password_new'], 'required', 'when' => function ($model) {
                return $model->isNewRecord;
            }],
            ['password_repeat', 'compare', 'compareAttribute' => 'password_new', 'message' => "Hasła muszą być takie same.", 'when' => function ($model) {
                return $model->register;
            }],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE]],
            [[
                'status', 'logged_in_at', 'created_at', 'updated_at',
            ], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 64],
            [[
                'email', 'password_hash', 'password_reset_token', 'register_token', 'password_new',
                'password_repeat', 'auth_key',
            ], 'string', 'max' => 255],
            [['logged_in_from', 'role'], 'string', 'max' => 45],
            [['auth_key', 'email'], 'unique'],
            ['email', 'email'],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, gif, png'],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }
    public function init()
    {
        parent::init();

        $this->on(self::EVENT_AFTER_INSERT, ['app\components\events\UserRecordAfterInsert', 'afterInsert']);
        $this->on(self::EVENT_AFTER_UPDATE, ['app\components\events\UserRecordAfterUpdate', 'afterUpdate']);

        $this->on(self::EVENT_AFTER_DELETE, ['app\components\events\UserRecordAfterDelete', 'afterDelete']);
    }
    public function beforeSave($insert)
    {
        if ($this->isNewRecord)
            $this->auth_key = Yii::$app->security->generateRandomString(255);

        if ($this->password_new != '')
            $this->setPassword($this->password_new);

        return parent::beforeSave($insert);
    }
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);

    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['email' => $username]);

    }
    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
    public function getUsername()
    {
        return $this->getFullName();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        if (Yii::$app->getSecurity()->validatePassword($password, $this->password_hash)) {
            return true;
        }
        return false;
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByRegisterToken($token)
    {
        return static::findOne([
            'register_token' => $token,
            'status' => self::STATUS_INACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }
        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }


    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = \Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    /**
     * Generates new password reset token
     */
    public function generateRegisterToken()
    {
        $this->register_token = \Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removeRegisterToken()
    {
        $this->register_token = null;
    }

    public function register()
    {
        $this->generateRegisterToken();
        $this->status = self::STATUS_INACTIVE;

        $this->role = 'firm';
      
        // $sign = $this->sign;
        return $this->save();
        // && Yii::$app
        //     ->mailer
        //     ->compose(
        //         'message/register',
        //         ['user' => $this, 'sign' => $sign]
        //     )
        //     ->setTo($this->email)
        //     ->setSubject('Rejestracja konta w ' . Yii::$app->name)
        //     ->send();
    }
    public function getRoleList()
    {
        return [
            self::ROLE_ADMIN => 'Administrator',
            self::ROLE_MANAGER => 'Kierownik',
            self::ROLE_EMPLOYEE => 'Pracownik',
            self::ROLE_RECEPTION => 'Recepcja',
            self::ROLE_MENAGEMENT => 'Zarząd',

        ];
    }
    public function getStatusList()
    {
        return [User::STATUS_INACTIVE => 'nieaktywne', User::STATUS_ACTIVE => 'aktywne'];
    }
}