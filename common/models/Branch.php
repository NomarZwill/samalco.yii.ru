<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "branch".
 *
 * @property int $id
 * @property string $name
 * @property string $alias
 * @property string $phone
 * @property string $email
 * @property string $postalCode
 * @property string $addressLocality
 * @property string $streetAddress
 * @property string $map
 */
class Branch extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'branch';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['name', 'alias', 'phone', 'email', 'postalCode', 'addressLocality', 'streetAddress', 'map'], 'required'],
            [['name', 'alias', 'phone', 'email', 'postalCode', 'addressLocality', 'streetAddress', 'map'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название филиала',
            'alias' => 'alias',
            'phone' => 'Телефон',
            'email' => 'Email',
            'postalCode' => 'Почтовый индекс',
            'addressLocality' => 'Город',
            'streetAddress' => 'Улица',
            'map' => 'Ссылка на карту',
        ];
    }
}
