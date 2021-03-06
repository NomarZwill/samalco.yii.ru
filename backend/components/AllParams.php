<?php

namespace backend\components;

use Yii;

class AllParams
{
	public static $k = 2.85;

	public $arrAlloys = [
		'lists' => [
				'alloy' => ['АК4-1', '1105', 'Д19ч', 'Д16', '1925', 'АК4', '1163', '1915', 'ВД1', 'В95', 'Д1', 'АВ', 'АМГ5', 'АМГ2', 'АД1', 'А5', 'АМЦ', 'АД0', 'АД', 'АМцС', 'А0', 'А6', 'А7', 'АМг3', 'АМг4.5', 'АМг6', '5251', '5754', 'АД35', 'Д19', 'В95пч', 'В95оч', '1201', 'Д20', 'АБТ-102', '1560', '1561', '5083', '7075', '6061', '6082', '1903', '3003', '3004', '3005', 'АК4-1ч', 'АД33', 'Д16ч', 'АБТ-101'],
				'depth' => ['0.5', '1', '1.5', '2', '2.5', '3', '3.5', '4', '4.5', '5', '5.5', '6', '6.5', '7', '7.5', '8', '8.5', '9', '9.5', '10', '10.5'],
				'width' => ['1000', '1200', '1500', '1800', '2000', '2500'],
				'curing' => ['Н', 'Н2', 'Н3', 'М', 'Т', 'Т1', 'Н22', 'Н24', 'Н111', 'Н114', 'Н224', 'Т6', 'Н12', 'Н14', 'Н32', 'Н34', 'Н16', 'Н321', 'Н244'],
				'length' => ['2000', '2200', '2500', '3000', '3200', '3300', '3440', '3500', '3600', '4000', '4400', '4800', '5000', '5200', '5500', '6000']
			],
		'lists_ribbed' => [
				'alloy' => ['АМг2','АМг3','5754','АМЦ','Д16','1105А','ВД1А'],
				'depth' => ['1.5', '2', '2.5', '3', '3.5', '4', '4.5', '5'],
				'width' => ['1000','1100','1200','1300','1400','1500','1600','1700','1800','1900','2000'],
				'curing' => ['Н', 'Н2'],
				'length' => ['2000','2500','3000','3500','4000','4500','5000','5500','6000','6500','7000','7500','8000']
			],
		'plates' => [
				'alloy' => ['АД33', 'ПАС-2', 'ПАС-1', 'АБТ-101', 'АК4', '1163', '1915', 'ВД1', 'Д16Ч', 'В95', 'Д16', 'Д1', 'АВ', 'АМГ5', 'АМГ2', 'АД1', 'А5', 'АМЦ', 'АД0', 'АД', 'А6', 'А7', 'АМГ3', 'АМГ6', 'АД31', 'АД35', 'Д19', 'Д19ч', 'Д20', 'В95пч', 'В95оч', 'АК4-1', 'АК4-1ч', '1201', '1105', '1560', 'АБТ-102', '5083', '1561', '6061', '7075', '1980', '1933'],
				'depth' => ['10.5', '13', '15', '17', '20', '25', '30', '35', '40', '45', '50', '60', '70', '80', '90', '100', '110', '120', '130', '140', '150', '160', '170', '180', '190', '200'],
				'width' => ['1000', '1200', '1500', '2000'],
				'curing' => ['без т/о', 'М', 'Т'],
				'length' => ['2000', '2200', '2500', '3000', '3200', '3300', '3440', '3500', '3600', '4000', '4400', '4800', '5000', '5200', '5500', '6000']
			],
		'tapes' => [
				'alloy' => ['А7', 'А6', 'А5', 'А0', 'АД0', 'АД1', 'АД00', 'ММ', 'Д12', 'АМЦ', 'АМЦС', 'АМГ2', 'АМГ3', 'АМГ5', 'АМГ6', 'АВ', 'Д1', 'Д16', 'ВД1', '1105'],
				'depth' => ['0.25', '0.5', '0.75', '1', '1.25', '1.5', '1.75', '2', '2.25', '2.5', '2.75', '3', '3.25', '3.5', '3.75', '4', '4.25', '4.5', '4.75', '5'],
				'width' => ['40', '60', '80', '100', '150', '200', '300', '400', '500', '600', '700', '800', '900', '1000', '1200', '1500', '1800', '2000'],
				'curing' => ['М', 'Н', 'Н1', 'Н2'],
				'length' => ['2000', '2200', '2500', '3000', '3200', '3300', '3440', '3500', '3600', '4000', '4400', '4800', '5000', '5200', '5500', '6000']
			],
		'tubes' => [
				'alloy' => ['АД31Е', 'АД35', 'АД33', '1561', '1560', 'Д19', 'Д20', 'В93', '1915', '1925', '1955', 'АК4', 'АК4-1', 'АК6', 'АК6ч', 'АК8', '1163', '1933', '1973', '6061', '3003', '1201', '6063', '1980', '6082', '7075', 'АВ', 'АД0', 'АД1', 'АД31', 'АМГ2', 'АМГ3', 'АМГ5', 'АМГ6', 'АМЦ', 'В95', 'Д1', 'Д16'],
				'diameter' => ['5.0-8.0', '9.0-12', '13-24', '25-60', '60-100', '101-170', '171-250', '251-800'],
				'width_st' => ['0.5-2', '2.1-5', '5.1-15', '15.1-50', '50.1-100'],
				'curing' => ['без т/о', 'М', 'Н', 'Т', 'Т1', 'Т5'],
				'length' => ['2000', '2200', '2500', '3000', '3200', '3300', '3440', '3500', '3600', '4000', '4400', '4800', '5000', '5200', '5500', '6000']
			],
		'rods' => [
				'alloy' => ['АМц', 'АМцС', 'АМг2', 'АМг3', 'АМг5', 'АМг6', '1561', 'АД31', 'АД33', 'АД35', 'АВ', 'Д1', 'Д16', 'Д16ч', 'Д19', 'Д19ч', 'АК4', 'АК4-1', 'АК4-1ч', 'АК6', 'АК6ч', 'В95', 'В95ч', '1915', '1925', '1935', 'АД0', 'АД00', 'АД31Е', '1201', '1163', 'АД1', '6061', '6063', 'Д20', 'В95пч', 'В95оч', 'В96', '1973'],
				'diameter' => ['8', '10', '12', '15', '16', '18', '20', '22', '25', '28', '30', '35', '40', '45', '50', '60', '80', '100', '120', '150', '200', '250', '300', '350', '400', '450', '500', '550', '600'],
				'section' => ['круглый', 'квадратный', 'шестигранный'],
				'curing' => ['без т/о', 'М', 'Т', 'Т1', 'Т4', 'Т5', 'Т6', 'Т64', 'Т66'],
				'length' => ['1000', '1200', '1500', '1800', '2000', '2200', '2500', '2800', '3000', '3200', '3500', '3800', '4000', '4500', '5000', '5500', '6000', '6500', '7000', '7500', '8000', '8500', '9000', '9500', '10000', '10500', '11000', '11500', '12000']
			],
		'profils' => [
				'profil_tavr' => [
						'alloy' => ['АД0', 'АД1', 'Амц', 'Амг2', 'Амг3', 'Амг5', 'Амг6', '1561', 'АД31', '6060', '6063', 'АВ', 'Д1', 'Д16', 'Д16ч', 'Д19', 'Д19ч', 'Д20', 'Д21', 'ВД1', 'В95', 'В93', 'В95пч', 'В95оч', 'В93пч', 'В93оч', '1915', '1925', 'АК4', 'АК4-1', 'АК6', 'АК6ч', 'АК8', '1980', '1163', '1933', '1973', '1201'],
						'height' => ['3', '15', '30', '50', '100', '200', '300', '340'],
						'width' => ['4', '15', '100', '150', '200', '300', '400', '480'],
						'curing' => ['без т/о', 'М', 'Т', 'Т1'],
						'length' => ['1000', '2000', '3000', '4000', '5000', '6000', '7000', '8000', '9000', '10000'],
						'depth' => ['0.5', '1', '1.5', '2', '2.5', '3', '3.5', '4', '4.5', '5', '5.5', '6', '6.5', '7', '7.5', '8', '8.5', '9', '9.5', '10', '10.5']
					],
				'profil_dvutavr' => [
						'alloy' => ['АД0', 'АД1', 'Амц', 'Амг2', 'Амг3', 'Амг5', 'Амг6', '1561', 'АВ', 'Д1', 'Д16', 'Д16ч', 'Д19', 'Д19ч', 'Д20', 'Д21', 'ВД1', 'В95', 'В93', 'В95пч', 'В95оч', 'В93пч', 'В93оч', '1915','1925', 'АК4', 'АК4-1', 'АК6', 'АК6ч', 'АК8', '1980', '1163', '1933', '1973', '1201'],
						'height' => ['3', '10', '15', '20', '30', '40', '50', '100', '200', '300', '340'],
						'width' => ['4', '10', '20', '50', '100', '150', '200', '250', '300', '350', '400', '450', '480'],
						'curing' => ['без т/о', 'М', 'Т', 'Т1'],
						'length' => ['1000', '2000', '3000', '4000', '5000', '6000', '7000', '8000', '9000'],
						'depth' => ['1', '5', '10', '15', '20', '25', '30', '40', '50', '55', '60', '70']
					],
				'profil_shveller' => [
						'alloy' => ['АД0', 'АД1', 'АД31', 'АД35', 'Амц', 'Амг2', 'Амг3', 'Амг5', 'Амг6', '1561', 'АВ', 'Д1', 'Д16', 'Д16ч', 'Д19', 'Д19ч', 'Д20', 'Д21', 'ВД1', 'В95', 'В93', 'В95пч', 'В95оч', 'В93пч', 'В93оч', '1915','1925', 'АК4', 'АК4-1', 'АК6', 'АК6ч', 'АК8', '1980', '1163', '1933', '1973', '1201'],
						'height' => ['3', '5', '10', '15', '20', '50', '80', '100', '130', '150', '200', '275'],
						'width' => ['6', '10', '15', '20', '30', '40', '50', '100', '150', '200', '250', '300', '350'],
						'curing' => ['без т/о', 'М', 'Т', 'Т1'],
						'length' => ['1000', '2000', '3000', '4000', '5000', '6000', '7000', '8000', '9000'],
						'depth' => ['1', '5', '10', '15', '20', '25', '30', '40', '50', '55', '60', '70']
					],
				'profil_ugolok' => [
						'alloy' => ['АМц', 'АМцС', 'АМг2', 'АМг3', 'АМг5', 'АМг6', '1561', 'АД31', 'АД33', 'АД35', 'АВ', 'Д1', 'Д16', 'Д16ч', 'Д19', 'Д19ч', 'АК4', 'АК4-1', 'АК4-1ч', 'АК6', 'АК6ч', 'В95', 'В95ч', '1915', '1925', '1935', 'АД0', 'АД00', 'АД31Е', '1201', '1163', 'АД1', '6061', '6063', 'Д20', 'В95пч', 'В95оч', 'В96', '1973'],
						'height' => ['10', '15', '20', '50', '100', '150', '200', '250', '300'],
						'width' => ['10', '15', '20', '50', '100', '150', '200', '250', '300'],
						'curing' => ['без т/о', 'М', 'Т', 'Т1', 'Т4', 'Т5', 'Т6', 'Т64', 'Т66'],
						'length' => ['1500', '2000', '3000', '4000', '5000', '6000', '7000', '8000', '9000', '10000', '11000', '12000'],
						'depth' => ['2', '5', '10', '20', '30', '40', '50', '60', '70', '80', '90', '100', '120']
					],
				'profil_pryamougolnik' => [
						'alloy' => ['АД31', 'АД33', 'АД35', '6060', '6063', 'АВ', 'Д1', 'Д16', 'Д16ч', 'Д19', 'Д19ч', 'АК4', 'АК4-1', 'АК4-1ч', 'АК6', 'АК6ч', 'В95', 'В95ч', '1915', '1925', '1925С', '1935', 'АМц', 'АМцС', 'АМг2', 'АМг3', 'АМг3С', 'АМг5', 'АМг6', '1561'],
						'height' => ['10', '20', '30', '40', '50', '60', '70', '80', '90', '100', '120', '150', '180', '200', '220', '250', '280', '300'],
						'width' => ['10', '20', '30', '40', '50', '60', '70', '80', '90', '100', '120', '150', '180', '200', '220', '250', '280', '300'],
						'curing' => ['М', 'Т', 'Т1'],
						'length' => ['1500', '2000', '3000', '4000', '5000', '6000', '7000', '8000', '9000', '10000', '11000', '12000'],
						'depth' => ['1', '3', '5', '8', '10', '15', '20', '25', '30']
					]
			],
	];
	
	public static $density = [
		'1973' => '1',
		'амг5' => '0.93',
		'1561' => '0.926',
		'амг2' => '0.94',
		'ав' => '0.947',
		'ад31' => '0.95',
		'ад31е' => '0.95',
		'ад35' => '0.954',
		'амц' => '0.958',
		'амцс' => '0.958',
		'ак6' => '0.964',
		'д19ч' => '0.968',
		'1980' => '0.972',
		'ак4' => '0.97',
		'1925' => '0.972',
		'1925с' => '0.972',
		'1915' => '0.972',
		'1163' => '0.975',
		'д16' => '0.976',
		'д16ч' => '0.976',
		'ак4-1' => '0.982',
		'вд1' => '0.982',
		'д1' => '0.982',
		'ак4ч' => '0.970',
		'ак4-1ч' => '0.982',
		'д20' => '0.996',
		'1105' => '0.982',
		'1105а' => '0.982',
		'в95' => '1',
		'в96' => '1.001',
		'ад1' => '0.95',
		'а5' => '0.95',
		'ад0' => '0.95',
		'ад00' => '0.95',
		'ад' => '0.95',
		'а0' => '0.95',
		'а6' => '0.95',
		'а7' => '0.95',
		'амг3' => '0.937',
		'амг3с' => '0.937',
		'амг4.5' => '0.93',
		'амг6' => '0.926',
		'5251' => '1',
		'5754' => '0.937',
		'д19' => '0.968',
		'в95ч' => '1',
		'в95пч' => '1',
		'в95оч' => '1',
		'1201' => '0.982',
		'абт-102' => '1',
		'1560' => '0.926',
		'5052' => '0.94',
		'5083' => '0.93',
		'7075' => '1',
		'6061' => '0.95',
		'6082' => '0.954',
		'1903' => '1',
		'3003' => '0.958',
		'3004' => '0.954',
		'3005' => '0.958',
		'ад33' => '0.951',
		'абт-101' => '1',
		'пас-2' => '1',
		'пас-1' => '1',
		'1933' => '0.996',
		'1935' => '0.977',
		'в93' => '0.996',
		'1955' => '0.972',
		'ак6ч' => '0.964',
		'ак8' => '0.982',
		'6063' => '0.951',
		'амг3' => '0.937',
		'6060' => '0.95',
		'д21' => '0.926',
		'в93пч' => '0.996',
		'в93оч' => '0.996',
		'мм' => '0.958',
		'д12' => '0.954',
		'вд1а' => '0.982'
	];

	public static function paramsValueIsExistCheck($filterValueList, $getParamsList){
		$getParamsMapping = [
			'C' => 'alloy',
			'H' => 'curing',
			'T' => 'depth',
			'W' => 'width',
			'WT' => 'width_st', // толщина стенки
			'HT' => 'height',
			'D' => 'diameter',
			'S' => 'section'
		];

		
		foreach ($getParamsList as $param => $value){
			
			if ($param === 'H' && $value === 'bez_to'){

				if (!in_array('без т/о', $filterValueList[$getParamsMapping[$param]])){
					return false;
				}
			} else {

				if (isset($filterValueList[$getParamsMapping[$param]])){
					$search_array = array_map('mb_strtoupper', $filterValueList[$getParamsMapping[$param]]);
	
					if (!in_array(mb_strtoupper($value), $search_array)){
						return false;
					}
				} else {
					return false;
				}
			}

		}

		return true;
	}

	public static function getWeight($row, $table){

		switch ($table) {
			case 'lists':
				$dens = floatval(AllParams::$density[mb_strtolower($row['alloy'])]);
				$length = floatval($row['length']);
				$width = floatval($row['width']);
				$depth = floatval($row['depth']);
				$weight = round($dens*$width*$depth*$length*AllParams::$k/1000000, 2);
				return $weight;
				break;

			case 'lists_ribbed':
				$dens = floatval(AllParams::$density[mb_strtolower($row['alloy'])]);
				$length = floatval($row['length']);
				$width = floatval($row['width']);
				$depth = floatval($row['depth']);
				$weight = round($dens*$width*$depth*$length*AllParams::$k/1000000, 2);
				return $weight;
				break;

			case 'rods':
				$dens = floatval(AllParams::$density[mb_strtolower($row['alloy'])]);
				$length = floatval($row['length']);
				$width = floatval($row['diameter']);
				$weight = round($dens*$width*$length*AllParams::$k*3.14/1000000, 2);
				return $weight;
				break;

			case 'tapes':
				$dens = floatval(AllParams::$density[mb_strtolower($row['alloy'])]);
				$length = (floatval($row['length']) != 0) ? floatval($row['length']) : 1000;
				$width = floatval($row['width']);
				$depth = floatval($row['depth']);
				$weight = round($dens*$width*$depth*$length*AllParams::$k/1000000, 2);
				return $weight;
				break;

			case 'plates':
				$dens = floatval(AllParams::$density[mb_strtolower($row['alloy'])]);
				$length = floatval($row['length']);
				$width = floatval($row['width']);
				$depth = floatval($row['depth']);
				$weight = round($dens*$width*$depth*$length*AllParams::$k/1000000, 2);
				return $weight;
				break;

			case 'tubes':
				$dens = floatval(AllParams::$density[mb_strtolower($row['alloy'])]);
				$length = floatval($row['length']);
				$width = floatval($row['width']);
				$diameter = floatval($row['diameter']);
				$r_max = $diameter/2;
        		$r_min = $diameter/2 - $width;
        		$pi = 3.14159265359;
				$weight = round(($pi*$r_max*$r_max - $pi*$r_min*$r_min)*$length*AllParams::$k*$dens/1000000, 2);
				return $weight;
				break;

			case 'profil_shveller':
				$dens = floatval(AllParams::$density[mb_strtolower($row['alloy'])]);
				$width = floatval($row['width']);
				$length = floatval($row['length']);
				$height = floatval($row['height']);
				$depth = floatval($row['depth']);
				$weight = round((2*$height+$width-2*$depth)*$depth*$length*$dens*AllParams::$k/1000000, 2);
				return $weight;
				break;

			case 'profil_tavr':
				$dens = floatval(AllParams::$density[mb_strtolower($row['alloy'])]);
				$width = floatval($row['width']);
				$length = floatval($row['length']);
				$height = floatval($row['height']);
				$depth = floatval($row['depth']);
				$weight = round(($height+$width-$depth)*$depth*$length*$dens*AllParams::$k/1000000, 2);
				return $weight;
				break;

			case 'profil_dvutavr':
				$dens = floatval(AllParams::$density[mb_strtolower($row['alloy'])]);
				$width = floatval($row['width']);
				$length = floatval($row['length']);
				$height = floatval($row['height']);
				$depth = floatval($row['depth']);
				$weight = round(($height+2*$width-2*$depth)*$depth*$length*$dens*AllParams::$k/1000000, 2);
				return $weight;
				break;

			case 'profil_ugolok':
				$dens = floatval(AllParams::$density[mb_strtolower($row['alloy'])]);
				$width = floatval($row['width']);
				$length = floatval($row['length']);
				$height = floatval($row['height']);
				$depth = floatval($row['depth']);
				$weight = round(($height+$width-$depth)*$depth*$length*$dens*AllParams::$k/1000000, 2);
				return $weight;
				break;

			case 'profil_pryamougolnik':
				$dens = floatval(AllParams::$density[mb_strtolower($row['alloy'])]);
				$width = floatval($row['width']);
				$length = floatval($row['length']);
				$height = floatval($row['height']);
				$depth = floatval($row['depth']);
				$weight = round((2*$height+2*$width-4*$depth)*$depth*$length*$dens*AllParams::$k/1000000, 2);
				return $weight;
				break;

			default:
				return 0;
				break;
		}
	}
}