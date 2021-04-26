<?php

namespace frontend\components;

use Yii;
use common\models\Pages;
use common\models\Slices;

class Breadcrumbs
{
  public static function getBreadcrumbs($is_slice = false)
  {
    $currentLink = urldecode(Yii::$app->request->url);
    $linkList = explode('/', $currentLink);
    $linkList = array_diff($linkList, array(''));
    array_unshift($linkList, '');

    $i = 1;

    foreach ($linkList as $link){
       
      if ($is_slice && $i === count($linkList)){

        if (Slices::find()->where(['alias' => $link])->exists()){
          $breadcrumbsList[] = ['name' => Slices::find()->where(['alias' => $link, 'parent_alias' => $linkList[($i - 2)]])->one()->breadcrumbs_title, 'link' => $link];
        }
      } else {

        if (Pages::find()->where(['alias' => $link])->exists()){
          $breadcrumbsList[] = ['name' => Pages::find()->where(['alias' => $link])->one()->breadcrumbs_title, 'link' => $link];
        }
      }
      $i++;
    }

    return $breadcrumbsList;
  }
}