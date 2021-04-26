<?php 
	echo $this->render('/components/headerAddStatic');
?>

<div class="main_wrap _main">

	<div class="content _main">

		<?= $this->render('/components/breadcrumbs', array(
      'breadcrumbs' => $breadcrumbs,
      ))
    ?>

		<h1><?= $currentPage['header'] ?></h1>

		<?= $currentPage['content'] ?>

		<br>

	</div>

</div>