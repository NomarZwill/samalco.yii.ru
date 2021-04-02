<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "items_params".
 *
 * @property int $id
 * @property string $subdomen
 * @property string $alloy
 * @property string $curing
 * @property int $depth
 * @property int $width
 * @property int $length
 * @property string $gost
 * @property int $balance
 * @property int $price
 */
class ItemsParams extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'items_params';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subdomen', 'alloy', 'curing', 'depth', 'width', 'length', 'gost', 'balance', 'price'], 'required'],
            [['subdomen', 'alloy', 'curing', 'gost'], 'string'],
            [['depth', 'width', 'length', 'balance', 'price'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subdomen' => 'Subdomen',
            'alloy' => 'Alloy',
            'curing' => 'Curing',
            'depth' => 'Depth',
            'width' => 'Width',
            'length' => 'Length',
            'gost' => 'Gost',
            'balance' => 'Balance',
            'price' => 'Price',
        ];
    }
}
