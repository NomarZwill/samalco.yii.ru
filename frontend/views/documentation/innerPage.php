<div class="main_wrap _docs">

  <div class="sidebar">

    <ul class="menu` hereTpl=`act">

      <?php
        foreach ($allPages[2] as $firstLevel){
          echo '<li><a href="/teh_doc/' . $firstLevel['alias'] . '/" title="' . $firstLevel['header'] . '">' . $firstLevel['header'] . '</a>';

          if (array_key_exists($firstLevel['id'], $allPages)){
            echo '<ul>';

            foreach ($allPages[$firstLevel['id']] as $secondLevel){
              echo '<li><a href="/teh_doc/' . $firstLevel['alias'] . '/' . $secondLevel['alias'] . '/" title="' . $secondLevel['header'] . '">' . $secondLevel['header'] . '</a></li>';
            }

            echo '</ul>';
          }
          echo '</li>';
        }
      ?>

    </ul>

  </div>

  <div class="content" id="content_cat">
  
    <?= $this->render('/components/breadcrumbs', array(
      'breadcrumbs' => $breadcrumbs,
      ))
    ?>

    <h1><?= $currentPage['header'] ?></h1>

    <?php
      echo $currentPage['content'];
    ?>

  </div>

</div>