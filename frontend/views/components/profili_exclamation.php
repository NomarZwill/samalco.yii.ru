<div class="exclamation">

<?php
  switch($alias)
  {
    case 'tavr' : 
      echo 'Изготовим т-образный профиль любых размеров по вашим чертежам!';
      break;
    case 'shveller' : 
      echo 'Изготовим п-образный профиль любых размеров по вашим чертежам!';
      break;
    case 'dvutavr' : 
      echo 'Изготовим н-образный профиль любых размеров по вашим чертежам!';
      break;
    case 'ugolok' : 
      echo 'Изготовим уголок из&nbsp;алюминия ' . Yii::$app->params['subdomen_dec'] . ' любого нестандартного размера по&nbsp;Вашему чертежу!';
      break;
    case 'pryamougolnik' : 
      echo 'Изготовим профиль формы квадрат любых размеров по вашим чертежам!';
      break;
  }
?>
</div>