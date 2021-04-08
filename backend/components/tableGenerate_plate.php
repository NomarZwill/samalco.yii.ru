<?php
exit;
// 	Запуск скрипта в SSH следующей командой:
// 		/usr/bin/php -f /var/www/samalco.ru/assets/parser/tableGenerate_plate.php
$aluFormType = "plates";
	
$balanceMin = 3;	$balanceMax = 100;	$balanceIncrement = 1;
$priceMin = 110;	$priceMax = 150;	$priceIncrement = 1;
//----------------------
$alloys = array("АД33", "ПАС-2", "ПАС-1", "АБТ-101", "АК4", "1163", "1915", "ВД1", "Д16Ч", "В95", "Д16", "Д1", "АВ", "АМГ5", "АМГ2", "АД1", "А5", "АМЦ", "АД0", "АД", "А6", "А7", "АМГ3", "АМГ6", "АД31", "АД35", "Д19", "Д19ч", "Д20", "В95пч", "В95оч", "АК4-1", "АК4-1ч", "1201", "1105", "1560", "АБТ-102", "5083", "1561", "6061", "7075", "1980", "1933");
$alloys_1 = array("АД31", "АД35", "Д19", "Д19ч", "Д20", "В95пч", "В95оч", "АК4-1", "АК4-1ч", "1201", "1105", "АБТ-101", "АБТ-102", "6061", "7075", "1980", "1933", "ПАС-2", "ПАС-1", "АД33", "АК4", "1163", "1915", "ВД1", "Д16Ч", "В95", "Д16", "Д1", "АВ");
$alloys_2 = array("АД0", "АД", "А6", "А7", "АМГ3", "АМГ6", "АД31", "АД35", "Д19", "Д19ч", "Д20", "В95пч", "В95оч", "АК4-1", "АК4-1ч", "1105", "1560", "1561", "АБТ-102", "5083", "1201", "6061", "7075", "1980", "1933", "АМГ5", "АМГ2", "АД1", "А5", "АМЦ", "АД33", "АК4", "1163", "1915", "ВД1", "Д16Ч", "В95", "Д16", "Д1", "АВ");
$alloys_3 = $alloys;

$heatTreatements = array("без т/о", "М", "Т");
$heatTreatements_1 = array("Т");
$heatTreatements_2 = array("М");
$heatTreatements_3 = array("без т/о");

$lengths = array("2000", "2500", "3000", "3500", "4000", "4500", "5000", "5500", "6000", "6500", "7000");
$depths = array("10.5", "13", "15", "17", "20", "25", "30", "35", "40", "45", "50", "60", "70", "80", "90", "100", "110", "120", "130", "140", "150", "160", "170", "180", "190", "200");
$widths = array("1000", "1200", "1500", "2000");

$height = 0;
$diameter = 0;
$section = '';
$gostTemp = '';

$file = "/var/www/samalco.yii.ru/backend/components/$aluFormType.csv";

//Запись в файл
file_put_contents($file, "", LOCK_EX);	//предварительно чистим

foreach($alloys as $alloy){
	foreach($heatTreatements as $heatTreatement){
		foreach($depths as $depth){
			foreach($widths as $width){
				foreach($lengths as $length){
					if(	(in_array($heatTreatement, $heatTreatements_1) && in_array($alloy, $alloys_1)) || 
						(in_array($heatTreatement, $heatTreatements_2) && in_array($alloy, $alloys_2)) ||
						(in_array($heatTreatement, $heatTreatements_3) && in_array($alloy, $alloys_3))
					) {
						$stringLine = "$alloy;$heatTreatement;$depth;$width;$height;$length;$diameter;$section;$gostTemp\n";
						file_put_contents($file, $stringLine, FILE_APPEND | LOCK_EX);
					}
				}
			}
		}
	}
}
