<?php

namespace backend\components;

use Yii;
use common\models\AllItems;


$allItems = AllItems::find()->all();
// exit;
// require '/var/www/samalco.ru/assets/parser/db_access.php';

// $file['lists_new'] = __DIR__."/lists_new.csv";
// $fieds['lists_new'] = "alloy;plating;curing;depth;width;length;gost;balance;real_price";
// $link = mysql_connect($db_serv, $db_user, $db_pass) or die('Не удалось соединиться: ' . mysql_error());
// mysql_set_charset('cp1251',$link);
// mysql_select_db($db_name) or die('Не удалось выбрать базу данных');


// foreach($file as $key => $value)
// {
// 	if (!isset($fieds[$key])) die ("Fields dont exists('".$key."')");
// 	if (!file_exists($file[$key])) die ("File dont exists('".$key.".csv')");
	
// 	mysql_query("TRUNCATE TABLE `modx_programm_".$key."`");

// 	$f = explode(";", $fieds[$key]);
// 	$data = file($file[$key]);
	
// 	foreach($data as $line)
// 	{
// 		$d = explode(";", $line);	

// 		for($i=0;$i<count($d);$i++)
// 			$sql[] = "`".$f[$i]."`='".$d[$i]."'";
			
// 		$sql_exec = "INSERT INTO modx_programm_".$key." SET ".implode(",", $sql);	
// 		mysql_query($sql_exec) or die("SQL ERROR: ".mysql_error()."<hr/>".$sql_exec);
		
// 		unset($sql_exec, $sql, $d);
// 	}
// }

// echo "DONE";
?>