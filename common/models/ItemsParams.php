<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "items_params".
 *
 * @property int $id
 * @property string $type
 * @property string $subdomen
 * @property string $alloy
 * @property string $curing
 * @property double $depth
 * @property int $width
 * @property int $length
 * @property double $diameter
 * @property string $section
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
            [['type', 'subdomen', 'alloy', 'curing', 'depth', 'width', 'length', 'diameter', 'section', 'gost', 'balance', 'price'], 'required'],
            [['type', 'subdomen', 'alloy', 'curing', 'gost'], 'string'],
            [['depth', 'diameter'], 'number'],
            [['width', 'length', 'balance', 'price'], 'integer'],
            [['section'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'subdomen' => 'Subdomen',
            'alloy' => 'Alloy',
            'curing' => 'Curing',
            'depth' => 'Depth',
            'width' => 'Width',
            'length' => 'Length',
            'diameter' => 'Diameter',
            'section' => 'Section',
            'gost' => 'Gost',
            'balance' => 'Balance',
            'price' => 'Price',
        ];
    }

    public static function getSliceData($paramsList)
    {
        if (count((array)$paramsList) == 2){
            return ItemsParams::find()->where(['subdomen' => $paramsList->subdomen])->andWhere(['type' => $paramsList->type])->andWhere(['>', 'balance', 0])->all();
        }

        return 0;
    }

    public static function getSliceDataNoBalance($paramsList)
    {
        if (count((array)$paramsList) == 2){
            $tableData = ItemsParams::find()->where(['subdomen' => $paramsList['subdomen']])->andWhere(['type' => $paramsList['type']])->andWhere(['=', 'balance', 0])->all();
            shuffle($tableData);
            return $tableData;
        }

        return 0;
    }
}
