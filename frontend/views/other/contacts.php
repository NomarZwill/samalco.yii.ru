<?php 
	echo $this->render('/components/headerAddStatic');
?>

<div class="main_wrap _main">
	<div class="content">
		<?= $this->render('/components/breadcrumbs', array(
      'breadcrumbs' => $breadcrumbs,
      ))
    ?>
		<h1>
      <?php 
        echo str_replace('**city_rod**', Yii::$app->params['subdomen_dec'], $currentPage['header']);
      ?>
    </h1>

    <div id="ajax_map_wrapper">

		  <div class="contact_info" itemscope="" itemtype="http://schema.org/Organization">

        <p itemprop="name"><?= $currentBranch['name']?></p>

        <p itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
		      Адрес: 
          <span itemprop="postalCode"><?= $currentBranch['postalCode']?></span>,
          <span itemprop="addressLocality"><?= $currentBranch['addressLocality']?></span>,
          <span itemprop="streetAddress"><?= $currentBranch['streetAddress']?></span>
		    </p>

		    <p>Телефон: <span itemprop="telephone" class="telephone"><?= $currentBranch['phone']?></span></p>

		    <p>

          <a href="mailto:<?= $currentBranch['email']?>">
            <span itemprop="email"><?= $currentBranch['email']?></span>
          </a>
					
        </p>

				<?= $staticBlock_1 ?>

		  </div>

      <?= $currentBranch['map']?>

      </br>
      </br>

      <?= $staticBlock_2 ?>

      <?= $this->render('/components/orderForm') ?>

      <?= $currentPage['subdomenSeo']['text_1'] ?>
      
    </div>



	</div>

</div>