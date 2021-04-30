<div class="main_wrap _main">

  <div class="content">

    <?= $this->render('/components/breadcrumbs', array(
      'breadcrumbs' => $breadcrumbs,
      ))
    ?>

    <h1><?= $currentPage->header ?></h1>

    <?= $currentPage->content ?>

  </div>

</div>