<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "slices".
 *
 * @property int $id
 * @property string $alias
 * @property string $breadcrumbs_title
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
            [['alias', 'breadcrumbs_title', 'parent_alias', 'name', 'params'], 'string'],
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
            'breadcrumbs_title' => 'Название хлебной крошки',
            'parent_alias' => 'Родительский alias',
            'name' => 'Имя',
            'params' => 'Params',
        ];
    }

    public function getSubdomenSeo()
    {
        $subdomenSeo = $this->hasOne(PagesSubdomenSeo::className(), ['page_id' => 'id'])->andWhere(['subdomen_alias' => Yii::$app->params['subdomen_alias'], 'page_type' => 'slice']);
          
        return $subdomenSeo;
    }
}
