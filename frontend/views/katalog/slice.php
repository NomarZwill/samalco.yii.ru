<?php 
	echo $this->render('/components/headerAddCat', array(
    'table' => $paramsList->type,
    'mobile' => 1,
    ));
?>

<div class="main_wrap" data-page-type='katalog'>

  <?= $this->render('/components/sidebar', array(
    'table' => $paramsList->type,
    'mobile' => '',
    )) ?>

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

    <?= $currentSlice['subdomenSeo']['text_1'] ?>

		<div class="content_table">

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

    <?= $currentSlice['subdomenSeo']['text_2'] ?>

		<?php
      if ($is_root_slice){
        echo $orderProcedure;
      }
     ?>

    <?= $this->render('/components/orderForm') ?>

		<?= $this->render('/components/domainFooter' , array('currentBranch' => $currentBranch)) ?>

	</div>

</div>