<div class="main_wrap _main">

	<div class="content">

		<?= $this->render('/components/breadcrumbs', array(
      'breadcrumbs' => $breadcrumbs,
      ))
    ?>

		<h1><?= $currentPage['header'] ?></h1>

		<p><span>В данном разделе размещена следующая информация:</span></p>
			
    <?php
      foreach ($childrenPageList as $cildrenPage){
        echo '<a href="/teh_doc/' . $cildrenPage['alias'] . '/"><p>' . $cildrenPage['header'] . '</p></a>';
      }
    ?>
    
    <br>
    
	</div>

</div>