<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class FormController extends Controller
{

  public function actionIndex()
  {

    $stopWordsArr = [
      // 'http://',
      // 'https://',
      // 'www.',
      'seo-swat.ru',
      'href',
      'src',
      'Без опыта',
      'Зарабатывайте',
      'Доход (дополнительный доход)',
      'Сам себе начальник',
      'Бизнес на дому',
      'Доллары',
      'Запусти собственный бизнес',
      'Работайте из дома',
      'Фриланс',
      'Заработок',
      'Финансы',
      '$$$',
      'Займ',
      'Доступное',
      'Сделки',
      'Получатели',
      'Дешевый',
      'Ставки',
      'Наличные',
      'Деньги',
      'Крипта',
      'Криптовалюта',
      'Доходы',
      'Самая низкая цена',
      'Комиссии',
      'Возвраты денег',
      'Кредитное бюро',
      'Сбережения',
      'Зачем платить больше',
      'Кредитные карты',
      'Без капиталовложений',
      'Акция',
      'Вклады',
      'Банкротство',
      'Кредитор',
      'Коллектор',
      'Дебет/кредит',
      'Выплаты',
      'Процентные ставки',
      'Долги',
      'Минимальный платёж',
      'Рефинансирование',
      'Общие',
      '100%',
      'Миллионы',
      'Тысячи',
      'Скрытые',
      'Успехи',
      'Маркетинг',
      'Новинка',
      'Реклама',
      'Увеличение трафика',
      'Продажа',
      'Рынки',
      'Не спам',
      'Распродажа',
      'Здоровье',
      'Диагностика',
      'Виагра',
      'Храп',
      'Лекарство',
      'Пищевая добавка',
      'Излечение',
      'Сбрось вес',
      'Похудение',
      'Контент для взрослых',
      '18+',
      '21+',
      'XXX',
      'Секс',
      'Предложения',
      'Увеличить продажи',
      'Лучшее предложение',
      'Уникальное предложение',
      'Предложение ограниченно',
      'Эксклюзивное предложение',
      'Специальное предложение',
      'Гарантированные',
      'Безрисковые',
      'Выгода',
      'Гарантия',
      'Без обязательств',
      'Без вложений',
      'В день (неделю, месяц)',
      'Призы',
      'Победа',
      'Победитель',
      'Выигрыши',
      'Розыгрыши',
      'Конкурсы',
      'Бесплатно',
      'Бесплатный доступ',
      'Бесплатная установка',
      'Бесплатные сайты',
      'Бесплатные консультации',
      'Призыв к действию',
      'Избавьтесь',
      'Позвони',
      'Открой',
      'Нажмите здесь',
      'Быстрее!',
      'Сравни',
      'Сохрани',
      'Распечатай',
      'Подпишись',
      'Действуйте сейчас',
      'Только сегодня',
      'Получите сейчас',
      'Начните сейчас',
      'Прочитай',
      'Не медлите',
      'Не удаляйте',
      'Присоединяйтесь.'
    ];

    function priceFormater($price)
    {
      $price_format = number_format($price, 0, ',', ' ');
      return $price_format;
    }

    function reArrayFiles(&$file_post) {
    
      $file_ary = [];
  
      if ($file_post['size'][0] > 0) {
        
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);
  
        for ($i=0; $i<$file_count; $i++) {
            foreach ($file_keys as $key) {
              $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }
      }
  
      return $file_ary;
    }
    
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
    // return json_encode($_POST);

    if ($_POST && $isValidreCapcha) {
    
      $excludeArr = ['source', 'session', 'context', 'g-recaptcha-response', 'terms', 'email']; // эти поля не проверяем
    
      foreach ($_POST as $key => $post_word) {
        if(!in_array($key, $excludeArr)){
          foreach ($stopWordsArr as $word) {
            // if(strpos(mb_strtolower($post_word), mb_strtolower($word)) !== false){вернуть
            //   echo 'stopwords';
            //   die();
            // }
          }
        }
      }
    
      $contexts = [
        'default' => [
          'subject' => 'Заявка с сайта',
          'recipients' => ['shaposhnikov@samalco.ru','kostikova@liderpoiska.ru','irinasablina@liderpoiska.ru'],
          // 'recipients' => ['artm@liderpoiska.ru', 'irinasablina@liderpoiska.ru', 'kostikova@liderpoiska.ru'],
          // 'recipients' => ['artm@liderpoiska.ru'],
        ],
    
        'ext' => [
          'subject' => 'Заявка с сайта',
          'recipients' => ['shaposhnikov@samalco.ru','kostikova@liderpoiska.ru','irinasablina@liderpoiska.ru'],
          // 'recipients' => ['artm@liderpoiska.ru', 'irinasablina@liderpoiska.ru', 'kostikova@liderpoiska.ru'],
          // 'recipients' => ['artm@liderpoiska.ru'],
        ],
    
        'catalog' => [
          'subject' => 'Вопрос по наличию и ценам',
          'recipients' => ['shaposhnikov@samalco.ru','kostikova@liderpoiska.ru','irinasablina@liderpoiska.ru'],
          // 'recipients' => ['artm@liderpoiska.ru', 'irinasablina@liderpoiska.ru', 'kostikova@liderpoiska.ru'],
          // 'recipients' => ['artm@liderpoiska.ru'],
        ],
    
        'popup' => [
          'subject' => 'Заявка с сайта',
          'type' => 'popup',
           'recipients' => ['shaposhnikov@samalco.ru','kostikova@liderpoiska.ru','irinasablina@liderpoiska.ru'],
          // 'recipients' => ['artm@liderpoiska.ru', 'irinasablina@liderpoiska.ru', 'kostikova@liderpoiska.ru'],
          // 'recipients' => ['artm@liderpoiska.ru'],
        ],
    
        'cart' => [
          'subject' => 'Заявка из корзины',
          'type' => 'cart',
          'recipients' => ['shaposhnikov@samalco.ru','kostikova@liderpoiska.ru','irinasablina@liderpoiska.ru'],
          // 'recipients' => ['artm@liderpoiska.ru', 'irinasablina@liderpoiska.ru', 'kostikova@liderpoiska.ru'],
          // 'recipients' => ['artm@liderpoiska.ru'],
        ]
      ];
    
      if (isset($_POST['context']) && $_POST['context'] != '') {
        $context = $_POST['context'];
      } else {
        $context = 'default';
      }
      $mail = new PHPMailer(true);
      $config = $contexts[$context];
      $files = [];
      // return 1;

      if (isset($_FILES['files'])) {
        $files = reArrayFiles($_FILES['files']);
      }
    
      if (isset($_FILES['docs'])) {
        $docs = reArrayFiles($_FILES['docs']);
      }
    
      $mail_body = '';
    
      if ($_POST['name_true'] != '' || $_POST['phone'] != '' || $_POST['email'] != '') {
        $mail_body .= '<h3>Контакты отправителя:</h3><p>';
    
        if ($_POST['name_true'] != '') {
          $mail_body .= '<b>Имя:</b> ' . $_POST['name_true'] . '<br>';
        }
        if ($_POST['phone'] != '') {
          $mail_body .= '<b>Телефон:</b> ' . $_POST['phone'] . '<br>';
        }
        if ($_POST['email'] != '') {
          $mail_body .= '<b>Почта:</b> ' . $_POST['email'] . '<br>';
        }
    
        $mail_body .= '</p>';
      }
    
      if($context=="cart"){
    
        $CART_ITEMS = [];
    
        $prodNameArr = $_POST['prod_name'];
        $prodParamsArr = $_POST['prod_params'];
        $weightForOneArr = $_POST['weight_for_one'];
        $maxQuantityArr = $_POST['max_quantity'];
        $priceArr = $_POST['price'];
        $totalPriceArr = $_POST['total_price'];
        $quantityKgArr = $_POST['quantity_kg'];
        $quantityShtArr = $_POST['quantity_sht'];
        $quantityPmArr = $_POST['quantity_pm'];
        $SUM_PRICE = $_POST['sum_price'];
    
        foreach ($prodNameArr as $key => $value) {
          $CART_ITEMS[] = [
            'prod_name'			=> $value,
            'prod_params'		=> $prodParamsArr[$key],
            'weight_for_one'	=> $weightForOneArr[$key],
            'max_quantity'		=> $maxQuantityArr[$key],
            'price'				=> $priceArr[$key],
            'total_price'		=> $totalPriceArr[$key],
            'quantity_kg'		=> $quantityKgArr[$key],
            'quantity_sht'		=> $quantityShtArr[$key],
            'quantity_pm'		=> $quantityPmArr[$key]
          ];
        }
    
        if(!empty($CART_ITEMS)){?>
    
          <?php
          $mail_body .= '<br><table style="border-collapse: collapse;">';
          $mail_body .= '<thead>';
          $mail_body .= 	'<tr>';
          $mail_body .= 		'<th style="border: 1px solid #999; padding: 5px 10px;">Наименование</th>';
          $mail_body .= 		'<th style="border: 1px solid #999; padding: 5px 10px;">Параметры</th>';
          $mail_body .= 		'<th style="border: 1px solid #999; padding: 5px 10px;">Цена за кг</th>';
          $mail_body .= 		'<th style="border: 1px solid #999; padding: 5px 10px;">Количество</th>';
          $mail_body .= 		'<th style="border: 1px solid #999; padding: 5px 10px;">Стоимость</th>';
          $mail_body .= 	'</tr>';
          $mail_body .= '</thead>';
          $mail_body .= '<tbody>';
    
          foreach ($CART_ITEMS as $item) {
    
            $q_kg = (!empty($item['quantity_kg'])) ? $item['quantity_kg'].' кг / ' : '';
            $q_sht = (!empty($item['quantity_sht'])) ? $item['quantity_sht'].' шт' : '';
            $q_pm = (!empty($item['quantity_pm'])) ? $item['quantity_pm'].' п.м.' : '';
    
            $mail_body .= '<tr>';
            $mail_body .= 	'<td style="border: 1px solid #999; padding: 5px 10px;">'.$item['prod_name'].'</td>';
            $mail_body .= 	'<td style="border: 1px solid #999; padding: 5px 10px;">'.$item['prod_params'].'</td>';
            $mail_body .= 	'<td style="border: 1px solid #999; padding: 5px 10px;">'.priceFormater($item['price']).' руб.</td>';
            $mail_body .= 	'<td style="border: 1px solid #999; padding: 5px 10px;">'.$q_kg.$q_sht.$q_pm.'</td>';
            $mail_body .= 	'<td style="border: 1px solid #999; padding: 5px 10px;">'.priceFormater($item['total_price']).' руб.</td>';
            $mail_body .= '</tr>';
          }
          $mail_body .= '</tbody>';
          $mail_body .= '</table>';
          $mail_body .= '<hr>';
          
          if(!empty($SUM_PRICE)){
            $mail_body .= '<strong>Предварительная стоимость: '.priceFormater($SUM_PRICE).' руб.</strong><br><br>';
          }
    
        }
    
        if (isset($_POST['org']) && $_POST['org'] != '') {
          $mail_body .= '<b>Организация:</b> ' . $_POST['org'] . '<br>';
        }
        if (isset($_POST['gorod']) && $_POST['gorod'] != '') {
          $mail_body .= '<b>Город:</b> ' . $_POST['gorod'] . '<br>';
        }
        if (isset($_POST['inn']) && $_POST['inn'] != '') {
          $mail_body .= '<b>ИНН:</b> ' . $_POST['inn'] . '<br>';
        }
        if (isset($_POST['kpp']) && $_POST['kpp'] != '') {
          $mail_body .= '<b>КПП:</b> ' . $_POST['kpp'] . '<br>';
        }
        $mail_body .= $_POST['cart_text'];
    
        # ---------- ЧИСТИМ КОРЗИНУ ПОСЛЕ ОФОРМЛЕНИЯ ЗАКАЗА --------------------------------------
        $session = $_POST['session'];
        $db_name="samalco.yii.ru";
        $db_user="root";
        $db_pass="chf54ntgn4c45g7";
        $db_host="localhost";
        $link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
        $query ="DELETE FROM cart_session_state WHERE session = '$session'";
        $link->set_charset("utf8mb4");
        mysqli_query($link, "SET NAMES utf8");
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
        mysqli_close($link);
        # ---------- ЧИСТИМ КОРЗИНУ ПОСЛЕ ОФОРМЛЕНИЯ ЗАКАЗА --------------------------------------
      }
    
    
      if (isset($_POST['org_name']) && $_POST['org_name'] != '' && isset($_POST['org_address']) && $_POST['org_address'] != '') {
        $mail_body .= '<h3>Информация об организации:</h3>';
        $mail_body .= '<p>Название: ' . $_POST['org_name'] . '</p>';
        $mail_body .= '<p>Адрес: ' . $_POST['org_address'] . '</p>';
    
        if (isset($_POST['org_inn']) && $_POST['org_inn'] != '') {
          $mail_body .= '<b>ИНН:</b> ' . $_POST['org_inn'] . '<br>';
        }
        if (isset($_POST['org_kpp']) && $_POST['org_kpp'] != '') {
          $mail_body .= '<b>КПП:</b> ' . $_POST['org_kpp'] . '<br>';
        }
        if (isset($_POST['org_bill']) && $_POST['org_bill'] != '') {
          $mail_body .= '<b>Счет:</b> ' . $_POST['org_bill'] . '<br>';
        }
        if (isset($_POST['org_cor_bill']) && $_POST['org_cor_bill'] != '') {
          $mail_body .= '<b>Кор.счет:</b> ' . $_POST['org_cor_bill'] . '<br>';
        }
        if (isset($_POST['org_bank']) && $_POST['org_bank'] != '') {
          $mail_body .= '<b>Банк:</b> ' . $_POST['org_bank'] . '<br>';
        }
        if (isset($_POST['org_bank_bik']) && $_POST['org_bank_bik'] != '') {
          $mail_body .= '<b>БИК:</b> ' . $_POST['org_bank_bik'] . '<br>';
        }
    
      }
    
      if (isset($_POST['comment']) && $_POST['comment']  != '') {
        $mail_body .= '<h3>Текст сообщения:</h3>';
        $mail_body .= '<p>' . $_POST['comment'] . '</p>';
      }
    
      if (isset($_POST['source']) && $_POST['source'] != '') {
        $mail_body .= 'Отправлено со страницы: ' . $_POST['source'];
      } else {
        echo 'OK';
        die();
      }
     
      try {
          //Server settings
          $mail->SMTPDebug = 0;                                 // Enable verbose debug output
          $mail->isSMTP();                                      // Set mailer to use SMTP
          $mail->Host = 'smtp.gmail.com';  					  // Specify main and backup SMTP servers
          $mail->SMTPAuth = true;                               // Enable SMTP authentication
          //if ($config['type'] != 'popup') {
            $mail->Username = 'zayavka@samalco.ru';
          //}
          //else{
          //	$mail->Username = 'zadrotstvo@gmail.com';
          //}
          $mail->Password = 'ctujlyzltrf,hm';                 // SMTP password
          $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
          $mail->Port = 465; 
          $mail->CharSet = 'UTF-8';
    
          $mail->setFrom('zayavka@samalco.ru', 'samalco.ru');
    
          foreach ($config['recipients'] as $recipient) {
            $mail->addAddress($recipient);
          }
    
          if (isset($files)) {
            foreach ($files as $attachment) {
              if ($attachment['size'] > 0) {
                $mail->addAttachment($attachment['tmp_name'], $attachment['name']);
              }
            }
          }
          if (isset($docs)) {
            foreach ($docs as $attachment) {
              if ($attachment['size'] > 0) {
                $mail->addAttachment($attachment['tmp_name'], $attachment['name']);
              }
            }
          }
    
          $mail->isHTML(true); 
          $mail->Subject = $config['subject'];
          $mail->Body    = $mail_body;
          $mail->AltBody = $mail_body;
    
          if($isValidreCapcha){
            echo '<pre>';
            print_r($mail);
            $mail->send();
          }
          
          echo 'OK';
      } catch (Exception $e) {
          echo 'ERROR : ' . $mail->ErrorInfo;
      }
    }
  }

  public function actionPageNotFoundReport()
  {
    $url = $_POST['url'];
    // $recipients = array('irinasablina@liderpoiska.ru', 'kostikova@liderpoiska.ru', 'artm@liderpoiska.ru');
    $recipients = array('artm@liderpoiska.ru');
    $subject = 'Ошибка 404';
    $mail_body = '<p>Произошла ошибка 404 при попытке перейти на страницу:</p>';
    $mail_body.='<a href="'.$url.'">'.$url.'</a>';


    if ($_POST) {
      $mail = new PHPMailer(true);
      try {
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  					  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true; 	                             // Enable SMTP authentication
        $mail->Username = 'zayavka@samalco.ru';
        $mail->Password = 'ctujlyzltrf,hm';                 // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465; 
        $mail->CharSet = 'UTF-8';
        $mail->setFrom('zayavka@samalco.ru', 'samalco.ru');

        foreach ($recipients as $recipient) {
          $mail->addAddress($recipient);
        }

        $mail->isHTML(true); 
        $mail->Subject = $subject;
        $mail->Body    = $mail_body;
        $mail->AltBody = $mail_body;
        
        $mail->send();

      } catch (Exception $e) {
        echo 'ERROR : ' . $mail->ErrorInfo;
      }
    }
  }
}