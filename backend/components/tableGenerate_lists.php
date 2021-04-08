<?php
exit;
$aluFormType = "lists";
	
//Данные для сплавов
$alloys = array("АД0", "АД", "АМцС", "А0", "А6", "А7", "АМг3", "АМг4.5", "АМг6", "5251", "5754", "АД35", "Д19", "В95пч", "В95оч", "1201", "Д20", "АБТ-102", "1560", "1561", "5083", "7075", "6061", "6082", "1903", "3003", "3004", "3005", "АК4-1ч", "АД33", "Д16ч", "АБТ-101", "АК4-1", "1105", "Д19ч", "Д16", "1925", "АК4", "1163", "1915", "ВД1", "В95", "Д1", "АВ", "АМг5", "АМг2", "АД1", "А5", "АМц");
$alloys_1 = array("АД0", "АД1", "АД", "АМц", "АМцС", "А0", "А5", "А6", "А7", "АМг2", "АМг3", "АМг4.5", "АМг5", "АМг6", "5251", "5754", "5083", "3003", "3004", "3005");
$alloys_2 = array("АВ", "АД33", "АД35", "Д1", "Д16", "Д16ч", "Д19", "Д19ч", "1915", "В95", "В95пч", "В95оч", "1201", "Д20", "ВД1", "1105", "АБТ-101", "АБТ-102", "1560", "1561", "7075", "6061", "6082", "1163", "АК4-1ч", "1903", "АК4-1", "1925", "АК4");

$heatTreatements = array("М", "Н", "Н2", "Н12", "Н22", "Н14", "Н24", "Н32", "Н34", "Н16", "Н111", "Н321", "Н114", "Н224", "Н244", "Т", "Т1");
$heatTreatements_1 = array("М", "Н", "Н2", "Н12", "Н22", "Н14", "Н24", "Н32", "Н34", "Н16", "Н111", "Н321", "Н114", "Н224", "Н244");
$heatTreatements_2 = array("М", "Т", "Т1");
// 1) М, Н, Н2, Н12, Н22, Н14, Н24, Н32, Н34,  Н16, Н111, Н321, Н114, Н224, Н244 --->>> для спалвов: АД0, АД1, АД, АМц, АМцС, А0, А5, А6, А7, АМг2, АМг3, АМг4.5, АМг5, АМг6, 5251, 5754, 5083, 3003, 3004, 3005
// 2) М, Т, Т1 --->>> для спалвов: АВ, АД33, АД35, Д1, Д16, Д16ч, Д19, Д19ч, 1915, В95, В95пч, В95оч, 1201, Д20, ВД1, 1105, АБТ-101, АБТ-102, 1560, 1561, 1201, 7075, 6061, 6082, 1163, АК4-1ч, 1903

$depthMin = 0.5;	$depthMax = 10.5;	$depthIncrement = 0.5;
$depths = range($depthMin, $depthMax, $depthIncrement);

$widths = array("1000", "1200", "1500", "1800", "2000", "2500");

$lengthMin = 2000;	$lengthMax = 8000;	$lengthIncrement = 500;
$lengths = range($lengthMin, $lengthMax, $lengthIncrement);

$height = 0;
$diameter = 0;
$section = '';

//ГОСТы
//ГОСТ 21631-76
$gost_21631_76 = array("А6", "А7", "А5", "А0", "АД0", "АД1", "АД", "АМц", "АМцС", "АМг2", "АМг3", "АМг5", "АМг6", "АВ", "1915", "ВД1", "Д16", "В95", "Д1", "АД35", "1560", "5083", "3003", "3004", "3005");

$file = "/var/www/samalco.yii.ru/backend/components/$aluFormType.csv";

//Запись в файл
file_put_contents($file, "", LOCK_EX);	//предварительно чистим

$counter = 0;
$outCount = 1;

foreach($alloys as $alloy){
	if(in_array($alloy, $gost_21631_76)) {$gostTemp="ГОСТ 21631-76";} else {$gostTemp="-";}
	foreach($heatTreatements as $heatTreatement){
		foreach($depths as $depth){
			foreach($widths as $width){
				foreach($lengths as $length){
					if((in_array($heatTreatement, $heatTreatements_1) && in_array($alloy, $alloys_1)) || (in_array($heatTreatement, $heatTreatements_2) && in_array($alloy, $alloys_2))) {
						$stringLine = "$alloy;$heatTreatement;$depth;$width;$height;$length;$diameter;$section;$gostTemp\n";
						file_put_contents($file, $stringLine, FILE_APPEND | LOCK_EX);
					}
				}
			}
		}
	}
	$counter++;
}
