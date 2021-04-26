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
 * @property string $breadcrumbs_title
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
            // [['type', 'name', 'alias', 'header', 'title', 'description', 'keywords'], 'required'],
            [['parent_id'], 'integer'],
            [['type', 'name', 'alias', 'breadcrumbs_title', 'header', 'title', 'description', 'keywords', 'content'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Родительский ID',
            'type' => 'Тип',
            'name' => 'Имя',
            'alias' => 'Alias',
            'breadcrumbs_title' => 'Название хлебной крошки',
            'header' => 'Header',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'content' => 'Статический контент',
        ];
    }

    public function getSubdomenSeo()
    {
        $subdomenSeo = $this->hasOne(PagesSubdomenSeo::className(), ['page_id' => 'id', 'page_type' => 'type'])->andWhere(['subdomen_alias' => Yii::$app->params['subdomen_alias']]);
          
        return $subdomenSeo;
    }

    public function getExtraContent()
    {
        $extraContent = $this->hasOne(PagesExtraContent::className(), ['page_id' => 'id']);
          
        return $extraContent;
    }

}
