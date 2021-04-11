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
  
    <div class="breadcrumbs">
			<span class="B_crumbBox"><span class="B_firstCrumb"><a class="B_homeCrumb" href="/" title="Алюминиевая компания в Москве">Главная</a></span> / <span class="B_lastCrumb"><a class="B_crumb" href="/teh_doc/" title="Техническая документация">Техническая документация</a></span></span>
		</div>

    <h1><?= $currentPage['header'] ?></h1>

    <?php
      echo $currentPage['content'];
    ?>

  </div>

</div>