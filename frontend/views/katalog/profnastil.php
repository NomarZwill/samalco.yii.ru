<div class="main_wrap">

  <?= $sidebar ?>

	<div class="content">
    <?= $this->render('/components/breadcrumbs', array(
      'breadcrumbs' => $breadcrumbs,
      ))
    ?>
		<h1><?= $currentPage['subdomenSeo']['header'] ?></h1>
		<div class="content_table_static">
		<?= $currentPage['subdomenSeo']['text_1'] ?>

    <?= $staticBlock_1 ?>

		<?= $this->render('/components/orderProcedure', array('currentPage' => $currentPage)) ?>

		<?= $this->render('/components/orderForm') ?>

    <?= $this->render('/components/domainFooter' , array('currentBranch' => $currentBranch)) ?>

	</div>
  
</div>
