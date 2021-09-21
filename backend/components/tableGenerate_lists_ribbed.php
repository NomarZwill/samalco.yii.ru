<?php
exit;
$aluFormType = "lists_ribbed";

//Данные для сплавов
$alloys = array("АМг2","АМг3","5754","АМЦ","Д16","1105А","ВД1А");
$alloys_1 = array("АМг2","АМг3","5754","АМЦ","Д16","1105А","ВД1А");
$alloys_2 = array("АМг2","АМг3","5754","АМЦ","Д16","1105А","ВД1А");

$heatTreatements = array("Н", "Н2");
$heatTreatements_1 = array("Н", "Н2");
$heatTreatements_2 = array("Н", "Н2");

$depthMin = 1.5;	$depthMax = 5.0;	$depthIncrement = 0.5;
$depths = range($depthMin, $depthMax, $depthIncrement);

$widths = array("1000","1100","1200","1300","1400","1500","1600","1700","1800","1900","2000");

$lengthMin = 2000;	$lengthMax = 8000;	$lengthIncrement = 500;
$lengths = range($lengthMin, $lengthMax, $lengthIncrement);

$height = 0;
$diameter = 0;
$section = '';

//ГОСТы
$gostTemp = '';

$file = "/var/www/samalco.yii.ru/backend/components/$aluFormType.csv";

//Запись в файл
file_put_contents($file, "", LOCK_EX);	//предварительно чистим

foreach ($alloys as $alloy){

	foreach ($heatTreatements as $heatTreatement){

		foreach ($depths as $depth){

			foreach ($widths as $width){

				foreach ($lengths as $length){

					if ((in_array($heatTreatement, $heatTreatements_1) && in_array($alloy, $alloys_1)) || (in_array($heatTreatement, $heatTreatements_2) && in_array($alloy, $alloys_2))) {
						$stringLine = "$alloy;$heatTreatement;$depth;$width;$height;$length;$diameter;$section;$gostTemp\n";
						file_put_contents($file, $stringLine, FILE_APPEND | LOCK_EX);
					}
				}
			}
		}
	}
}
