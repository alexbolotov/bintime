<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property string $name
 * @property string $surname
 * @property string $gender
 * @property string $date
 * @property string $email
 * @property int $index
 * @property string $country
 * @property string $city
 * @property string $street
 * @property string $house
 * @property string $apartment
 *
 * @property Address[] $addresses
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password', 'name', 'surname', 'gender', 'email', 'index', 'country', 'city', 'street', 'house'], 'required'],
            [['login'], 'string', 'min' => 4],
            [['password'], 'string', 'min' => 6],
            [['name'], 'match', 'pattern' => '/^[A-ZА-ЯЁ\s][a-zа-яё\s]+$/u', 'message' => 'Имя должно начинаться с большой буквы и может содержать только буквы'],
            [['surname'], 'match', 'pattern' => '/^[A-ZА-ЯЁ\s][a-zа-яё\s]+$/u', 'message' => 'Фамилия должна начинаться с большой буквы и может содержать только буквы'],
            [['date'], 'safe'],
            [['date'], 'date', 'format' => 'php:Y-m-d H:m:s'],
            [['date'], 'default', 'value' => date('Y-m-d H:m:s')],
            [['index'], 'integer'],
            [['email'], 'email'],
            [['country'], 'string', 'max' => 2, 'min' => 2],
            [['country'], 'match', 'pattern' => '/^[A-Z]/', 'message' => '2-х буквенный код, только верхний регистр, латиница'],
            [['login', 'password', 'name', 'surname', 'gender', 'email', 'city', 'street', 'house', 'apartment'], 'string', 'max' => 255],
            [['login'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'gender' => 'Пол',
            'date' => 'Дата создания',
            'email' => 'Email',
            'index' => 'Почтовый индекс',
            'country' => 'Страна',
            'city' => 'Город',
            'street' => 'Улица',
            'house' => 'Дом',
            'apartment' => 'Офис/Квартира',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddresses()
    {
        return $this->hasOne(Address::className(), ['user_id' => 'id']);
    }
}
