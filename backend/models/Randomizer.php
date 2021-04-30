<?php
namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use backend\components\AllParams;
use common\models\ItemsParams;

class Randomizer
{
  private $allParams;

  public function __construct()
  {
    $this->allParams = new AllParams();
  }

  public function getAllParams()
  {
    return $this->allParams;
  }

  public function updateTables()
  {
    $start_time = microtime(true);
    
    $commonData = [];
    $commonData['arrAlloys'] = $this->allParams->arrAlloys;

    # Count of alloy for one domain 
    // $alloyCount = 50;
    $commonData['alloyCount'] = 50;

    # MySQL parametrs
    $commonData['servername'] = "localhost";
    $commonData['username'] = "root";
    $commonData['password'] = "chf54ntgn4c45g7";
    $commonData['dbname'] = "samalco.yii.ru";

    # All subdomains
    $commonData['cities'] = array("moscow", "chelyabinsk", "ekb", "kazan", "kirov", "nn", "nsk", "omsk", "perm", "rostov", "samara", "spb", "tambov", "tula", "tver", "ufa", "volgograd");
    $commonData['rowCount'] = $commonData['alloyCount'] * count($commonData['cities']);

    # Alloys
    $alloys_lists = $this->allParams->arrAlloys['lists']['alloy'];
    $alloys_plates = $this->allParams->arrAlloys['plates']['alloy'];
    $alloys_tubes = $this->allParams->arrAlloys['tubes']['alloy'];
    $alloys_tavrs = $this->allParams->arrAlloys['profils']['profil_tavr']['alloy'];
    $alloys_shvellers = $this->allParams->arrAlloys['profils']['profil_shveller']['alloy'];
    $alloys_dvutavrs = $this->allParams->arrAlloys['profils']['profil_dvutavr']['alloy'];
    $alloys_ugolki = $this->allParams->arrAlloys['profils']['profil_ugolok']['alloy'];
    $alloys_pryamougolniki = $this->allParams->arrAlloys['profils']['profil_pryamougolnik']['alloy'];
    $alloys_tapes = $this->allParams->arrAlloys['tapes']['alloy'];
    $alloys_rods = $this->allParams->arrAlloys['rods']['alloy'];

    $this->updateTable($alloys_lists, 'lists', 		1, 1000, 1, 220, 280, 1, $commonData);
    $this->updateTable($alloys_plates, 'plates', 		1, 1000, 1, 180, 220, 1, $commonData);
    $this->updateTable($alloys_dvutavrs, 'profil_dvutavr', 	1, 1000, 1, 110, 150, 1, $commonData);
    $this->updateTable($alloys_pryamougolniki, 'profil_pryamougolnik', 1, 500, 1, 230, 260, 1, $commonData);
    $this->updateTable($alloys_shvellers, 'profil_shveller', 1, 1000, 1, 110, 150, 1, $commonData);
    $this->updateTable($alloys_tavrs, 'profil_tavr', 		1, 1000, 1, 110, 150, 1, $commonData);
    $this->updateTable($alloys_ugolki, 'profil_ugolok', 		1, 1000, 1, 110, 150, 1, $commonData);
    $this->updateTable($alloys_rods, 'rods', 	300, 1500, 1, 220, 250, 1, $commonData);
    $this->updateTable($alloys_tapes, 'tapes', 	300, 1500, 1, 175, 220, 1, $commonData);
    $this->updateTable($alloys_tubes, 'tubes', 		1, 1000, 1, 110, 150, 1, $commonData);


    $end_time = microtime(true);
    $duration_sec = round(($end_time-$start_time), 1);
    $duration_min = round($duration_sec/60, 2);

    
    echo 'Time duration in seconds: '.$duration_sec. "\n";
    echo 'Time duration in minutes: '.$duration_min. "\n";
    return 'Time duration in minutes: '.$duration_min. "\n";

  }

  function updateTable($alloys, $type, $balance_min, $balance_max, $balance_step, $price_min, $price_max, $price_step, $commonData)
  {
    // Clear all value
    $conn1 = mysqli_connect($commonData['servername'], $commonData['username'], $commonData['password'], $commonData['dbname']);
    $conn1->set_charset("utf8mb4");

    if (!$conn1){
      die("Connection failed: " . mysqli_connect_error());
    }

    $sql1 = "DELETE FROM items_params WHERE `type` = '$type'";
    $result1 = mysqli_query($conn1, $sql1);
    mysqli_close($conn1);
  
    // Set value in random order
    $conn2 = mysqli_connect($commonData['servername'], $commonData['username'], $commonData['password'], $commonData['dbname']);
    $conn2->set_charset("utf8mb4");

    if (!$conn2){
      die("Connection failed: " . mysqli_connect_error());
    }
  
    foreach ($alloys as $alloy) {
      $sql2 = "SELECT * FROM `all_items` WHERE (`type` = '$type' AND `alloy` = '$alloy') ORDER BY RAND() LIMIT " . $commonData['rowCount'];
      $result2 = mysqli_query($conn2, $sql2);
  
      $i = 0;
      while ($row = mysqli_fetch_array($result2)) {
        $city_id = floor($i / $commonData['alloyCount']);
  
        if (($i % $commonData['alloyCount']) == 0) {
          if($type == 'tapes'){
            $balance = $this->getRandomeValue($balance_min, $balance_max, $balance_step);
          } else {
            $balance = $this->getRandomeBalanceValue($balance_min, $balance_max, $balance_step, $row, $type);
          }
        } else {
          $balance = 0;
        }
  
        $real_price = $this->getRandomeValue($price_min, $price_max, $price_step);
        $sql3 = "INSERT INTO `items_params`(`type`, `subdomen`, `alloy`, `curing`, `depth`, `width`, `height`, `length`, `diameter`, `section`, `gost`, `balance`, `price`) VALUES (" . "'" . $row['type'] . "','" . $commonData['cities'][$city_id] . "','" . $row['alloy'] . "','" . $row['curing'] . "','" . $row['depth'] . "','". $row['width'] . "','" . $row['height'] . "','" . $row['length'] . "','" . $row['diameter'] . "','" . $row['section'] . "','" . $row['gost'] . "','$balance','$real_price')";
        $result3 = mysqli_query($conn2, $sql3);
        $i++;
      }
    }
    mysqli_close($conn2);
  }

  function getRandomeValue($min_, $max_, $step_)
  {
    $arr = range($min_, $max_, $step_);
    return $arr[array_rand($arr, 1)];
  }

  function getRandomeBalanceValue($min_, $max_, $step_, $row_, $table_)
  {
    $min_ = $step_ = AllParams::getWeight($row_, $table_);
    $max_init = $max_;

    while ($min_ * $max_ > $max_init && $max_ > 1) 
    {
      $max_--;
    }

    $max_ = $min_ * $max_;
    $arr = range($min_, $max_, $step_);
    return $arr[array_rand($arr, 1)];
  }
}
