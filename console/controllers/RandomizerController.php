<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use backend\models\Randomizer;

class RandomizerController extends Controller
{

	public function actionTest()
	{
    $log = file_get_contents('/var/www/samalco.yii.ru/log/randomizer.log');
    date_default_timezone_set('Europe/Moscow');
    $date = date('d/m/Y h:i:s a', time());
    $log .= json_encode(['test' => 'hi from the deep!', 'date' => $date]);
    file_put_contents('/var/www/samalco.yii.ru/log/randomizer.log', $log);
    echo 'hi from the deep!';
    exit;
	}

  public function actionUpdateTables()
  {
    $log = file_get_contents('/var/www/samalco.yii.ru/log/randomizer.log');
    date_default_timezone_set('Europe/Moscow');
    $date = date('d/m/Y h:i:s a', time());
    $log .= json_encode(['start' => '', 'date' => $date]);
    file_put_contents('/var/www/samalco.yii.ru/log/randomizer.log', $log);

    $randomizer = new Randomizer();
    $result = $randomizer->updateTables();

    $log = file_get_contents('/var/www/samalco.yii.ru/log/randomizer.log');
    $date = date('d/m/Y h:i:s a', time());
    $log .= json_encode(['result' => $result, 'date' => $date]);
    file_put_contents('/var/www/samalco.yii.ru/log/randomizer.log', $log);

    echo "конец</br>";
    exit;
  }
}