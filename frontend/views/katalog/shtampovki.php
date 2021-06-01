<div class="main_wrap">

	<?= $sidebar ?>

	<div class="content">

		<?= $this->render('/components/breadcrumbs', array(
			'breadcrumbs' => $breadcrumbs,
			))
		?>

		<h1><?= $currentPage['header'] ?></h1>

		<?= $currentPage['subdomenSeo']['text_1'] ?>
    
		<?= $staticBlock_1 ?>

		<?= $currentPage['subdomenSeo']['text_2'] ?>

		<br>

		<?php
			echo $orderProcedure;
		?>

		<?= $this->render('/components/orderForm') ?>
    
	</div>

</div>

