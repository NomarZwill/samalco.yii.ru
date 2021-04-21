<?php
  if (!$is_root_slice){

    echo '<div class="table_caption' . (count($tableData) > 0 ? '' : ' _hidden') . '">';
    echo   '<h2>' . (!strripos(Yii::$app->request->url, '?') !== false ? $currentItem['name'] : '') . ' ' . $currentSlice['name'] . ' под заказ</h2>';
    echo '</div>';
  }
?>

<noindex>

  <table class='pod_zakaz_tbl weight_kg  <?= count($tableData) > 0 ? '' : '_hidden' ?>' style='display:inline-table'>
  
    <tr class='table_firstRow'>
        
      <?php
        foreach (explode(';', $currentItem['table_column_names']) as $columnName){
        echo "<th>" . $columnName . "</th>";
        }
      ?>
      <th class="cart_icon"><img src="/images/card.png"></th>

    </tr>

    <?php 
      $paramsList = explode(';', $currentItem['params_set']);

      $formID = 1;
      foreach ($tableData as $row){
		    echo "<tr class='catalog_table_main _" . $currentItem['type'] . "'>";

        foreach ($paramsList as $param){

          if ($param == 'price') {
            echo "<td>уточняйте</td>";
          } elseif ($param == 'balance'){
            echo "<td>Под заказ</td>";
          } else {
            echo "<td>" . $row[$param] . "</td>";
          }
        }
        echo '<td>';

        $weight = backend\components\AllParams::getWeight($row, $currentItem['type']);
        echo '<form method="post" class="product-form">';
        echo '<input type="hidden" name="alloy" size="1" value="'.$row['alloy'].'">';
        echo '<input type="hidden" name="gost" size="1" value="'.$row['gost'].'">';
        echo '<input type="hidden" name="length" size="1" value="'.$row['length'].'">';
        echo '<input type="hidden" name="quantity" size="1" value="'.$row['balance'].'">';
        echo '<input type="hidden" name="real_price" size="1" value="'.$row['price'].'">';
        echo '<input type="hidden" name="category" size="1" value="' . $currentSlice['name'] . '">';
        if ($row['width'] !=='') echo '<input type="hidden" name="width" size="1" value="'.$row['width'].'">';      
        if ($row['curing'] !=='') echo '<input type="hidden" name="curing" size="1" value="'.$row['curing'].'">';
        if ($row['depth'] !=='') echo '<input type="hidden" name="depth" size="1" value="'.$row['depth'].'">';
        if ($row['diameter'] !=='') echo '<input type="hidden" name="diameter" size="1" value="'.$row['diameter'].'">';
        if ($row['section'] !=='') echo '<input type="hidden" name="section" size="1" value="'.$row['section'].'">'; 
        echo '<input type="hidden" name="session" value="' . session_id() . '">';
        echo '<input type="hidden" name="weight" value="'.$weight.'">';
        echo '<input type="hidden" id="formcallback' . $formID . '_csrf" class="form-hidden_field" name="_csrf-frontend" value="' . Yii::$app->request->getCsrfToken() . '">';
        echo '<input type="submit" value="купить" class="button button-cart">';
        echo '</form>';
        
        echo '</td>';
        echo '</tr>';
        $formID += 2;
      }
    ?>

  </table>

</noindex>