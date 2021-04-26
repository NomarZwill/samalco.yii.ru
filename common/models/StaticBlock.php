<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "static_block".
 *
 * @property int $id
 * @property string $name
 * @property string $content
 */
class StaticBlock extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'static_block';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'content'], 'required'],
            [['name', 'content'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'content' => 'Контент',
        ];
    }
}
