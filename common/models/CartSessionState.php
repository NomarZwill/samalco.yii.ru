<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cart_session_state".
 *
 * @property int $id
 * @property string $session
 * @property string $name
 * @property string $alloy
 * @property string $params
 * @property int $quantity
 * @property string $weight
 * @property string $real_price
 * @property string $total_price
 */
class CartSessionState extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cart_session_state';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['session', 'name', 'alloy', 'params', 'quantity', 'weight', 'real_price', 'total_price'], 'required'],
            [['session', 'name', 'alloy', 'params', 'weight', 'real_price', 'total_price'], 'string'],
            [['quantity'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'session' => 'Session',
            'name' => 'Name',
            'alloy' => 'Alloy',
            'params' => 'Params',
            'quantity' => 'Quantity',
            'weight' => 'Weight',
            'real_price' => 'Real Price',
            'total_price' => 'Total Price',
        ];
    }
}
