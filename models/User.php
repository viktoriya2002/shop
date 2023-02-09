<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property string $login
 * @property string $email
 * @property string $password
 * @property int $admin
 *
 * @property Order[] $orders
 */
class User extends ActiveRecord implements IdentityInterface
{

    public static function findIdentity($id)
{
return static::findOne($id);
}

public static function findIdentityByAccessToken($token, $type = null)
{
return static::findOne(['access_token' => $token]);
}

public function getId()
{
return $this->id;
}

public function getAuthKey()
{
return;
}

public function validateAuthKey($authKey)
{
return;
}
    
public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public static function findByLogin($login){
        return self::find()->where(['login'=> $login])->one();
    }

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
            [['name', 'surname', 'patronymic', 'login', 'email', 'password', 'admin'], 'required'],
            [['admin'], 'integer'],
            [['name', 'surname', 'patronymic', 'login', 'email', 'password'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'login' => 'Логин',
            'email' => 'Почта',
            'password' => 'Пароль',
            'admin' => 'Админ',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['user_id' => 'id']);
    }
}
