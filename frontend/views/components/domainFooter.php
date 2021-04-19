<div id="ajax_map_wrapper">

  <div class="footer_phone">

    <p class="bigfont">Наш адрес: <?= $currentBranch['addressLocality']?>, <?= $currentBranch['postalCode']?>, <?= $currentBranch['streetAddress']?>.</p>

    <p>Телефон: <?= $currentBranch['phone']?></p>

    <?= $currentBranch['map']?>

  </div>

</div>