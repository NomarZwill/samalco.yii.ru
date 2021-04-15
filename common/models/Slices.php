<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "slices".
 *
 * @property int $id
 * @property string $alias
 * @property string $parent_alias
 * @property string $name
 * @property string $params
 */
class Slices extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slices';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alias', 'parent_alias', 'name', 'params'], 'required'],
            [['alias', 'parent_alias', 'name', 'params'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias',
            'parent_alias' => 'parent Alias',
            'name' => 'Name',
            'params' => 'Params',
        ];
    }
}
