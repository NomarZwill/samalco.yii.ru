<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pages_extra_content".
 *
 * @property int $id
 * @property int $page_id
 * @property string $menu_image
 * @property string $sidebar_image
 * @property string $sidebar_name
 * @property string $menu_name
 * @property string $name_rod
 * @property string $common_text_1
 * @property string $common_text_2
 * @property string $common_text_3
 * @property string $common_text_4
 * @property string $favorite_alloy
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
            [['menu_image', 'sidebar_image', 'sidebar_name', 'menu_name', 'name_rod', 'common_text_1', 'common_text_2', 'common_text_3', 'common_text_4', 'favorite_alloy'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page_id' => 'ID страницы',
            'menu_image' => 'Изображение для меню (главная, каталог)',
            'menu_name' => 'Название для меню',
            'favorite_alloy' => 'Срезы для меню',
            'sidebar_image' => 'Изображение для бокового меню',
            'sidebar_name' => 'Название для бокового меню',
        ];
    }
}
