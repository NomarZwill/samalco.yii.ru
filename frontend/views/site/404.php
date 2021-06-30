<?php 
	echo $this->render('/components/headerAddStatic');
?>

<div class="main_wrap _main">

	<div class="error_404">
		<p class="page_not_found">К сожалению, страница не найдена</p>
		<h2>404</h2>
		<a class="report_404" href="#">Сообщить об ошибке 404</a>
		<div class="reason_404">
			<p class="reason_404_title">Причины, которые могли привести к такой ошибке:</p>
			<ul>
				<li>Неправильно набран адрес</li>
				<li>Такой страницы никогда не было на этом сайте</li>
			</ul>
		</div>
		<p class="change_page">Перейти на <a href="/">главную страницу сайта</a></p>
	</div>
	
	<div class="main_block">
		<h2>Каталог продукции</h2>
		<div class="main_cat">

    <?php
			
      foreach ($katalogPage as $item){
        echo '<div class="main_cat_item">';
        echo '<div class="main_cat_item_img">';
        echo '<img src="' . $item['extraContent']['menu_image'] . '" alt="">';
        echo '</div>';
        echo '<div class="main_cat_item_link">';
        echo '<a href="/katalog/' . $item['alias'] . '/">' . $item['extraContent']['menu_name'] . '</a>';
        echo '</div>';
				echo $item['extraContent']['favorite_alloy'];
        echo '</div>';
      }
    ?>

		</div>
	</div>
	
</div>

<!-- <script type="text/javascript">
  var yaParams = {URL: document.location.href};
  window.onload = function() {yaCounter9939076.reachGoal('error404', yaParams)}
</script> -->