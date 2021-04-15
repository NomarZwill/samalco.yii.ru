<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pages_extra_content".
 *
 * @property int $id
 * @property int $page_id
 * @property string $menu_image
 * @property string $menu_name
 */
class PagesExtraContent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pages_extra_content';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['page_id', 'menu_image', 'menu_name'], 'required'],
            [['page_id'], 'integer'],
            [['menu_image', 'menu_name'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page_id' => 'Page ID',
            'menu_image' => 'Menu Image',
            'menu_name' => 'Menu Name',
        ];
    }
}
