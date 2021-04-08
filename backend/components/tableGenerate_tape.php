<?php
exit;
// 	Запуск скрипта в SSH следующей командой:
// 		/usr/bin/php -f /var/www/samalco.ru/assets/parser/tableGenerate_tape.php
$aluFormType = 'tapes';
	
$balanceMin = 300;	$balanceMax = 1500;	$balanceIncrement = 1;
$priceMin = 175;	$priceMax = 220;	$priceIncrement = 1;
//----------------------
$alloys = ['А7', 'А6', 'А5', 'А0', 'АД0', 'АД1', 'АД00', 'ММ', 'Д12', 'АМц', 'АМцС', 'АМг2', 'АМг3', 'АМг5', 'АМг6', 'АВ', 'Д1', 'Д16', 'ВД1', '1105'];

$heatTreatements = [
	'М'=> [
		'А7', 'А6', 'А5', 'А0', 'АД0', 'АД1', 'АД00', 'ММ', 'Д12', 'АМц', 'АМцС', 'АМг2', 'АМг3', 'АМг5', 'АМг6', 'АВ', 'Д1', 'Д16', 'ВД1', '1105'
	],
	'Н'=> [
		'А7', 'А6', 'А5', 'А0', 'АД0', 'АД1', 'АД00', 'ММ', 'Д12', 'АМц', 'АМцС', 'АМг5', 'АМг6', 'ВД1', '1105'
	],
	'Н1'=> [
		'АМг2'
	],
	'Н2'=> [
		'АМц', 'АМцС', 'АМг2', 'АМг3', 'Д12', 'А7', 'А6', 'А5', 'А0', 'АД0', 'АД1', 'АД00', 'ВД1', '1105'
	]
];

$depths = ['0.25', '0.5', '0.75', '1', '1.25', '1.5', '1.75', '2', '2.25', '2.5', '2.75', '3', '3.25', '3.5', '3.75', '4', '4.25', '4.5', '4.75', '5'];
$widths = ['40', '60', '80', '100', '150', '200', '300', '400', '500', '600', '700', '800', '900', '1000', '1200', '1500', '1800', '2000'];

$height = 0;
$length = 0;
$diameter = 0;
$section = '';
$gostTemp = '';

$file = "/var/www/samalco.yii.ru/backend/components/$aluFormType.csv";

//Запись в файл
file_put_contents($file, '', LOCK_EX);	//предварительно чистим


foreach($heatTreatements as $heatTreatement => $alloys){
	foreach($alloys as $alloy){
		foreach($depths as $depth){
			foreach($widths as $width){
				$stringLine = "$alloy;$heatTreatement;$depth;$width;$height;$length;$diameter;$section;$gostTemp\n";

				file_put_contents($file, $stringLine, FILE_APPEND | LOCK_EX);
			}
		}
	}
}

function getRand($min_, $max_, $step_) {
	$arr = range($min_, $max_, $step_);
	return $arr[array_rand($arr, 1)];
}
