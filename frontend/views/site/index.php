<?php 
	echo $this->render('/components/headerAddStatic');
?>

<div class="main_wrap _main">

	<div class="main_block">

		<h1><?= $currentPage['header'] ?></h1>

		<div class="main_text">
			<?= $currentPage['text_1'] ?>
		</div>

		<?= $calculatorLinks ?>

		<h2>Каталог продукции в <?= $currentSubdomen['name_dec'] ?></h2>
		<div class="main_cat">
			<?php
				
				foreach ($katalogList as $item){
					echo '<div class="main_cat_item">';
					echo '<div class="main_cat_item_img">';
					echo '<img src="' . $item['extraContent']['menu_image'] . '" alt="">';
					echo '</div>';
					echo '<div class="main_cat_item_link">';
					echo '<a href="katalog/' . $item['alias'] . '/">' . $item['extraContent']['menu_name'] . '</a>';
					echo '</div>';
					echo $item['extraContent']['favorite_alloy'];
					echo '</div>';
				}

			?>
		</div>
		
		<div class="main_text">
			<?= $currentPage['text_4'] ?>
		</div>
	</div>

	<?= $callbackBlock ?>
	
	<div class="main_block">

		<?= $aboutUs ?>

		<div class="main_text">
			<?= $currentPage['text_2'] ?>
		</div>
	</div>

	<div class="main_block">

		<?= $howWeWork ?>

	</div>

	<?= $callbackBlock ?>

	<div class="main_block">
		<div class="main_text">
			<?= $currentPage['text_3'] ?>
		</div>
	</div>

	<div class="main_contacts">
		<h2>Контакты</h2>
			<div class="main_contacts_wrap">
				<div class="main_contacts_text">
					<p class="main_contacts_address"><?= $currentBranch['addressLocality']?>,<br> <?= $currentBranch['postalCode']?>, <?= $currentBranch['streetAddress']?>.</p>
					<p class="main_contacts_phone"><?= $currentBranch['phone']?></p>
					<p class="main_contacts_mail"><a href="mailto:<?= $currentBranch['email']?>"><span itemprop="email"><?= $currentBranch['email']?></span></a></p>
					<p class="main_contacts_info"><a href="/kontact/">Подробная информация</a></p>
					<div class="main_contacts_callback">Обратная связь</div>
				</div>
				<?= $currentBranch['map']?>
			</div>
	</div>

</div>