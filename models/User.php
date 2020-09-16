<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $role
 * @property string $auth_key
 * @property string $access_token
 *
 * @property Article[] $articles
 * @property Article[] $articles0
 * @property Userrole $userrole0
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'role', 'auth_key', 'access_token'], 'required'],
            [['role'], 'integer'],
            [['username'], 'string', 'max' => 55],
            [['password', 'auth_key', 'access_token'], 'string', 'max' => 255],
            [['role'], 'exist', 'skipOnError' => true, 'targetClass' => Userrole::className(), 'targetAttribute' => ['role' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'role' => Yii::t('app', 'Role'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'access_token' => Yii::t('app', 'Access Token'),
        ];
    }

    /**
     * Gets query for [[Articles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::class, ['created_by' => 'id']);
    }

    /**
     * Gets query for [[Articles0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticles0()
    {
        return $this->hasMany(Article::className(), ['updated_by' => 'id']);
    }

    /**
     * Gets query for [[Role0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserrole()
    {
        return $this->hasOne(Userrole::class, ['id' => 'role']);
    }
        // -------------------------------------------------------------------------------------------------------------------- 
    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::find()->where(['access_token' => $token]);
    }
    /** 
     * Finds user by username 
     * 
     * @param string $username 
     * @return static|null 
     */
    public static function findByUsername($username)
    {
        return User::find()->where(['username' => $username])->one();
    }

    /** 
     * {@inheritdoc} 
     */
    public function getId()
    {
        return $this->id;
    }

    /** 
     * {@inheritdoc} 
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /** 
     * {@inheritdoc} 
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /** 
     * Validates password 
     * 
     * @param string $password password to validate 
     * @return bool if password provided is valid for current user 
     */
    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->password);
    }
}
