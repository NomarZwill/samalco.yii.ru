
<div class="breadcrumbs">

  <span class="B_crumbBox">

    <?php 
      if (isset($breadcrumbs) && count($breadcrumbs) > 0){
        $link = '/';
        $i = 1;
        foreach ($breadcrumbs as $crumb){

          if ($i == 1){
            echo '<span class="B_firstCrumb">';
              echo '<a class="B_homeCrumb" href="' . $link . '" title="">' . $crumb['name'] . '</a>';
            echo '</span> / ';
          } elseif ($i == count($breadcrumbs)){
            echo '<span class="B_lastCrumb">';
              echo '<span class="B_crumb">' . $crumb['name'] . '</span>';
            echo '</span>';
          } else {
            $link .= $crumb['link'] . '/';
            echo '<a class="B_crumb" href="' . $link . '" title="">' . $crumb['name'] . '</a> / ';
          }

          $i++;
        }
      }
    ?>

  </span>

</div>