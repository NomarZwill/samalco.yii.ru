<?php
if ($_POST) {
	$mysqli = mysqli_connect('localhost', 'root', 'chf54ntgn4c45g7', 'samalco.yii.ru');
	$mysqli->set_charset("utf8mb4");
	// mysqli_query($mysqli, "SET NAMES utf8");
	
	if ($_POST['alloy'] !== '') {
		$session = $_POST['session'];
		$alloy = $_POST['alloy'];
		$category = $_POST['category'];
		$quantity = $_POST['quantity'];
		$real_price = (!empty($_POST['real_price'])) ? $_POST['real_price'] : false;

		if (!empty($_POST['weight'])){$weight = $_POST['weight'];} else {$weight = '';}
		$params = '';

		if ($_POST['category']=="Алюминиевые трубы"){ 
			$params.= '<span class="alloy_name">';
			$params.= 'Сплав: '.$_POST['alloy'].'.';

			if  (isset($_POST['curing']) && $_POST['curing'] != ''){ $params.= ' Термообработка: ' .$_POST['curing']. '. <br>';}
			$params.= '</span>';
			$params .= '<span class="dimensions"> Размеры: ';

			if  ($_POST['diameter'] != ''){ $params.= ' Диаметр ' .$_POST['diameter']. ' мм,';}
			if  ($_POST['width'] != ''){ $params.= ' Толщина стенки ' .$_POST['width']. ' мм,';}
			if  ($_POST['length'] != ''){ $params.= ' Длина ' .$_POST['length']. ' мм,';} 
			if  ($_POST['gost'] != ''){ $params.= ' '.$_POST['gost'] . '.'; }

			$params .= '</span>';  
		}
		if ($_POST['category']=="Алюминиевые листы"){
			$params.= '<span class="alloy_name">';
			$params.= 'Сплав: '.$_POST['alloy'].'.';

			if  (isset($_POST['curing']) && $_POST['curing'] != ''){ $params.= ' Термообработка: ' .$_POST['curing']. '. <br>';}
			$params.= '</span>';
			$params .= '<span class="dimensions"> Размеры: ';

			if  ($_POST['depth'] != ''){ $params.= ' Толщина ' .$_POST['depth']. ' мм,';}
			if  ($_POST['width'] != ''){ $params.= ' Ширина ' .$_POST['width']. ' мм,';}
			if  ($_POST['length'] != ''){ $params.= ' Длина ' .$_POST['length']. ' мм,';}
			if  ($_POST['gost'] != ''){ $params.= ' '.$_POST['gost'] . '.'; }
			$params .= '</span>';
		}

		if ($_POST['category']=="Алюминиевые прутки"){
			$params.= '<span class="alloy_name">';
			$params.= 'Сплав: '.$_POST['alloy'].'.';
			if  (isset($_POST['curing']) && $_POST['curing'] != ''){ $params.= ' Термообработка: ' .$_POST['curing'].'.' ;}
			if  ($_POST['section'] != ''){ $params.= ' Сечение: ' .$_POST['section'];}
			$params.= '</span>';
			$params .= '<span class="dimensions"> Размеры: ';
			if  (isset($_POST['strength']) && $_POST['strength'] != ''){ $params.= ' Прочность ' .$_POST['strength']. ',';}
			if  ($_POST['diameter'] != ''){ $params.= ' Диаметр ' .$_POST['diameter']. ' мм,';}
			if  ($_POST['length'] != ''){ $params.= ' Длина ' .$_POST['length']. ' мм,';} 
			if  ($_POST['gost'] != ''){ $params.= ' '.$_POST['gost'] . '.'; }
			$params .= '</span>';
		}
		if($_POST['category']=="Алюминиевые ленты" || $_POST['category']=="Алюминиевые плиты"){ 
			$params.= '<span class="alloy_name">';
			$params.= 'Сплав: '.$_POST['alloy'].'.';
			if  (isset($_POST['curing']) && $_POST['curing'] != ''){ $params.= ' Термообработка: ' .$_POST['curing']. '</span>. <br>';}
			$params.= '</span>';
			$params .= '<span class="dimensions"> Размеры: ';
			if  ($_POST['depth'] != ''){ $params.= ' Толщина ' .$_POST['depth']. ' мм,';}
			if  ($_POST['width'] != ''){ $params.= ' Ширина ' .$_POST['width']. ' мм,';}
			$params .= '</span>';
		}
		if($_POST['category']=="Алюминиевые тавры"){
			$params.= '<span class="alloy_name">';
			$params.= 'Сплав: '.$_POST['alloy'].'.';
			if  (isset($_POST['curing']) && $_POST['curing'] != ''){ $params.= ' Термообработка: ' .$_POST['curing']. '. <br>';}
			$params.= '</span>';
			$params .= '<span class="dimensions"> Размеры: ';
			if  ($_POST['depth'] != ''){ $params.= ' Толщина ' .$_POST['depth']. ' мм,';}
			if  ($_POST['height'] != ''){ $params.= ' Высота ' .$_POST['height']. ' мм,';}
			if  ($_POST['width'] != ''){ $params.= ' Ширина ' .$_POST['width']. ' мм,';}
			if  ($_POST['length'] != ''){ $params.= ' Длина ' .$_POST['length']. ' мм,';}
			$params .= '</span>';
		}
		if($_POST['category']=="Алюминиевые швеллеры"){
			$params.= '<span class="alloy_name">';
			$params.= 'Сплав: '.$_POST['alloy'].'.';
			if  (isset($_POST['curing']) && $_POST['curing'] != ''){ $params.= ' Термообработка: ' .$_POST['curing']. '. <br>';}
			$params.= '</span>';
			$params .= '<span class="dimensions"> Размеры: ';
			if  ($_POST['depth'] != ''){ $params.= ' Толщина ' .$_POST['depth']. ' мм,';}
			if  ($_POST['height'] != ''){ $params.= ' Высота ' .$_POST['height']. ' мм,';}
			if  ($_POST['width'] != ''){ $params.= ' Ширина ' .$_POST['width']. ' мм,';}
			if  ($_POST['length'] != ''){ $params.= ' Длина ' .$_POST['length']. ' мм,';}
			$params .= '</span>';
		}
		if($_POST['category']=="Алюминиевые двутавры"){
			$params.= '<span class="alloy_name">';
			$params.= 'Сплав: '.$_POST['alloy'].'.';
			if  (isset($_POST['curing']) && $_POST['curing'] != ''){ $params.= ' Термообработка: ' .$_POST['curing']. '. <br>';}
			$params.= '</span>';
			$params .= '<span class="dimensions"> Размеры: ';
			if  ($_POST['depth'] != ''){ $params.= ' Толщина ' .$_POST['depth']. ' мм,';}
			if  ($_POST['height'] != ''){ $params.= ' Высота ' .$_POST['height']. ' мм,';}
			if  ($_POST['width'] != ''){ $params.= ' Ширина ' .$_POST['width']. ' мм,';}
			if  ($_POST['length'] != ''){ $params.= ' Длина ' .$_POST['length']. ' мм,';}
			$params .= '</span>';
		}
		if($_POST['category']=="Алюминиевые уголки"){
			$params.= '<span class="alloy_name">';
			$params.= 'Сплав: '.$_POST['alloy'].'.';
			if  (isset($_POST['curing']) && $_POST['curing'] != ''){ $params.= ' Термообработка: ' .$_POST['curing']. '. <br>';}
			$params.= '</span>';
			$params .= '<span class="dimensions"> Размеры: ';
			if  ($_POST['depth'] != ''){ $params.= ' Толщина ' .$_POST['depth']. ' мм,';}
			if  ($_POST['height'] != ''){ $params.= ' Высота ' .$_POST['height']. ' мм,';}
			if  ($_POST['width'] != ''){ $params.= ' Ширина ' .$_POST['width']. ' мм,';}
			if  ($_POST['length'] != ''){ $params.= ' Длина ' .$_POST['length']. ' мм,';}
			$params .= '</span>';
		}
		if($_POST['category']=="Алюминиевые прямоугольники"){
			$params.= '<span class="alloy_name">';
			$params.= 'Сплав: '.$_POST['alloy'].'.';
			if  (isset($_POST['curing']) && $_POST['curing'] != ''){ $params.= ' Термообработка: ' .$_POST['curing']. '. <br>';}
			$params.= '</span>';
			$params .= '<span class="dimensions"> Размеры: ';
			if  ($_POST['depth'] != ''){ $params.= ' Толщина ' .$_POST['depth']. ' мм,';}
			if  ($_POST['height'] != ''){ $params.= ' Высота ' .$_POST['height']. ' мм,';}
			if  ($_POST['width'] != ''){ $params.= ' Ширина ' .$_POST['width']. ' мм,';}
			if  ($_POST['length'] != ''){ $params.= ' Длина ' .$_POST['length']. ' мм,';}
			$params .= '</span>';
		}
		mysqli_query($mysqli, "INSERT INTO cart_session_state (`session`, `name`, `alloy`, `params`, `quantity`, `weight`, `real_price`) VALUES ('$session', '$category', '$alloy', '$params', '$quantity', '$weight', '$real_price')");
	}
	header('Content-type: application/json');
	echo json_encode($_POST);
}