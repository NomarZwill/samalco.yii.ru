<div class="exclamation">Все сплавы, которых нет в наличии, <a class="exclamation_link">доступны под заказ</a></div>

<?php
  $categoryNameList = [
    'alloy' => 'Сплав',
    'depth' => 'Толщина',
    'width' => 'Ширина',
    'curing' => 'Термообработка',
    'width_st' => 'Толщина стенки',
    'diameter' => 'Диаметр',
    'section' => 'Сечение',
    'height' => 'Высота'
  ];

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

  $getParamsMapping = [
    'C' => 'alloy',
    'H' => 'curing',
    'T' => 'depth',
    'W' => 'width',
    'WT' => 'width', // толщина стенки
    'HT' => 'height',
    'D' => 'diameter',
    'S' => 'section'
  ];

  $filter = 0; // 0 - без фильтра, 1 - выбрано несколько параметров, 2 - выбран один параметр

  if ($is_root_slice) {
    $filter = 0;
  } else {
    $filter = 2;
    $sliceParamList = (array)$paramsList;
    unset($sliceParamList['subdomen']);
    $a_param = '<b>' . $categoryNameList[array_key_last($sliceParamList)] . '</b>: ' . $sliceParamList[array_key_last($sliceParamList)];
    $sliceParam = array_key_last($sliceParamList);
    $encodedToGETParam = array_search($sliceParam, $getParamsMapping) . '=' . mb_strtolower($sliceParamList[array_key_last($sliceParamList)]);
  }

  $thishref = urldecode(Yii::$app->request->url);

  $GETParamsList = explode('?', $thishref);

  if (count($GETParamsList) > 1){
    $filter = 1;
    // $GETParamsList = explode('&', $GETParamsList[1]);
  }

  if (isset($_GET['C'])) {$C = $_GET['C']; $c_param = '<b>Сплав</b>: '.mb_strtoupper($C); $filter=1; $section = 0; $a_param='';}
  if (isset($_GET['H'])) {$H = $_GET['H']; $h_param = '<b>Термообработка</b>: '.$H; $filter=1; $section = 0; $a_param='';}
  if (isset($_GET['T'])) {$T = $_GET['T']; $t_param = '<b>Толщина</b>: '.$T; $filter=1; $section = 0; $a_param='';}
  if ($paramsList->type == 'tubes'){
    if (isset($_GET['W'])) {$WT = $_GET['W']; $wt_param = '<b>Толщина стенки</b>: '.$WT; $filter=1; $section = 0; $a_param='';}
  } else {
    if (isset($_GET['W'])) {$W = $_GET['W']; $w_param = '<b>Ширина</b>: '.$W; $filter=1; $section = 0; $a_param='';}
  }
  if (isset($_GET['HT'])) {$HT = $_GET['HT']; $ht_param = '<b>Высота</b>: '.$HT; $filter=1; $section = 0; $a_param='';}
  if (isset($_GET['D'])) {$D = $_GET['D']; $d_param = '<b>Диаметр</b>: '.$D; $filter=1; $section = 0; $a_param='';}
  if (isset($_GET['S'])) {$S = $_GET['S']; $s_param = '<b>Сечение</b>: '.$S; $filter=1; $section = 0; $a_param='';}

  // БЛОК С ТЕКУЩИМИ ПАРАМЕТРАМИ СРЕЗА

  if (isset($a_param) || isset($c_param) || isset($s_param) || isset($t_param) || isset($w_param) || isset($b_param) || isset($wt_param)){
    echo '<div class="user-filter">';
    echo '<span class="usedFiltersHeader"><i>Выводятся только:&nbsp;&nbsp;';

    if ($filter == 2) {
      echo '<a href="/katalog/' . $alias . '/">' . $a_param . '<span class="removeFilterIcon">✕</span></a>';
    }

    if (isset($c_param)){
      $chref = str_replace('C='.$C.'&', '', $thishref);
      $chref = str_replace('&C='.$C, '', $chref);
      $chref = str_replace('?C='.$C, '', $chref);
      echo '<a href="' . $chref . '">' . $c_param . '<span class="removeFilterIcon">✕</span></a>';
    }

    if (isset($s_param)){
      $shref = str_replace('S='.$S.'&', '', $thishref);
      $shref = str_replace('&S='.$S, '', $shref);
      $shref = str_replace('?S='.$S, '', $shref);
      echo '<a href="' . $shref . '">' . $s_param . '<span class="removeFilterIcon">✕</span></a>';
    }

    if (isset($t_param)){
      $thref = str_replace('T='.$T.'&', '', $thishref);
      $thref = str_replace('&T='.$T, '', $thref);
      $thref = str_replace('?T='.$T, '', $thref);
      echo '<a href="' . $thref . '">' . $t_param . '<span class="removeFilterIcon">✕</span></a>';
    }

    if (isset($w_param)){
      $whref = str_replace('W='.$W.'&', '', $thishref);
      $whref = str_replace('&W='.$W, '', $whref);
      $whref = str_replace('?W='.$W, '', $whref);
      echo '<a href="' . $whref . '">' . $w_param . '<span class="removeFilterIcon">✕</span></a>';
    }

    if (isset($d_param)){
      $dhref = str_replace('D='.$D.'&', '', $thishref);
      $dhref = str_replace('&D='.$D, '', $dhref);
      $dhref = str_replace('?D='.$D, '', $dhref);
      echo '<a href="' . $dhref . '">' . $d_param . '<span class="removeFilterIcon">✕</span></a>';
    }

    if (isset($wt_param)){
      $wthref = str_replace('WT='.$WT.'&', '', $thishref);
      $wthref = str_replace('&WT='.$WT, '', $wthref);
      $wthref = str_replace('?WT='.$WT, '', $wthref);
      echo '<a href="' . $wthref .'"> ' . $wt_param .'<span class="removeFilterIcon">✕</span></a>';
    }

    if (isset($h_param)){
      $hhref = str_replace('H='.$H.'&', '', $thishref);
      $hhref = str_replace('&H='.$H, '', $hhref);
      $hhref = str_replace('?H='.$H, '', $hhref);
      echo '<a href="' . $hhref . '">' . $h_param . '<span class="removeFilterIcon">✕</span></a>';
    }

    echo '<span class="RemoveAll"><a href="/katalog/' . $alias . '/">Сбросить&nbsp;фильтры</a></span>';
    echo '</i></span>';
    echo '</div>';
  }

  // БЛОК ВЫБОРА СРЕЗА ПО КАТЕГОРИЯМ

  foreach ($subSliceList as $categoryName => $categoryList){
    echo '<div class="section lists">';

    echo '<div class="section-name">По ' . $categoryNameRodList[$categoryName] . ':</div>';
    echo '<div class="filter_select"></div>';
    echo '<div class="section-links">';

    if ($filter === 2) {

      if ($sliceParam == $categoryName){

        foreach ($categoryList as $key => $value){
  
          if (mb_strtolower($value) == $currentSlice->alias){
            echo '<span class="active">' . $value . '</span>';
          } else {
            echo '<span>';
            echo '<a href="/katalog/' . $alias . '/' . mb_strtolower($value) . '/">' . $value . '</a>';
            echo '</span>';
          }
        }
      } else {

        foreach ($categoryList as $key => $value){
          echo '<span>';

          if ($categoryName == 'width_st'){
            echo '<a href="/katalog/' . $alias . '/?' . $encodedToGETParam . '&WT=' . mb_strtolower($value) . '">' . $value . '</a>';
          } else {
            echo '<a href="/katalog/' . $alias . '/?' . $encodedToGETParam . '&' . array_search($categoryName, $getParamsMapping) . '=' . mb_strtolower($value) . '">' . $value . '</a>';
          }
          echo '</span>';
        }
      }
    }

    if ($filter === 0){

      foreach ($categoryList as $key => $value){
        echo '<span>';
        echo '<a href="/katalog/' . $alias . '/' . mb_strtolower($value) . '/">' . $value . '</a>';
        echo '</span>';
      }
    }

    echo '</div>';
    echo '</div>';
  }
?>

</br>

<div class="table_caption">

  <h2><?= $currentSlice['name'] ?> в наличии</h2>
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
          echo '<input type="hidden" name="category" size="1" value="' . $currentSlice['name'] . '">';
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
    echo "<div class='table_caption pod_zakaz' id='pod_zakaz'><h2><a class='clear show_all_link' data-session='".session_id()."' data-table='".$currentItem['type']."' data-filter='".$is_root_slice."' data-table_head='".$currentItem['table_column_names']."'data-table_params='".$currentItem['params_set']."' data-rcnot=''>" . $currentSlice['name'] . " под заказ (показать все)</a></h2></div>";
    // if ($section == 'all' && $is_root_slice == 0) { echo '<noindex>';}
  }
?>

</br>

