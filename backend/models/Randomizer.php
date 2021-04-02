<?php
namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use backend\components\AllParams;

class Randomizer
{
  public function getAllParams(){
    return new AllParams();
  }
}
