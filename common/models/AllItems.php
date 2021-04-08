<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "all_items".
 *
 * @property int $id
 * @property string $type
 * @property string $alloy
 * @property string $curing
 * @property double $depth
 * @property int $width
 * @property int $length
 * @property double $diameter
 * @property string $section
 * @property string $gost
 */
class AllItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'all_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'alloy', 'curing', 'depth', 'width', 'length', 'diameter', 'section', 'gost'], 'required'],
            [['type', 'alloy', 'curing', 'gost'], 'string'],
            [['depth', 'diameter'], 'number'],
            [['width', 'length'], 'integer'],
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
            'alloy' => 'Alloy',
            'curing' => 'Curing',
            'depth' => 'Depth',
            'width' => 'Width',
            'length' => 'Length',
            'diameter' => 'Diameter',
            'section' => 'Section',
            'gost' => 'Gost',
        ];
    }
}
