<?php
exit;
// 	Запуск скрипта в SSH следующей командой:
// 		/usr/bin/php -f /var/www/samalco.ru/assets/parser/tableGenerate_profil_pryamougolnik.php
$aluFormType = "profil_pryamougolnik";
	
$balanceMin = 3;	$balanceMax = 100;	$balanceIncrement = 1;
$priceMin = 110;	$priceMax = 150;	$priceIncrement = 1;
//----------------------
$alloys = ["АД31", "АД33", "АД35", "6060", "6063", "АВ", "Д1", "Д16", "Д16ч", "Д19", "Д19ч", "АК4", "АК4-1", "АК4-1ч", "АК6", "АК6ч", "В95", "В95ч", "1915", "1925", "1925С", "1935", "АМц", "АМцС", "АМг2", "АМг3", "АМг3С", "АМг5", "АМг6", "1561"];

$heatTreatements = [
	'Т'=> [
		"АД31", "АД33", "АД35", "6060", "6063", "АВ", "Д1", "Д16", "Д16ч", "Д19", "Д19ч", "АК4", "АК4-1", "АК4-1ч", "АК6", "АК6ч", "В95", "В95ч", "1915", "1925", "1925С", "1935"
	],
	'Т1'=> [
		"АД31", "АД33", "АД35", "6060", "6063", "АВ", "Д1", "Д16", "Д16ч", "Д19", "Д19ч", "АК4", "АК4-1", "АК4-1ч", "АК6", "АК6ч", "В95", "В95ч", "1915", "1925", "1925С", "1935"
	],
	'М'=> [
		"АМц", "АМцС", "АМг2", "АМг3", "АМг3С", "АМг5", "АМг6", "1561"
	]
];

$depths = ["1", "3", "5", "8", "10", "15", "20", "25", "30"];
$heights = ["10", "20", "30", "40", "50", "60", "70", "80", "90", "100", "120", "150", "180", "200", "220", "250", "280", "300"];
$widths = ["10", "20", "30", "40", "50", "60", "70", "80", "90", "100", "120", "150", "180", "200", "220", "250", "280", "300"];
$lengths = ["1500", "2000", "3000", "4000", "5000", "6000", "7000", "8000", "9000", "10000", "11000", "12000"];

$diameter = 0;
$section = '';
$gostTemp = '';

$file = "/var/www/samalco.yii.ru/backend/components/$aluFormType.csv";

//Запись в файл
file_put_contents($file, "", LOCK_EX);	//предварительно чистим


foreach($heatTreatements as $heatTreatement => $alloys){
	foreach($alloys as $alloy){
		foreach($depths as $depth){
			foreach($heights as $height){
				foreach($widths as $width){
					foreach($lengths as $length){
						if($height>$width || $height/$depth<3 || $width/$depth<3) {continue;}
						$price = rand($priceMin, $priceMax);
						$balance = rand($balanceMin, $balanceMax);
						$stringLine = "$alloy;$heatTreatement;$depth;$width;$height;$length;$diameter;$section;$gostTemp\n";

						file_put_contents($file, $stringLine, FILE_APPEND | LOCK_EX);
					}
				}
			}
		}
	}
}
