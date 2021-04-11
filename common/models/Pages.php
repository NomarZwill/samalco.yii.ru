<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pages".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $type
 * @property string $name
 * @property string $alias
 * @property string $header
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $content
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'name', 'alias', 'header', 'title', 'description', 'keywords'], 'required'],
            [['parent_id'], 'integer'],
            [['type', 'name', 'alias', 'header', 'title', 'description', 'keywords', 'content'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'parent_id',
            'type' => 'Type',
            'name' => 'Name',
            'alias' => 'Alias',
            'header' => 'Header',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'content' => 'content',
        ];
    }
}
