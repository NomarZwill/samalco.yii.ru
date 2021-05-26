<?php 
	echo $this->render('/components/headerAddStatic');
?>
<div class="main_wrap cart_page">

  <?= $sidebar ?>

	<div class="content">

    <?= $this->render('/components/breadcrumbs', array(
      'breadcrumbs' => $breadcrumbs,
      ))
    ?>

		<h1><?= $currentPage['header'] ?></h1>

		<div class="content_table_static _cart">

			<?php 
        include '../views/components/cart.php'; 
      ?>
      
		</div>
		
		<br>

	</div>

</div>

<script type="text/javascript" src="/js/jquery.inputmask.bundle.js"></script>

<script>
  $(document).ready(function() {
    if ($.fn.inputmask) {
      $('[name=phone]').inputmask('+7 (999) 999-99-99');
    } else {
      console.log('jquery.inputmask.js required to mask fields!')
    }
  });
</script>