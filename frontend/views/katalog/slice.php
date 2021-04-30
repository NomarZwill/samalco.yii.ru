<?php 
	echo $this->render('/components/headerAddCat', array(
    'table' => $paramsList->type,
    'mobile' => 1,
    ));
?>

<div class="main_wrap" data-page-type='katalog'>

  <?= $sidebar ?>
  
	<div class="content">

  <?= $this->render('/components/breadcrumbs', array(
    'breadcrumbs' => $breadcrumbs,
    ))
  ?>

		<h1>
      <?php
        // echo $currentSlice['subdomenSeo']['header'] . ((!$is_root_slice && !strripos(Yii::$app->request->url, '?') !== false) ? ' в ' . Yii::$app->params['subdomen_dec'] : '');
        echo $currentSlice['subdomenSeo']['header'];
      ?>
     </h1>

    <?= !$is_profil ? $currentSlice['subdomenSeo']['text_1'] : '' ?>

		<div class="content_table">

      <?= $is_profil ? $currentSlice['subdomenSeo']['text_1'] : '' ?>
      <?= $is_profil ? $this->render('/components/profili_exclamation', array('alias' => $currentSlice->alias)) : '' ?>
      <?= $is_profil ? $currentSlice['subdomenSeo']['text_2'] : '' ?>
      <?php 
        if ($is_root_slice){

          echo $this->render('/components/viewSection_list', [
            'subSliceList' => $subSliceList,
            'alias' => $currentPage['alias'],
            // 'currentPage' => $currentPage,
            'paramsList' => $paramsList,
            'tableData' => $tableData,
            'currentItem' => $currentItem,
            'currentSlice' => $currentSlice,
            'is_root_slice' => $is_root_slice,
          ]);

          echo $is_profil ? ($currentSlice['subdomenSeo']['text_3'] . '</br>' . $currentSlice['subdomenSeo']['text_4']) : '';

        }

        if (!$is_root_slice){
          
          echo $this->render('/components/viewSection_list', [
            'subSliceList' => $subSliceList,
            'alias' => strripos(Yii::$app->request->url, '?') !== false ? $currentSlice['alias'] : $currentSlice['parent_alias'],
            // 'currentPage' => $currentPage,
            'paramsList' => $paramsList,
            'tableData' => $tableData,
            'currentItem' => $currentItem,
            'currentSlice' => $currentSlice,
            'is_root_slice' => $is_root_slice,
          ]);

          echo !$is_profil ? ($currentSlice['subdomenSeo']['text_2'] . '</br>') : ($currentSlice['subdomenSeo']['text_3'] . '</br>' . $currentSlice['subdomenSeo']['text_4']);

          echo $this->render('/components/noBalanceTable', array(
            'tableData' => $noBalanceTableData,
            'currentItem' => $currentItem,
            'currentSlice' => $currentSlice,
            'is_root_slice' => $is_root_slice,
          ));

          if (count($tableData) === 0 && count($noBalanceTableData) === 0){
            echo '<div class="table_caption"><h4>По заданным критериям ничего не найдено. Попробуйте изменить условия поиска.</h4><br><br></div>';
          }
        }

      ?>

		</div>

    <?= !$is_profil ? $currentSlice['subdomenSeo']['text_3'] : '' ?>
    </br>

		<?php
      if ($is_root_slice){
        echo $orderProcedure;
      }
     ?>

    <?= $this->render('/components/orderForm') ?>

		<?= $this->render('/components/domainFooter' , array('currentBranch' => $currentBranch)) ?>

	</div>

</div>