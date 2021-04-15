<div class="main_wrap _main">

	<div class="content">

		<div class="breadcrumbs">

			[[Breadcrumbs? &currentAsLink=`0` &crumbSeparator=`/` &in_city=`[!in_city!]` &showCurrentCrumb=`0`]]

		</div>

		<h1><?= $currentPage['header'] ?></h1>

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
        <p><?= $currentPage['text_1'] ?></p>
      </div>

	    <div class="contact_map">
        <?= $currentBranch['map'] ?>
      </div>

    </div>	

    [!orderForm!]		

	</div>

</div>