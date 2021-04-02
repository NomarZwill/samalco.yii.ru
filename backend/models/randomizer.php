<?php

require '/var/www/samalco.yii.ru/backend/models/all_params.php';

#		Для запуска скрипта вручную в консоли:
# 			/usr/bin/php -f /var/www/samalco.ru/assets/parser/randomizer.php
#------------------------------------------------------------------------------------------------------------
$start_time = microtime(true);

# Count of alloy for one domain 
$alloyCount = 50;
# MySQL parametrs
$servername = "localhost";
$username = "samalco";
$password = "Dy8Om2gE";
$dbname = "new_samalco.ru";

# All subdomains
$cities = array("moscow", "chelyabinsk", "ekb", "kazan", "kirov", "nn", "nsk", "omsk", "perm", "rostov", "samara", "spb", "tambov", "tula", "tver", "ufa", "volgograd");
$rowCount = $alloyCount*count($cities);

# Alloys
$alloys_lists = $arrAlloys['lists']['alloy'];
$alloys_plates = $arrAlloys['plates']['alloy'];
$alloys_tubing = $arrAlloys['tubing']['alloy'];
$alloys_tavrs = $arrAlloys['profils']['tavrs']['alloy'];
$alloys_shvellers = $arrAlloys['profils']['shvellers']['alloy'];
$alloys_dvutavrs = $arrAlloys['profils']['dvutavrs']['alloy'];
$alloys_ugolki = $arrAlloys['profils']['ugolki']['alloy'];
$alloys_pryamougolniki = $arrAlloys['profils']['pryamougolniki']['alloy'];
$alloys_tapes = $arrAlloys['tapes']['alloy'];
$alloys_rods = $arrAlloys['rods']['alloy'];

# Run randomize
updateTable($alloys_pryamougolniki, 'pryamougolniki', 1, 500, 1, 230, 260, 1);
updateTable($alloys_ugolki, 'ugolki', 		1, 1000, 1, 110, 150, 1);
updateTable($alloys_plates, 'plates', 		1, 1000, 1, 180, 220, 1);
updateTable($alloys_lists, 'lists', 		1, 1000, 1, 220, 280, 1);
updateTable($alloys_tubing, 'tubing', 		1, 1000, 1, 110, 150, 1);
updateTable($alloys_tavrs, 'tavrs', 		1, 1000, 1, 110, 150, 1);
updateTable($alloys_shvellers, 'shvellers', 1, 1000, 1, 110, 150, 1);
updateTable($alloys_dvutavrs, 'dvutavrs', 	1, 1000, 1, 110, 150, 1);
updateTable($alloys_tapes, 'tapes', 	300, 1500, 1, 175, 220, 1);
updateTable($alloys_rods, 'rods', 	300, 1500, 1, 220, 250, 1);

#_______________________________________________________________________________________________________________________________________
#---------------------------------- FUNCTIONs ------------------------------------------------------------------------------------------

function updateTable($alloys, $table, $balance_min, $balance_max, $balance_step, $price_min, $price_max, $price_step) {
	global $alloyCount, $servername, $username, $password, $dbname, $cities, $rowCount, $density, $arrAlloys, $k;

	// Clear all value
	$conn1 = mysqli_connect($servername, $username, $password, $dbname);
	mysqli_set_charset($conn1, "utf8");
	if (!$conn1) {die("Connection failed: " . mysqli_connect_error());}
	$sql1 = "UPDATE modx_programm_".$table." SET domain = '', balance = 0, real_price = 0 WHERE domain <> '' OR balance <> 0 OR real_price <> 0";
	$result1 = mysqli_query($conn1, $sql1);
	mysqli_close($conn1);

	// Set value in random order
	$conn2 = mysqli_connect($servername, $username, $password, $dbname);
	mysqli_set_charset($conn2, "utf8");
	if (!$conn2) {die("Connection failed: " . mysqli_connect_error());}

	foreach ($alloys as $alloy) {
		$sql2 = "SELECT * FROM modx_programm_".$table." WHERE (domain = '' AND alloy = '$alloy') ORDER BY RAND() LIMIT $rowCount";
		$result2 = mysqli_query($conn2, $sql2);

		$i = 0;
		while ($row = mysqli_fetch_array($result2)) {
			$city_id = floor($i/$alloyCount);

			if (($i % $alloyCount) == 0) {
				if($table == 'tapes'){
					$balance = getRandomeValue($balance_min, $balance_max, $balance_step);
				} else {
					$balance = getRandomeBalanceValue($balance_min, $balance_max, $balance_step, $density, $row, $table, $k);
				}
			} else {
				$balance = 0;
			}

			$real_price = getRandomeValue($price_min, $price_max, $price_step);
		   	$sql3 = "UPDATE modx_programm_".$table." SET domain = '$cities[$city_id]', balance = $balance, real_price = $real_price WHERE (id = $row[id])";
		   	$result3 = mysqli_query($conn2, $sql3);
		   	$i++;
		}
	}

	mysqli_close($conn2);
}

function getRandomeBalanceValue($min_, $max_, $step_, $density_, $row_, $table_, $k_) {
	$min_ = $step_ = getWeight($density_, $row_, $table_);
	$max_init = $max_;
	while ($min_*$max_>$max_init && $max_>1) { $max_--; }
	$max_ = $min_*$max_;
	$arr = range($min_, $max_, $step_);
	return $arr[array_rand($arr, 1)];
}

function getRandomeValue($min_, $max_, $step_) {
	$arr = range($min_, $max_, $step_);
	return $arr[array_rand($arr, 1)];
}
#---------------------------------- FUNCTIONs END --------------------------------------------------------------------------------------

$end_time = microtime(true);
$duration_sec = round(($end_time-$start_time), 1);
$duration_min = round($duration_sec/60, 2);

echo 'Time duration in seconds: '.$duration_sec. "\n";
echo 'Time duration in minutes: '.$duration_min. "\n";


?>