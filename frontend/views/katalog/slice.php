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

		<div class="breadcrumbs">
			[[Breadcrumbs? &currentAsLink=`0` &crumbSeparator=`/` &in_city=`[!in_city!]` &showCurrentCrumb=`0`]]
		</div>

		<h1>
      <?php
        echo $currentPage['subdomenSeo']['header'] . ((!$is_root_slice && !strripos(Yii::$app->request->url, '?') !== false) ? ' в ' . Yii::$app->params['subdomen_dec'] : '');
      ?>
     </h1>

    <?= $currentPage['subdomenSeo']['text_1'] ?>

		<div class="content_table">

      <?php 
        if ($is_root_slice){

          echo $this->render('/components/viewSection_list', [
            'subSliceList' => $subSliceList,
            'alias' => $currentPage['alias'],
            'currentPage' => $currentPage,
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
            'alias' => strripos(Yii::$app->request->url, '?') !== false ? $currentPage['alias'] : $currentPage['parent_alias'],
            'currentPage' => $currentPage,
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

    <?= $currentPage['subdomenSeo']['text_2'] ?>

		<?php
      if ($is_root_slice){
        $this->render('/components/orderProcedure', array('currentPage' => $currentPage));
      }
     ?>

    <?= $this->render('/components/orderForm') ?>

		<?= $this->render('/components/domainFooter' , array('currentBranch' => $currentBranch)) ?>

	</div>

</div>