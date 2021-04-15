<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pages_subdomen_seo".
 *
 * @property int $id
 * @property string $subdomen_alias
 * @property int $page_id
 * @property string $page_type
 * @property string $header
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $text_1
 * @property string $text_2
 * @property string $text_3
 */
class PagesSubdomenSeo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pages_subdomen_seo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['subdomen_alias', 'page_type', 'header', 'title', 'description', 'keywords', 'text_1', 'text_2', 'text_3'], 'required'],
            [['subdomen_alias', 'page_type', 'header', 'title', 'description', 'keywords', 'text_1', 'text_2', 'text_3'], 'string'],
            [['page_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subdomen_alias' => 'Subdomen Alias',
            'page_id' => 'Page id',
            'page_type' => 'Page Type',
            'header' => 'Header',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'text_1' => 'Text 1',
            'text_2' => 'Text 2',
            'text_3' => 'Text 3',
        ];
    }
}
