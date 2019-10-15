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
            [['index', 'country', 'city', 'street', 'house', 'user_id'], 'required'],
            [['index', 'user_id'], 'integer'],
            [['country', 'city', 'street', 'house', 'apartment'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'index' => 'Index',
            'country' => 'Country',
            'city' => 'City',
            'street' => 'Street',
            'house' => 'House',
            'apartment' => 'Apartment',
            'user_id' => 'User ID',
        ];
    }
}
