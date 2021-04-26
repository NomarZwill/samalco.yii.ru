<?php
namespace frontend\controllers;

use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

class AjaxController extends Controller
{
  public function actionIndex()
  {
  }
  public function actionCart()
  {
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) and $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'){

      if(empty($_POST)) die();
    
      $id = (!empty($_POST['id'])) ? $_POST['id'] : false;
      $total_price = (!empty($_POST['total_price'])) ? $_POST['total_price'] : false;
    
      if(!empty($id) && !empty($total_price)) {
        $mysqli = mysqli_connect('localhost', 'samalco', 'Dy8Om2gE', 'new_samalco.ru');
        mysqli_query($mysqli, "SET NAMES utf8");
        mysqli_query($mysqli, "UPDATE modx_cart SET total_price = '$total_price' WHERE id = '$id'");
        mysqli_close($mysqli);
      }
    
    }
  }
}