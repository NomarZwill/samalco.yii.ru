<div class="sidebar">

	<div class="sidebar_menu">

		<?php
			foreach ($items as $item){
		?>
			<a href="/katalog/<?= $item->alias ?>/" class="sidebar_item">
				<img src="<?= $item->extraContent->sidebar_image ?>"/>
				<p><?= $item->extraContent->sidebar_name ?></p>
			</a>
		<?php
			}
		?>

	</div>

	<?php
		if ($table !== ''){
			include 'weightCalc.php';
		} 
	?>

</div>