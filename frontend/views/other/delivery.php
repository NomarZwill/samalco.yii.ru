<div class="main_wrap _main">

	<div class="content">

    <?= $this->render('/components/breadcrumbs', array(
      'breadcrumbs' => $breadcrumbs,
      ))
    ?>

		<h1><?= $currentPage['subdomenSeo']['header'] ?></h1>

    <div id="ajax_map_wrapper">

      <div class="contact_info" itemscope="" itemtype="http://schema.org/Organization">

        <p itemprop="name"><?= $currentBranch['name'] ?></p>
        <p itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
          Адрес: 
          <span itemprop="postalCode"><?= $currentBranch['postalCode'] ?></span>,
          <span itemprop="addressLocality"><?= $currentBranch['addressLocality'] ?></span>,
          <span itemprop="streetAddress"><?= $currentBranch['streetAddress'] ?></span>
        </p>
        <p>Телефон: <span itemprop="telephone"><?= $currentBranch['phone'] ?></span></p>
        <p><a href="mailto:<?= $currentBranch['email'] ?>"><span itemprop="email"><?= $currentBranch['email'] ?></span></a></p>

		  </div>

      <div class="delivery_table">
        <p><?= $currentPage['subdomenSeo']['text_1'] ?></p>
      </div>

	    <div class="contact_map">
        <?= $currentBranch['map'] ?>
      </div>

    </div>	

		<?= $this->render('/components/orderForm') ?>

	</div>

</div>