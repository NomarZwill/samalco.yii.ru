<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "subdomen".
 *
 * @property int $id
 * @property string $alias
 * @property string $name
 * @property string $name_dec
 * @property string $name_rod
 */
class Subdomen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subdomen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alias', 'name', 'name_dec', 'name_rod'], 'required'],
            [['alias', 'name', 'name_dec', 'name_rod'], 'string'],
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
            'name' => 'Name',
            'name_dec' => 'Name Dec',
            'name_rod' => 'Name Rod',
        ];
    }
}
