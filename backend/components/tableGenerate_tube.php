<?php
exit;
// 	Запуск скрипта в SSH следующей командой:
// 		/usr/bin/php -f /var/www/samalco.ru/assets/parser/tableGenerate_tube.php
$aluFormType = "tubes";		//lists_new
	
$balanceMin = 25;	$balanceMax = 100;	$balanceIncrement = 1;
$priceMin = 110;	$priceMax = 150;	$priceIncrement = 1;
$lengthMin = 1000;	$lengthMax = 6000;	$lengthIncrement = 500;

//----------------------
$alloys = array("АД31Е", "АД35", "АД33", "1561", "1560", "Д19", "Д20", "В93", "1915", "1925", "1955", "АК4", "АК4-1", "АК6", "АК6ч", "АК8", "1163", "1933", "1973", "6061", "3003", "1201", "6063", "1980", "6082", "7075", "АВ", "АД0", "АД1", "АД31", "Амг2", "Амг3", "Амг5", "Амг6", "Амц", "В95", "Д1", "Д16");
$alloys_1 = array("АД0", "АД1", "Амц", "Амг2", "Амг3", "Амг5", "Амг6", "1560", "1561", "3003");
$alloys_2 = array("АД31", "АД31Е", "АД35", "АД33", "Д19", "Д20", "В93", "1915", "1925", "1955", "АК4", "АК4-1", "АК6", "АК6ч", "АК8", "1163", "1933", "1973", "6061", "1201", "6063", "1980", "6082", "7075", "АВ", "В95", "Д1", "Д16");
$heatTreatements = array("без т/о", "М", "Н", "Т", "Т1", "Т5");
$heatTreatements_1 = array("без т/о", "М", "Н");
$heatTreatements_2 = array("без т/о", "М", "Т", "Т1", "Т5");

$lengths = range($lengthMin, $lengthMax, $lengthIncrement);				//$lengths = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10");
$diams = array("5", "10", "15", "20", "50", "100", "150", "200", "250", "300", "350", "400", "450", "500", "550", "600", "650", "700", "750", "800");
$widths = array("0.5", "1", "2", "5", "10", "20", "30", "40", "50", "60", "70", "80", "90", "100");

$depth = 0;
$height = 0;
$section = '';
$gostTemp = '';

$file = "/var/www/samalco.yii.ru/backend/components/$aluFormType.csv";
$stringHead = "Наименование\tСплав\tТермообработка\tТолщина, мм\tДиаметр, мм\tДлина, мм\tГОСТ\tОстаток, кг\tЦена, руб./кг\n";

//Запись в файл
file_put_contents($file, "", LOCK_EX);	//предварительно чистим

foreach($alloys as $alloy){
	foreach($heatTreatements as $heatTreatement){
		foreach($widths as $width){
			foreach($diams as $diameter){
				foreach($lengths as $length){
					$price = rand($priceMin, $priceMax);
					$balance = rand($balanceMin, $balanceMax);
					if($diameter/$width>5) {
						if((in_array($heatTreatement, $heatTreatements_1) && in_array($alloy, $alloys_1)) || (in_array($heatTreatement, $heatTreatements_2) && in_array($alloy, $alloys_2))) {
							if($diameter>300 && $width<=5) {
								continue;
							} else if($diameter>80 && $diameter<=300 && $width<2){
								continue;
							} else if($diameter>20 && $diameter<=80 && $width<1){
								continue;
							} else if($diameter<=20 && $width<0.5){
								continue;
							}

							$stringLine = "$alloy;$heatTreatement;$depth;$width;$height;$length;$diameter;$section;$gostTemp\n";

							file_put_contents($file, $stringLine, FILE_APPEND | LOCK_EX);
						}
					}
				}
			}
		}
	}
}
