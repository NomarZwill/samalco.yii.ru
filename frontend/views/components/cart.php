<?php
// session_set_cookie_params(3600, '.samalco.ru');
// if (session_id() === ''){
//   session_start();
// }
$session = isset($_COOKIE['PHPSESSID']) ? $_COOKIE['PHPSESSID'] : '';

$link = mysqli_connect('localhost', 'root', 'chf54ntgn4c45g7', 'samalco.yii.ru');
$link->set_charset("utf8mb4");

// if (isset($_GET['session']) && isset($_GET['id'])) {
//     mysqli_query($link, "DELETE FROM cart_session_state WHERE id = ".$_GET['id']."");
//     $base = 'http://' . $_COOKIE['base'] . '/cart/';
//     header("Location: $base");
// }

if ($_POST) {
    if ($_POST['name_true'] !== '') {
        #--------------- Google reCaptcha ---------------------------------------------------------------
        $secret = '6LdAz-AUAAAAAJDxts0aYIZ3lnFUS23jRKH_4Y4Z';
        require_once ('/var/www/samalco.ru/recaptcha/autoload.php');
        $isValidreCapcha = false;

        if (isset($_POST['g-recaptcha-response'])) {
            $recaptcha = new \ReCaptcha\ReCaptcha($secret);
            $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
            if ($resp->isSuccess()){
                $isValidreCapcha = true;
            } else {
                $isValidreCapcha = false;
                $errors = $resp->getErrorCodes();
                $data['error-captcha']=$errors;
                $data['msg']='Код капчи не прошёл проверку на сервере';
                $data['result']='error';
            }
        } else {
            $data['result']='error';
        }
        #--------------- Google reCaptcha END -----------------------------------------------------------

        $products = mysqli_query($link, "SELECT * FROM cart_session_state WHERE `session` = '".$session."'");
        $html = "";
        $html.= "Контактные данные: \n\n";
        $html.= "Отправитель - ".$_POST['name_true'].", организация ".$_POST['org']." (ИНН: ".$_POST['inn'].", КПП: ".$_POST['kpp'].")\n";
        $html.= "Город - ".$_POST['gorod'].", телефон - ".$_POST['phone'].", email - ".$_POST['email']."\n\n";
        $html.= "Информация о заказе:\n\n";

        while($product = mysqli_fetch_assoc($products)) {
            echo 111;
            $html.= $product['name_true']." сплав ".$product['alloy']."\n";
            $html.= $product['params']."\n";
            $html.= "КГ: ".$_POST['quantity-'.$product['id']]."\n\n";
        }

        ini_set("sendmail_from","zayavka@samalco.ru");
        $headers = "";
        $headers.= "Content-type: text/plain; charset=utf-8" . "\r\n";
        $headers.= "From: zayavka@samalco.ru" . "\r\n";
        include_once "/var/www/samalco.ru/manager/includes/controls/class.phpmailer.php";
        $mail = new PHPMailer();
        $mail->IsSMTP();// отсылать используя SMTP
		    $mail->SMTPDebug = 2;
        $mail->Host  = 'smtp.gmail.com'; // SMTP сервер
        $mail->SMTPAuth = true;  // включить SMTP аутентификацию
        $mail->Username = 'zayavka@samalco.ru'; // SMTP username
        $mail->Password = 'ctujlyzltrf,hm'; // SMTP password
        $mail->From     = 'zayavka@samalco.ru';
        $mail->CharSet = $modx->config["modx_charset"]; 
        $mail->IsHTML(true);    
        $mail->FromName = 'samalco.ru';
        $mail->Subject = 'Новый заказ';
        $mail->Body = $html;
        $mail->AddAddress('kostikova@liderpoiska.ru');
        //$mail->AddAddress('azad@liderpoiska.ru');
        if($isValidreCapcha){
            // if($mail->Send()) {
            //     mysqli_query($link, "DELETE FROM cart_session_state WHERE session = '".$session."'");
            //     setcookie('sentok', 'Ваша заявка отправлена и будет обработана нашими менеджерами в течение одного рабочего дня.');
            //     unset($_POST);
            //     header("Location: http://samalco.ru/cart/");
            // }
        }
    }
}


$products = mysqli_query($link, "SELECT * FROM cart_session_state WHERE `session` = '".$session."'");

if (mysqli_num_rows($products)==0) {
    if (isset($_COOKIE['sentok']) && $_COOKIE['sentok'] !== NULL) {
        echo "<p>".$_COOKIE['sentok']."</p>";

        $roistatData = array(
            'roistat' => isset($_COOKIE['roistat_visit']) ? $_COOKIE['roistat_visit'] : null,
            'key'     => 'NTY0NDoxNjYyMjoxODQ1MTM4MDc1NDY0MGU4MzFhYTZkNDQ2MTdkODg1ZA==',
            'title'   => 'Оформление заказа',
            'comment' => isset($_COOKIE['roistat_marker']) ? 'Источник: ' . $_COOKIE['roistat_marker'] : null,
            'name'    => null,
            'email'   => null,
            'phone'   => null,
            'fields'  => array(),
        );
        file_get_contents("https://cloud.roistat.com/api/proxy/1.0/leads/add?" . http_build_query($roistatData));
        setcookie('sentok', '');
    } else {
        echo '<p>Ваша корзина пуста.</p>';
    }
} else {
    echo '<form id="customer" method="post" class="order-form-ext" action="/assets/snippets/mailer.php" data-context="cart">';
    echo '<h2>Товары</h2>';
	
	echo '<div class="cart_wrap">';
	echo 	'<div class="cart_head">';
	echo 		'<div class="cart_head_item">Наименование</div>';
	echo 		'<div class="cart_head_item">Цена за кг</div>';
	echo 		'<div class="cart_head_item">Количество</div>';
	echo 		'<div class="cart_head_item">Стоимость</div>';
	echo 		'<div class="cart_head_item"></div>';
	echo 	'</div>';
	
	echo '<div class="cart_prod_items">';
	
	$SUM_PRICE = 0;
	
	while($prod = mysqli_fetch_assoc($products)) {

		$id = (!empty($prod['id'])) ? $prod['id'] : false;
		$weight = (!empty($prod['weight'])) ? $prod['weight'] : false;
		$quantity = (!empty($prod['quantity']) && !empty($weight)) ? intval(round($prod['quantity']/$weight)) : false;
		$price = (!empty($prod['real_price'])) ? floatval($prod['real_price']) : false;
		//if($prod['name'] == 'Алюминиевые прутки') { $price = $price/1000;}
		$total_price = ($price && $weight) ? floatval($price)*floatval($weight) : false;
		$total_price = (!empty($prod['total_price'])) ? floatval($prod['total_price']) : $total_price;
		$SUM_PRICE = ($total_price) ? intval(round($SUM_PRICE))+intval(round($total_price)) : $SUM_PRICE;
		$currency = ($price) ? '<span class="currency">&nbsp;руб.</span>' : '';
		$price_formated = ($price) ? priceFormat($price) : 'под заказ';
		$total_price_formated = ($total_price) ? priceFormat($total_price) : 'под заказ';
		$quant_type = 'кг';
		
		if(!empty($prod['total_price'])) {
			$val_kg = round($total_price/$price,2);
			$val_sht = $val_pm = intval(round($total_price/($price*$weight)));
		} else {
			$val_kg = $weight;
			$val_sht = $val_pm = 1;
		}
			
		$prod['params'] = str_replace(",</span>", "</span>", $prod['params']);
		
		echo '<div class="cart_prod_item" data-id="'.$prod['id'].'">';
		echo 	'<div class="prod_descr param_wrap">';
		echo 		'<div class="prod_name">'.$prod['name'].'</div>';
		echo 		'<div class="prod_params">'.$prod['params'].'</div>';
		echo 	'</div>';
		echo 	'<div class="prod_price param_wrap">';
		echo 		'<span class="price_title hidden">Цена:&nbsp;</span>';
		echo 		'<span class="prod_price_value" data-name="price">'.$price_formated.'</span>';
		echo 		$currency;
		echo 	'</div>';
		echo 	'<div class="prod_quantity param_wrap">';
		
		if($prod['name'] == 'Алюминиевые ленты') {
			echo 	'<input type="text" class="prod_quantity_value hidden" value="'.$val_kg.'" min="'.$weight.'" max="999999" maxlength="8" data-type="kg" data-name="quantity_kg" />';
			echo 	'<input type="text" class="prod_quantity_value" value="'.$val_pm.'" min="1" max="999999" maxlength="8" data-type="p_m" data-name="quantity_pm" />';
			echo 	'<span class="prod_quantity_type" data-type="kg">'.$quant_type.'</span>';
			echo 	'<span class="prod_quantity_type prod_quantity_active" data-type="p_m">п.м.</span>';
			$val_sht = '';
		} else {
			echo 	'<input type="text" class="prod_quantity_value" value="'.$val_kg.'" min="'.$weight.'" max="999999" maxlength="8" data-type="kg" data-name="quantity_kg" />';
			echo 	'<input type="text" class="prod_quantity_value hidden" value="'.$val_sht.'" min="1" max="999999" maxlength="8" data-type="sht" data-name="quantity_sht" />';
			echo 	'<span class="prod_quantity_type prod_quantity_active" data-type="kg">'.$quant_type.'</span>';
			echo 	'<span class="prod_quantity_type hidden" data-type="sht">шт</span>';
			$val_pm = '';
		}	

		echo 	'</div>';
		echo 	'<div class="prod_price_total param_wrap">';
		echo 		'<span class="price_title hidden">Стоимость:&nbsp;</span>';
		echo 		'<span class="prod_price_total_value" data-name="total_price">'.$total_price_formated.'</span>';
		echo 		$currency;
		echo 	'</div>';
		echo 	'<div class="prod_remove param_wrap">';
		?> <input type="button" value="Удалить" id="cart-delete-button" class="cart-delete-button" onclick="window.location.href='/cart/?session=<?php echo $session;?>&id=<?php echo $id;?>'"> <?
		echo 	'</div>';
		
		echo 	'<input type="hidden" name="prod_name[]" class="inp_prod_name" value="'.$prod['name'].'"/>';
		echo 	'<input type="hidden" name="prod_params[]" class="inp_prod_params" value="'.strip_tags($prod['params']).'"/>';
		echo 	'<input type="hidden" name="weight_for_one[]" class="inp_weight_for_one" value="'.$weight.'"/>';
		echo 	'<input type="hidden" name="max_quantity[]" class="inp_max_quantity" value="'.$quantity.'"/>';
		echo 	'<input type="hidden" name="price[]" class="inp_price" value="'.$price.'"/>';
		echo 	'<input type="hidden" name="total_price[]" class="inp_total_price" value="'.$total_price.'"/>';
		echo 	'<input type="hidden" name="quantity_kg[]" class="inp_quantity_kg" value="'.$val_kg.'"/>';
		echo 	'<input type="hidden" name="quantity_sht[]" class="inp_quantity_sht" value="'.$val_sht.'"/>';
		echo 	'<input type="hidden" name="quantity_pm[]" class="inp_quantity_pm" value="'.$val_pm.'"/>';
		echo '</div>';
	}
	
	echo '<span class="min_order_info">* Минимальный заказ от 300 кг</span>';
	echo '<span class="min_order_info">** Изготовим по вашим чертежам. Если вам требуются корректировки характеристик товара, напишите об этом в поле "Комментарий" при оформлении заказа</span>';
	echo '</div>';
	
	if($SUM_PRICE){
		echo '<div class="sum_price_wrap">';
		echo 	'<span class="sum_price_title">Предварительная стоимость: </span>';
		echo 	'<span class="sum_price_value">'.priceFormat($SUM_PRICE).'</span>';
		echo 	'<span class="currency">&nbsp;руб.</span>';
		echo '</div>';
	}
	echo 	'<input type="hidden" name="sum_price" value="'.$SUM_PRICE.'"/>';
	echo '</div>';
	
 
    echo '<h2>Контактные данные</h2>';
    echo '<input type="text" class="" name="name_true" size="25" value="" required="true" placeholder="Ваше имя">';
    echo '<input type="hidden" name="name" size="25" value="">';
    echo '<input type="text" name="name" class="xxx_">';
    echo '<br>';
    echo '<input type="text" name="phone" size="25" value="" placeholder="Телефон">';
    echo '<input type="text" name="email" size="30" value="" required="true" placeholder="Электронная почта">';
    echo '<br>';
    echo '<input type="text" name="org" size="25" value="" placeholder="Название организации">';
    echo '<input type="text" name="gorod" size="30" value="" required="true" placeholder="Город/Населенный пункт">';
    echo '<br>';
    echo '<input type="text" name="inn" size="25" value="" placeholder="ИНН">';
    echo '<input type="text" name="kpp" size="30" value="" placeholder="КПП">';
	echo '<br>';
	echo '<textarea rows="10" cols="55" name="comment" placeholder="Комментарий"></textarea>';
	
	echo '<input type="hidden" name="session" value="'.$session.'">';
    echo '<br>';
    echo '<div class="form-row">
    <div class="form-group">
    <button type="submit" id="sent-button" class="btn btn-primary">Отправить заявку</button>
    </div>
    <div class="form-group">
    <label class="form-check-label">
    <input type="checkbox" class="form-check-input" name="terms" checked="" data-required="" required="true">
    Я согласен на обработку <a href="/agreement/">моих персональных данных</a>
    </label>
    </div>
    </div>';	
    echo '<div class="g-recaptcha" data-sitekey="6LdAz-AUAAAAAPfqsfvShXH_tq5ZGKDjcj44YtCk"></div>';
    echo '<div class="text-danger" id="recaptchaError"></div>';
    echo '</form> <div class="form-overlay">
    <div class="form-overlay-body">
    <p><span id="overlay-name">Username</span>, спасибо за заявку!</p>
    <p>Наш менеджер свяжется с Вами в течение часа.</p>
    <a class="close" id="hide-overlay">Понял, спасибо</a>
    </div>
    <div class="form-overlay-close"></div>
    <div class="form-overlay-bg"></div>
    </div>';
}

function priceFormat($price){
	$price_format = number_format($price, 0, ',', ' ');
	return $price_format;
}
