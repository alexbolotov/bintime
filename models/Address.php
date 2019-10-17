<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $id
 * @property int $index
 * @property string $country
 * @property string $city
 * @property string $street
 * @property string $house
 * @property string $apartment
 * @property int $user_id
 *
 * @property Users $user
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['index', 'country', 'city', 'street', 'house'], 'required'],
            [['index', 'user_id'], 'integer'],
            [['country'], 'string', 'max' => 2, 'min' => 2],
            [['country'], 'match', 'pattern' => '/^[A-Z]/', 'message' => '2-х буквенный код, только верхний регистр, латиница'],
            [['city', 'street', 'house', 'apartment'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'index' => 'Почтовый индекс',
            'country' => 'Страна',
            'city' => 'Город',
            'street' => 'Улица',
            'house' => 'Дом',
            'apartment' => 'Офис/Квартира',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
