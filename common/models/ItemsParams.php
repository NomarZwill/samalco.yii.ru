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
        if ($paramsList->type === 'tubes' && array_key_exists('diameter', (array)$paramsList)){
            $range = explode('-', $paramsList->diameter);
            return ItemsParams::find()->where(['type' => 'tubes', 'subdomen' => $paramsList->subdomen])->andWhere(['between', 'diameter', $range[0], $range[1]])->andWhere(['>', 'balance', 0])->all();
        }

        if ($paramsList->type === 'tubes' && array_key_exists('width', (array)$paramsList)){
            $range = explode('-', $paramsList->width);
            return ItemsParams::find()->where(['type' => 'tubes', 'subdomen' => $paramsList->subdomen])->andWhere(['between', 'width', $range[0], $range[1]])->andWhere(['>', 'balance', 0])->all();
        }

        return ItemsParams::find()->where((array)$paramsList)->andWhere(['>', 'balance', 0])->all();
    }

    public static function getSliceDataNoBalance($paramsList)
    {
        if ($paramsList->type === 'tubes' && array_key_exists('diameter', (array)$paramsList)){
            $range = explode('-', $paramsList->diameter);
            $tableData = ItemsParams::find()
                ->where(['type' => 'tubes', 'subdomen' => $paramsList->subdomen])
                ->andWhere(['between', 'diameter', $range[0], $range[1]])
                ->andWhere(['=', 'balance', 0])
                ->all();
            return $tableData;
        }

        if ($paramsList->type === 'tubes' && array_key_exists('width', (array)$paramsList)){
            $range = explode('-', $paramsList->width);
            $tableData = ItemsParams::find()
                ->where(['type' => 'tubes', 'subdomen' => $paramsList->subdomen])
                ->andWhere(['between', 'width', $range[0], $range[1]])
                ->andWhere(['=', 'balance', 0])
                ->all();

            return $tableData;
        }

        $tableData = ItemsParams::find()->where((array)$paramsList)->andWhere(['=', 'balance', 0])->all();
        shuffle($tableData);
        return $tableData;
    }

    public static function getMultiparamsSlice($paramsList)
    {
        $getParamsMapping = [
            'C' => 'alloy',
            'H' => 'curing',
            'T' => 'depth',
            'W' => 'width',
            'WT' => 'width', // толщина стенки
            'HT' => 'height',
            'D' => 'diameter',
            'S' => 'section'
        ];

        foreach (Yii::$app->request->get() as $key => $value){

            if ($key != 'q' && $key != 'slice'){
                $currentParam = $getParamsMapping[$key];
                $paramsList->$currentParam = mb_strtoupper($value);
            }
        }
        
        if ($paramsList->type === 'tubes'){
            $paramsListForQuery = (array)$paramsList;
            unset($paramsListForQuery['width']);
            unset($paramsListForQuery['diameter']);

            $tubesSpecQuery = ItemsParams::find()->where($paramsListForQuery)->andWhere(['>', 'balance', 0]);

            if (isset($paramsList->width)){
                $range = explode('-', $paramsList->width);
                $tubesSpecQuery = $tubesSpecQuery->andWhere(['between', 'width', $range[0], $range[1]]);
            }

            if (isset($paramsList->diameter)){
                $range = explode('-', $paramsList->diameter);
                $tubesSpecQuery = $tubesSpecQuery->andWhere(['between', 'diameter', $range[0], $range[1]]);
            }

            return $tubesSpecQuery->all();
        }

        return ItemsParams::find()->where((array)$paramsList)->andWhere(['>', 'balance', 0])->all();
    }

    public static function getMultiparamsSliceNoBalance($paramsList)
    {
        $getParamsMapping = [
            'C' => 'alloy',
            'H' => 'curing',
            'T' => 'depth',
            'W' => 'width',
            'WT' => 'width', // толщина стенки
            'HT' => 'height',
            'D' => 'diameter',
            'S' => 'section'
        ];

        foreach (Yii::$app->request->get() as $key => $value){

            if ($key != 'q' && $key != 'slice'){
                $currentParam = $getParamsMapping[$key];
                $paramsList->$currentParam = mb_strtoupper($value);
            }
        }

        if ($paramsList->type === 'tubes'){
            $paramsListForQuery = (array)$paramsList;
            unset($paramsListForQuery['width']);
            unset($paramsListForQuery['diameter']);

            $tubesSpecQuery = ItemsParams::find()->where($paramsListForQuery)->andWhere(['=', 'balance', 0]);

            if (isset($paramsList->width)){
                $range = explode('-', $paramsList->width);
                $tubesSpecQuery = $tubesSpecQuery->andWhere(['between', 'width', $range[0], $range[1]]);
            }

            if (isset($paramsList->diameter)){
                $range = explode('-', $paramsList->diameter);
                $tubesSpecQuery = $tubesSpecQuery->andWhere(['between', 'diameter', $range[0], $range[1]]);
            }

            return $tubesSpecQuery->all();
        }

        return ItemsParams::find()->where((array)$paramsList)->andWhere(['=', 'balance', 0])->all();
    }


}
