<?php

namespace backend\components;

use Yii;
use yii\helpers\ArrayHelper;
use common\models\PagesExtraContent;
use common\models\PagesSubdomenSeo;
use common\models\Subdomen;
use common\models\StaticBlock;

class PageUpdateFormLinks
{
  public static function getLinks($model)
  {
    $subdomens = Subdomen::find()->asArray()->all();
    $subdomens = ArrayHelper::index($subdomens, 'alias');

    if (in_array($model->id, [39, 40, 41, 42]) || ($model->parent_id !== 33 && $model->parent_id !== 40)){

      if (PagesSubdomenSeo::find()->where(['page_id' => $model->id, 'page_type' => $model->type])->exists()){
        echo '<div class="form-group">';
        echo '<h4>Редактировать SEO для субдоменов</h4>';
        echo '<div class="seo_subdomen_wrapper">';

        foreach(PagesSubdomenSeo::find()->where(['page_id' => $model->id, 'page_type' => $model->type])->all() as $subdomenSeo){
          echo '<a href="/pages-subdomen-seo/update/?id=' . $subdomenSeo->id . '&page_id=' . $model->id . '">' . $subdomens[$subdomenSeo->subdomen_alias]['name']  . '</a>';
          unset($subdomens[$subdomenSeo->subdomen_alias]);
        }
        echo '</div>';
        echo '</div>';
      }

      if (count($subdomens) > 0){
        echo '<div class="form-group">';
        echo '<h4>Создать SEO для субдоменов</h4>';
        echo '<div class="seo_subdomen_wrapper">';

        foreach($subdomens as $subdomen){
          echo '<a href="/pages-subdomen-seo/create/?page_id=' . $model->id . '&subdomen_id=' . $subdomen['id'] . '&page_type=' . $model->type . '&is_slice=' . 0 . '">' . $subdomen['name']  . '</a>';
        }
        echo '</div>';
        echo '</div>';

        echo '<a name="subdomen_seo"></a>';
      }

    }

    if (PagesExtraContent::find()->where(['page_id' => $model->id])->exists()){
      $extraContentID = PagesExtraContent::find()
      ->where(['page_id' => $model->id])
      ->one()
      ->id;
      echo '<div class="form-group">';
      echo '<a href="/pages-extra-content/update/?id=' . $extraContentID . '&page_name=' . $model->name . '&page_id=' . $model->id . '">Дополнительный контент</a>';
      echo '</div>';
    }
  }

  public static function getLinksForSlice($model)
  {
    $subdomens = Subdomen::find()->asArray()->all();
    $subdomens = ArrayHelper::index($subdomens, 'alias');

    if (PagesSubdomenSeo::find()->where(['page_id' => $model->id, 'is_slice' => true])->exists()){
      echo '<div class="form-group">';
      echo '<h4>Редактировать SEO для субдоменов</h4>';
      echo '<div class="seo_subdomen_wrapper">';

      foreach(PagesSubdomenSeo::find()->where(['page_id' => $model->id, 'is_slice' => true])->all() as $subdomenSeo){
        echo '<a href="/pages-subdomen-seo/update/?id=' . $subdomenSeo->id . '&page_id=' . $model->id . '">' . $subdomens[$subdomenSeo->subdomen_alias]['name']  . '</a>';
        unset($subdomens[$subdomenSeo->subdomen_alias]);
      }
      echo '</div>';
      echo '</div>';
    }

    if (count($subdomens) > 0){
      echo '<div class="form-group">';
      echo '<h4>Создать SEO для субдоменов</h4>';
      echo '<div class="seo_subdomen_wrapper">';

      foreach($subdomens as $subdomen){
        echo '<a href="/pages-subdomen-seo/create/?page_id=' . $model->id . '&subdomen_id=' . $subdomen['id'] . '&page_type=slice' . '&is_slice=' . 1 . '">' . $subdomen['name']  . '</a>';
      }
      echo '</div>';
      echo '</div>';
      echo '<a name="subdomen_seo"></a>';
    }
  }

  public static function getLinksForIndexPage($model)
  {
    foreach (StaticBlock::find()->where(['id' => [5, 6, 7, 8]])->all() as $block){
      echo '<div class="form-group">';
      echo '<a href="/static-block/update/?id=' . $block->id . '&page_id=' . $model->id . '&page_name=' . $model->name . '">Редактировать статический блок: ' . $block->name . '</a>';
      echo '</div>';
    }
  }

  public static function getLinksForProfiliPage($model)
  {
    foreach (StaticBlock::find()->where(['id' => [9, 10, 11]])->all() as $block){
      echo '<div class="form-group">';
      echo '<a href="/static-block/update/?id=' . $block->id . '&page_id=' . $model->id . '&page_name=' . $model->name . '">Редактировать статический блок: ' . $block->name . '</a>';
      echo '</div>';
    }
  }

  public static function getLinksForProfnastilPage($model)
  {
    foreach (StaticBlock::find()->where(['id' => 12])->all() as $block){
      echo '<div class="form-group">';
      echo '<a href="/static-block/update/?id=' . $block->id . '&page_id=' . $model->id . '&page_name=' . $model->name . '">Редактировать статический блок: ' . $block->name . '</a>';
      echo '</div>';
    }
  }

  public static function getLinksForShinaPage($model)
  {
    foreach (StaticBlock::find()->where(['id' => 13])->all() as $block){
      echo '<div class="form-group">';
      echo '<a href="/static-block/update/?id=' . $block->id . '&page_id=' . $model->id . '&page_name=' . $model->name . '">Редактировать статический блок: ' . $block->name . '</a>';
      echo '</div>';
    }
  }

  public static function getLinksForShtampovkiPage($model)
  {
    foreach (StaticBlock::find()->where(['id' => 14])->all() as $block){
      echo '<div class="form-group">';
      echo '<a href="/static-block/update/?id=' . $block->id . '&page_id=' . $model->id . '&page_name=' . $model->name . '">Редактировать статический блок: ' . $block->name . '</a>';
      echo '</div>';
    }
  }

  public static function getLinksForContactsPage($model)
  {
    foreach (StaticBlock::find()->where(['id' => [15, 16]])->all() as $block){
      echo '<div class="form-group">';
      echo '<a href="/static-block/update/?id=' . $block->id . '&page_id=' . $model->id . '&page_name=' . $model->name . '">Редактировать статический блок: ' . $block->name . '</a>';
      echo '</div>';
    }
  }
}