
<div class="main_wrap _main">
	<div class="content">
		<?= $this->render('/components/breadcrumbs', array(
      'breadcrumbs' => $breadcrumbs,
      ))
    ?>
		<h1>Чертежи профилей</h1>
		
    <?php
      foreach ($childrenPages as $page){
        echo '<a href="/teh_doc/chertezhi/' . $page['alias'] . '/"><p>' . $page['name'] . '</p></a>';
      }
    ?>
		<br/>
	</div>
</div>