<?php
exit;
// $file['lists'] = __DIR__."/lists.csv";
// $file['plates'] = __DIR__."/plates.csv";
// $file['profil_dvutavr'] = __DIR__."/profil_dvutavr.csv";
// $file['profil_pryamougolnik'] = __DIR__."/profil_pryamougolnik.csv";
// $file['profil_shveller'] = __DIR__."/profil_shveller.csv";
// $file['profil_tavr'] = __DIR__."/profil_tavr.csv";
// $file['profil_ugolok'] = __DIR__."/profil_ugolok.csv";
// $file['rods'] = __DIR__."/rods.csv";
// $file['tapes'] = __DIR__."/tapes.csv";
// $file['tubes'] = __DIR__."/tubes.csv";
$file['lists_ribbed'] = __DIR__."/lists_ribbed.csv";

// $fieds['lists'] = "alloy;heatTreatement;depth;width;height;lenght;diameter;section;gostTemp";
// $fieds['plates'] = "alloy;heatTreatement;depth;width;height;lenght;diameter;section;gostTemp";
// $fieds['profil_dvutavr'] = "alloy;heatTreatement;depth;width;height;lenght;diameter;section;gostTemp";
// $fieds['profil_pryamougolnik'] = "alloy;heatTreatement;depth;width;height;lenght;diameter;section;gostTemp";
// $fieds['profil_shveller'] = "alloy;heatTreatement;depth;width;height;lenght;diameter;section;gostTemp";
// $fieds['profil_tavr'] = "alloy;heatTreatement;depth;width;height;lenght;diameter;section;gostTemp";
// $fieds['profil_ugolok'] = "alloy;heatTreatement;depth;width;height;lenght;diameter;section;gostTemp";
// $fieds['rods'] = "alloy;heatTreatement;depth;width;height;lenght;diameter;section;gostTemp";
// $fieds['tapes'] = "alloy;heatTreatement;depth;width;height;lenght;diameter;section;gostTemp";
// $fieds['tubes'] = "alloy;heatTreatement;depth;width;height;lenght;diameter;section;gostTemp";
$fieds['lists_ribbed'] = "alloy;heatTreatement;depth;width;height;lenght;diameter;section;gostTemp";

$servername = "localhost";
$username = "root";
$password = "LP_db_";
$dbname = "samalco.yii.ru";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die(mysql_error());
if (!$conn->set_charset("utf8mb4")) {
	echo "Ошибка при загрузке набора символов utf8mb4: \n" . ' ' . $conn->error . "\n";
	exit();
} else {
	echo "Текущий набор символов: \n" . ' ' . $conn->character_set_name() . "\n";
}

foreach($file as $key => $value)
{
	if (!isset($fieds[$key])) die ("Fields dont exists('".$key."')");
	if (!file_exists($file[$key])) die ("File dont exists('".$key.".csv')");
	
	// mysql_query("TRUNCATE TABLE `modx_programm_".$key."`");

	$f = explode(";", $fieds[$key]);
	$data = file($file[$key]);	
	
	foreach($data as $line)
	{
		$d = explode(";", $line);	

		for($i=0;$i<count($d);$i++)
			$sql[] = "'" . $d[$i] . "'";
			
		$sql_exec = "INSERT INTO `all_items` (`type`, `alloy`, `curing`, `depth`, `width`, `height`, `length`, `diameter`, `section`, `gost`) VALUES ('lists_ribbed', " . implode(",", $sql) . ")";	
		mysqli_query($conn, $sql_exec) or die("SQL ERROR: ".mysql_error()."<hr/>".$sql_exec);
		// exit;
		unset($sql_exec, $sql, $d);
	}
}

echo "DONE\n";
?>