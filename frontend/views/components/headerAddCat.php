<div class="header_add">

  <a href="/cart/" class="header_add_card cart-total">
    <?php include 'cart_total.php' ?>
  </a>
  <a href="tel:<?= Yii::$app->params['branch_phone'] ?>" class="header_add_phone" data-header-phone-mobile></a>
  <a class="header_add_calc"></a>
  
	<div class="header_add_popup">
    <?php include 'weightCalc.php' ?>
  </div>

</div>