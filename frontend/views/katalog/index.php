<div class="main_wrap" data-page-type='katalog'>

  <?= $sidebar ?>

	<div class="content">
    <?= $this->render('/components/breadcrumbs', array(
      'breadcrumbs' => $breadcrumbs,
      ))
    ?>
		<h1>Каталог</h1>
		<div class="main_cat _catalog">

    <?php
			
      foreach ($katalogPage as $item){
        echo '<div class="main_cat_item">';
        echo '<div class="main_cat_item_img">';
        echo '<img src="' . $item['extraContent']['menu_image'] . '" alt="">';
        echo '</div>';
        echo '<div class="main_cat_item_link">';
        echo '<a href="' . $item['alias'] . '/">' . $item['extraContent']['menu_name'] . '</a>';
        echo '</div>';
				echo $item['extraContent']['favorite_alloy'];
        echo '</div>';
      }

    ?>

		</div>
	</div>
</div>