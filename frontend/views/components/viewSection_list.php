<div class="exclamation">Все сплавы, которых нет в наличии, <a class="exclamation_link">доступны под заказ</a></div>

<?php
  $currentSession = Yii::$app->session;

  if (!$currentSession->isActive){
    $currentSession->open();
  }

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
    'WT' => 'width_st', // толщина стенки
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

  $baseHref = '';
  
  if (stripos($thishref, 'alyuminievye_profili') !== false) {
    $baseHref = current(explode('alyuminievye_profili', $thishref)) . 'alyuminievye_profili/';
  } else {
    $baseHref = current(explode('katalog', $thishref)) . 'katalog/';
  }
  
  $GETParamsList = explode('?', $thishref);

  if (count($GETParamsList) > 1){
    $filter = 1;
    // $GETParamsList = explode('&', $GETParamsList[1]);
  }

  # Добавление товара в корзину
  if ($_POST) {
    if ($_POST['alloy'] !== '') {
      // $session = session_id();
      $session = Yii::$app->session->id;
      $alloy = $_POST['alloy'];
      $category = $_POST['category'];
      $quantity = $_POST['quantity'];
      $real_price = (!empty($_POST['real_price'])) ? $_POST['real_price'] : false;
      $params = 'Размеры -';
      if  (isset($_POST['width']) && $_POST['width'] !== '') $params.= ' Ширина ' .$_POST['width']. ' мм,';
      if  (isset($_POST['length']) && $_POST['length'] !== '') $params.= ' Длина ' .$_POST['length']. ' мм,';
      if  (isset($_POST['depth']) && $_POST['depth'] !== '') $params.= ' Толщина ' .$_POST['depth']. ' мм,';
      if  (isset($_POST['diameter']) && $_POST['diameter'] !== '') $params.= ' Диаметр ' .$_POST['diameter']. ' мм,';
      $params.= '<br>';
      // if  ($_POST['plating'] !== '') $params.= ' Плакировка - ' .$_POST['plating']. ',';
      if  (isset($_POST['curing']) && $_POST['curing'] !== '') $params.= ' Термообработка - ' .$_POST['curing']. ',';
      $params.= ' ГОСТ - ' . $_POST['gost']; 
      $servername = "localhost";
      $username = "root";
      $password = "chf54ntgn4c45g7";
      $dbname = "samalco.yii.ru";
      $conn = mysqli_connect($servername, $username, $password, $dbname) or die(mysql_error());
      if (!$conn->set_charset("utf8mb4")) {
        echo "Ошибка при загрузке набора символов utf8mb4: \n" . ' ' . $conn->error . "\n";
        exit();
      } else {
        echo "Текущий набор символов: \n" . ' ' . $conn->character_set_name() . "\n";
      }      
      $query = "INSERT INTO cart_session_state (`session`, `name`, `alloy`, `params`, `quantity`, `real_price`) VALUES ('$session', '$category', '$alloy', '$params', '$quantity', '$real_price')";
      mysqli_query($conn, $query);
      header("Location: ".$thishref."");
    }
  }


  $GETParamsList = [];

  if (isset($_GET['C'])) {$C = $_GET['C']; $GETParamsList['alloy'] = $C; $c_param = '<b>Сплав</b>: '. mb_strtoupper($C); $filter=1; $section = 0; $a_param='';}
  if (isset($_GET['H'])) {$H = $_GET['H']; $GETParamsList['curing'] = $H; $h_param = $H === 'bez_to' ? '<b>Термообработка</b>: ' . 'без т/о' : '<b>Термообработка</b>: ' . $H; $filter=1; $section = 0; $a_param='';}
  if (isset($_GET['T'])) {$T = $_GET['T']; $GETParamsList['depth'] = $T; $t_param = '<b>Толщина</b>: '.$T; $filter=1; $section = 0; $a_param='';}
  if ($paramsList->type == 'tubes'){
    if (isset($_GET['WT'])) {$WT = $_GET['WT']; $GETParamsList['width_st'] = $WT; $wt_param = '<b>Толщина стенки</b>: '.$WT; $filter=1; $section = 0; $a_param='';}
  } else {
    if (isset($_GET['W'])) {$W = $_GET['W']; $GETParamsList['width'] = $W; $w_param = '<b>Ширина</b>: '.$W; $filter=1; $section = 0; $a_param='';}
  }
  if (isset($_GET['HT'])) {$HT = $_GET['HT']; $GETParamsList['height'] = $HT; $ht_param = '<b>Высота</b>: '.$HT; $filter=1; $section = 0; $a_param='';}
  if (isset($_GET['D'])) {$D = $_GET['D']; $GETParamsList['diameter'] = $D; $d_param = '<b>Диаметр</b>: '.$D; $filter=1; $section = 0; $a_param='';}
  if (isset($_GET['S'])) {$S = $_GET['S']; $GETParamsList['section'] = $S; $s_param = '<b>Сечение</b>: '.$S; $filter=1; $section = 0; $a_param='';}

  // БЛОК С ТЕКУЩИМИ ПАРАМЕТРАМИ СРЕЗА

  if (isset($a_param) || isset($c_param) || isset($s_param) || isset($t_param) || isset($w_param) || isset($b_param) || isset($wt_param)){
    echo '<div class="user-filter">';
    echo '<span class="usedFiltersHeader"><i>Выводятся только:&nbsp;&nbsp;';

    if ($filter == 2) {
      echo '<a href="' . $baseHref . $alias . '/">' . $a_param . '<span class="removeFilterIcon">✕</span></a>';
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

    if (isset($ht_param)){
      $hthref = str_replace('HT='.$HT.'&', '', $thishref);
      $hthref = str_replace('&HT='.$HT, '', $hthref);
      $hthref = str_replace('?HT='.$HT, '', $hthref);
      echo '<a href="' . $hthref . '">' . $ht_param . '<span class="removeFilterIcon">✕</span></a>';
    }

    echo '<span class="RemoveAll"><a href="' . $baseHref . $alias . '/">Сбросить&nbsp;фильтры</a></span>';
    echo '</i></span>';
    echo '</div>';
  }

  // БЛОК ВЫБОРА СРЕЗА ПО КАТЕГОРИЯМ

  foreach ($subSliceList as $categoryName => $categoryList){
    echo '<div class="section lists">';

    echo '<div class="section-name">По ' . $categoryNameRodList[$categoryName] . ':</div>';
    echo '<div class="filter_select" data-category-name="' . $categoryName . '">';
    if ($filter === 1){

      if (isset($GETParamsList[$categoryName])){
        if ($GETParamsList[$categoryName] === 'bez_to'){
          echo 'без т/о';
        } else {
          echo (isset($GETParamsList[$categoryName]) ? mb_strtoupper($GETParamsList[$categoryName]) : '');
        }
      }

    } elseif ($filter === 2 && $sliceParam == $categoryName){
      echo mb_strtoupper($sliceParamList[$sliceParam]);
    }
    echo '</div>';
    echo '<div class="section-links">';

    if ($filter === 2) {

      if ($sliceParam == $categoryName){
        $isProfil = false;
        if (strripos(urldecode(Yii::$app->request->url), 'alyuminievye_profili') !== false){
          $isProfil = true;
        }

        foreach ($categoryList as $key => $value){
          if ($categoryName === 'width' && $isProfil){
            if (mb_strtolower(($value === 'без т/о' ? 'bez_to' : $value)).'w' == $currentSlice->alias){
              echo '<span class="active">' . $value . '</span>';
            } else {
              echo '<span>';
              echo '<a href="' . $baseHref . $alias . '/' . mb_strtolower(($value === 'без т/о' ? 'bez_to' : $value)) . 'w/">' . $value . '</a>';
              echo '</span>';
            }
          } elseif ($categoryName === 'height' && $isProfil){
            if (mb_strtolower(($value === 'без т/о' ? 'bez_to' : $value)).'ht' == $currentSlice->alias){
              echo '<span class="active">' . $value . '</span>';
            } else {
              echo '<span>';
              echo '<a href="' . $baseHref . $alias . '/' . mb_strtolower(($value === 'без т/о' ? 'bez_to' : $value)) . 'ht/">' . $value . '</a>';
              echo '</span>';
            }
          } else {
            if (mb_strtolower(($value === 'без т/о' ? 'bez_to' : $value)) == $currentSlice->alias){
              echo '<span class="active">' . $value . '</span>';
            } else {
              echo '<span>';
              echo '<a href="' . $baseHref . $alias . '/' . mb_strtolower(($value === 'без т/о' ? 'bez_to' : $value)) . '/">' . $value . '</a>';
              echo '</span>';
            }
          }
        }
      } else {

        foreach ($categoryList as $key => $value){
          echo '<span>';

          if ($categoryName == 'width_st'){
            echo '<a href="' . $baseHref . $alias . '/?' . $encodedToGETParam . '&WT=' . mb_strtolower($value) . '">' . $value . '</a>';
          } else {
            $encodedToGETParam = str_replace([' (шг)', ' (кв)', ' (кр)'], '', $encodedToGETParam);
            echo '<a href="' . $baseHref . $alias . '/?' . $encodedToGETParam . '&' . array_search($categoryName, $getParamsMapping) . '=' . mb_strtolower(($value === 'без т/о' ? 'bez_to' : $value)) . '">' . $value . '</a>';
          }
          echo '</span>';
        }
      }
    }

    if ($filter === 1){

      foreach ($categoryList as $key => $value){
            
        if (isset($GETParamsList[$categoryName])) {

          if ($GETParamsList[$categoryName] == mb_strtolower(($value === 'без т/о' ? 'bez_to' : $value))) { 
            echo '<span class="active">' . $value . '</span>';
          } else {

            $href = '';
            if ($categoryName === 'curing') {
              // $href = str_replace($GETParamsList[$categoryName] , mb_strtolower(($value === 'без т/о' ? 'bez_to' : $value)), $thishref);
              foreach ($GETParamsList as $param => $val){
                if ($param === 'curing'){
                  $href .= '&' . array_search($param, $getParamsMapping) . '=' . mb_strtolower(($value === 'без т/о' ? 'bez_to' : $value));
                } else {
                  $href .= '&' . array_search($param, $getParamsMapping) . '=' . $val;
                }

                $href = '?' . substr($href, 1);
              }

            } else {
              $param = array_search($categoryName, $getParamsMapping).'=';
              $href = str_replace($param.$GETParamsList[$categoryName] , $param.mb_strtolower(($value === 'без т/о' ? 'bez_to' : $value)), $thishref);
            }
              echo '<span data-test="'.$categoryName.'"><a href="' . $href . '">' . $value . '</a></span>'; 
          }
        } else {
          if ($categoryName == 'width_st'){
            $getParam = 'WT';
          } else {
            $getParam = array_search($categoryName, $getParamsMapping);
          }
          echo '<span><a href="' . $thishref . '&' . $getParam . '=' . mb_strtolower(($value === 'без т/о' ? 'bez_to' : $value)) . '">' . $value . '</a></span>';
        }
      }
    }

    if ($filter === 0){

      foreach ($categoryList as $key => $value){

        $isProfil = false;
        if (strripos(urldecode(Yii::$app->request->url), 'alyuminievye_profili') !== false){
          $isProfil = true;
        }

        if ($categoryName === 'width' && $isProfil){
          echo '<span>';
          echo '<a href="' . $thishref . $value . 'w/">' . $value . '</a>';
          echo '</span>';
        } elseif ($categoryName === 'height' && $isProfil){
          echo '<span>';
          echo '<a href="' . $thishref . $value . 'ht/">' . $value . '</a>';
          echo '</span>';
        } else {
          echo '<span>';
          echo '<a href="' . $thishref . mb_strtolower(($value === 'без т/о' ? 'bez_to' : $value)) . '/">' . $value . '</a>';
          echo '</span>';
        }
      }
    }

    echo '</div>';
    echo '</div>';
  }

  if ($filter !== 0){ 
    echo '<span class="RemoveAllMobile"><a href="' . $baseHref . $alias . '/">Сбросить&nbsp;фильтры</a></span>'; 
  }

?>

</br>          

<div class="table_caption <?= count($tableData) > 0 ? '' : '_hidden' ?>">
  <h2><?= (!$is_root_slice && !strripos(Yii::$app->request->url, '?') !== false ? $currentItem['name'] : '') . ' ' . $currentSlice['name'] ?> в наличии</h2>
  <button class="btn_popup_weight">Калькулятор веса</button>

</div>

<table class='weight_kg  <?= count($tableData) > 0 ? '' : '_hidden' ?>'>
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

      $formID = 0;
      // if (session_id() === ''){
      //   session_start();
      // }

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
          echo '<input type="hidden" name="session" value="' . Yii::$app->session->id . '">';
          echo '<input type="hidden" name="weight" value="'.$weight.'">';
          echo '<input type="hidden" id="formcallback' . $formID . '_csrf" class="form-hidden_field" name="_csrf-frontend" value="' . Yii::$app->request->getCsrfToken() . '">';
          echo '<input type="submit" value="купить" class="button button-cart">';
          echo '</form>';

          $formID += 2;
        }
        echo '</td>';
        echo '</tr>';
      }
    ?>
  </tbody>
</table>

<?php
  if ($is_root_slice) {
    echo "<div class='table_caption pod_zakaz' id='pod_zakaz'><h2><a class='clear show_all_link' data-session='".Yii::$app->session->id."' data-table='".$currentItem['type']."' data-filter='".$is_root_slice."' data-table_head='".$currentItem['table_column_names']."'data-table_params='".$currentItem['params_set']."' data-rcnot=''>" . $currentSlice['name'] . " под заказ (показать все)</a></h2></div>";
    // if ($section == 'all' && $is_root_slice == 0) { echo '<noindex>';}
  }
?>

</br>

