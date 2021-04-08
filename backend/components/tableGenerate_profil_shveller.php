<?php
exit;
// 	Запуск скрипта в SSH следующей командой:
// 		/usr/bin/php -f /var/www/samalco.ru/assets/parser/tableGenerate_profil_shveller.php
$aluFormType = "profil_shveller";		//lists_new
	
$balanceMin = 3;	$balanceMax = 100;	$balanceIncrement = 1;
$priceMin = 110;	$priceMax = 150;	$priceIncrement = 1;
//----------------------
$alloys_1 = array("АД0", "АД1", "Амц", "Амг2", "Амг3", "Амг5", "Амг6", "1561");
$alloys_2 = array("АВ", "АД31", "АД35", "Д1", "Д16", "Д16ч", "Д19", "Д19ч", "Д20", "Д21", "ВД1", "В95", "В93", "В95пч", "В95оч", "В93пч", "В93оч", "1915", "1925", "АК4", "АК4-1", "АК6", "АК6ч", "АК8", "1980", "1163", "1933", "1973", "1201");
$alloys = array_unique(array_merge($alloys_1, $alloys_2));


$heatTreatements = array("без т/о", "М", "Т", "Т1");
$heatTreatements_1 = array("без т/о", "М");
$heatTreatements_2 = array("без т/о", "М", "Т", "Т1");

$depths = array("1", "5", "10", "15", "20", "25", "30", "40", "50", "55", "60", "70");
$widths = array("6", "10", "15", "20", "30", "40", "50", "100", "150", "200", "250", "300", "350");
$lengths = array("1000", "2000", "3000", "4000", "5000", "6000", "7000", "8000", "9000");
$heights = array("3", "5", "10", "15", "20", "50", "80", "100", "130", "150", "200", "275");

$diameter = 0;
$section = '';
$gostTemp = '';

$file = "/var/www/samalco.yii.ru/backend/components/$aluFormType.csv";
// $stringHead = "Наименование\tСплав\tТермообработка\tТолщина, мм\tВысота, мм\tШирина, мм\tДлина, мм\tГОСТ\tОстаток, кг\tЦена, руб./кг\n";

//Запись в файл
file_put_contents($file, "", LOCK_EX);	//предварительно чистим

foreach($alloys as $alloy){
	foreach($heatTreatements as $heatTreatement){
		foreach($depths as $depth){
			foreach($widths as $width){
				foreach($lengths as $length){
					foreach($heights as $height){
						$price = rand($priceMin, $priceMax);
						$balance = rand($balanceMin, $balanceMax);
						if($width/$depth>=4 && $width/$depth<70 && $height/$width<=10 && $height/$depth>=3) {
							if((in_array($heatTreatement, $heatTreatements_1) && in_array($alloy, $alloys_1)) || (in_array($heatTreatement, $heatTreatements_2) && in_array($alloy, $alloys_2))) {
								$stringLine = "$alloy;$heatTreatement;$depth;$width;$height;$length;$diameter;$section;$gostTemp\n";

								file_put_contents($file, $stringLine, FILE_APPEND | LOCK_EX);
							}
						}
					}
				}
			}
		}
	}
}
