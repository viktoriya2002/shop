<?php 

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class RegForm extends User
{
 public $confirm_password;
 public $agree;
 public function rules()
 {
    return [
    [['name', 'surname', 'patronymic', 'login', 'email', 'password', 'confirm_password', 'agree'], 'required'],
    [['name', 'surname', 'patronymic'], 'match', 'pattern' => '/^[А-Яёа-яё]{5,}$/u', 'message'=>'Используйте минимум 5 русских букв'],[['password'], 'match', 'pattern'=>'/^[A-Za-z0-9]{5,}$/',
    'message'=>'Используйте минимум 5 латинских букв и цифр'],
    [['email'], 'email'],
    [['email'], 'unique'],
    [['agree'], 'compare', 'compareValue'=>true, 'message'=>''],
    [['confirm_password'], 'compare', 'compareAttribute'=>'password'],
    [['admin'], 'integer'],
    [['name', 'surname', 'patronymic', 'login', 'email', 'password'], 'string', 'max' => 255],
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
    'admin' => 'Is Admin',
    'confirm_password' => 'Повторите пароль',
    'agree' => 'Подтвердите согласие на обработку персональных данных',
    ];
 }
}
?>