<div class="exclamation">Все сплавы, которых нет в наличии, <a class="exclamation_link">доступны под заказ</a></div>

<?php
  $categoryNameRodList = [
    'alloy' => 'сплаву',
    'depth' => 'толщине',
    'width' => 'ширине',
    'curing' => 'термообработке',
    'width_st' => 'толщине стенки',
    'diameter' => 'диаметру',
    'section' => 'сечению',
    'height' => 'высоте'
  ];

  foreach ($subSliceList as $categoryName => $categoryList){
    echo '<div class="section lists">';

    echo '<div class="section-name">По ' . $categoryNameRodList[$categoryName] . ':</div>';
    echo '<div class="filter_select"></div>';
    echo '<div class="section-links">';

    foreach ($categoryList as $key => $value){
      echo '<span>';
      echo '<a href="/katalog/' . $alias . '/' . $value . '/">' . $value . '</a>';
      echo '</span>';
    }

    echo '</div>';
    echo '</div>';
  }
?>

</br>

<div class="table_caption">

  <h2><?= $currentSliceName ?> в наличии</h2>
  <button class="btn_popup_weight">Калькулятор веса</button>

</div>

<table class='weight_kg'>
  <tbody>
    <tr class="table_firstRow">

      <?php 
        foreach (explode(';', $currentItem['table_column_names']) as $columnName){
          echo "<th>" . $columnName . "</th>";
        }
      ?>
      <th class="cart_icon"><img src="/images/card.png"></th>
    </tr>

    <?php 
      $paramsList = explode(';', $currentItem['params_set']);

      foreach ($tableData as $row){
		    echo "<tr class='catalog_table_main _" . $currentItem['type'] . "'>";

        foreach ($paramsList as $param){

          if ($param == 'price') {
            echo "<td>" . $row[$param] . " руб." . "</td>";
          } else {
            echo "<td>" . $row[$param] . "</td>";
          }
        }
        echo '<td>';

        if ($row['balance'] !== '0') {
          $weight = backend\components\AllParams::getWeight($row, $currentItem['type']);
          echo '<form method="post" class="product-form">';
          echo '<input type="hidden" name="alloy" size="1" value="'.$row['alloy'].'">';
          echo '<input type="hidden" name="gost" size="1" value="'.$row['gost'].'">';
          echo '<input type="hidden" name="length" size="1" value="'.$row['length'].'">';
          echo '<input type="hidden" name="quantity" size="1" value="'.$row['balance'].'">';
          echo '<input type="hidden" name="real_price" size="1" value="'.$row['price'].'">';
          echo '<input type="hidden" name="category" size="1" value="' . $currentSliceName . '">';
          if ($row['width'] !=='') echo '<input type="hidden" name="width" size="1" value="'.$row['width'].'">';      
          // if ($row['plating'] !=='') echo '<input type="hidden" name="plating" size="1" value="'.$row['plating'].'">';
          if ($row['curing'] !=='') echo '<input type="hidden" name="curing" size="1" value="'.$row['curing'].'">';
          if ($row['depth'] !=='') echo '<input type="hidden" name="depth" size="1" value="'.$row['depth'].'">';
          // if ($row['strength'] !=='') echo '<input type="hidden" name="strength" size="1" value="'.$row['strength'].'">';
          if ($row['diameter'] !=='') echo '<input type="hidden" name="diameter" size="1" value="'.$row['diameter'].'">';
          if ($row['section'] !=='') echo '<input type="hidden" name="section" size="1" value="'.$row['section'].'">'; 
          echo '<input type="hidden" name="session" value="'.session_id().'">';
          echo '<input type="hidden" name="weight" value="'.$weight.'">';
          echo '<input type="submit" value="купить" class="button button-cart">';
          echo '</form>';
        }
        echo '</td>';
        echo '</tr>';
      }
    ?>
  </tbody>
</table>

<?php
if ($is_root_slice) {
    echo "<div class='table_caption pod_zakaz' id='pod_zakaz'><h2><a class='clear show_all_link' data-session='".session_id()."' data-table='".$currentItem['type']."' data-filter='".$is_root_slice."' data-table_head='".$currentItem['table_column_names']."'data-table_params='".$currentItem['params_set']."' data-rcnot=''>" . $currentSliceName . " под заказ (показать все)</a></h2></div>";
    // if ($section == 'all' && $is_root_slice == 0) { echo '<noindex>';}
  } else {
    echo '[no balanse table]';
  }
?>

</br>

