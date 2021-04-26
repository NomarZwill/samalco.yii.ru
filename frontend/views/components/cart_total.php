<?php
  // if (session_id() === ''){
  //   session_start();
  // }
  // $session = session_id();
  $session = Yii::$app->session->id;
  
  $mysqli = mysqli_connect('localhost', 'root', 'chf54ntgn4c45g7', 'samalco.yii.ru');
  $mysqli->set_charset("utf8mb4");
  $query = "SELECT * FROM cart_session_state WHERE `session` = '".$session."'";
  $products = mysqli_query($mysqli, $query);
  $count = mysqli_num_rows($products);

  if ($count !== 0) {
  echo '<span class="cart-count" id="cart-count">'.$count.'</span>';
  }
?>