<div class="main_wrap" data-page-type='katalog'>
	
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

			<?= $currentPage['subdomenSeo']['text_2'] ?>

			<?= $staticBlock_2 ?>

			<?= $currentPage['subdomenSeo']['text_3'] ?>

			<?= $staticBlock_3 ?>

		</div>

		<?php
			echo $orderProcedure;
		?>

		<?= $this->render('/components/orderForm') ?>

		<?= $currentPage['subdomenSeo']['text_4'] ?>

		<?= $this->render('/components/orderForm') ?>

		<?= $this->render('/components/domainFooter' , array('currentBranch' => $currentBranch)) ?>
		
	</div>

</div>
