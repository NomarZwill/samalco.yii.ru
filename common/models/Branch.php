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
 * @property string $address
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
            [['name', 'alias', 'phone', 'email', 'address', 'map'], 'required'],
            [['name', 'alias', 'phone', 'email', 'address', 'map'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'alias' => 'Alias',
            'phone' => 'Phone',
            'email' => 'Email',
            'address' => 'Address',
            'map' => 'Map',
        ];
    }
}
