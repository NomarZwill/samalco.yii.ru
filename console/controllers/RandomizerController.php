<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use backend\models\Randomizer;

class RandomizerController extends Controller
{

	public function actionTest()
	{
		echo 'hi frop the deep!';
	}

  public function actionUpdateTables()
  {
    $randomizer = new Randomizer();
    $randomizer->updateTables();
    echo "конец</br>";
    exit;
  }
}