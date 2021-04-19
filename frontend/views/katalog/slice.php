<div class="main_wrap" data-page-type='katalog'>

  <?= $this->render('/components/sidebar') ?>

	<div class="content">

		<div class="breadcrumbs">
			[[Breadcrumbs? &currentAsLink=`0` &crumbSeparator=`/` &in_city=`[!in_city!]` &showCurrentCrumb=`0`]]
		</div>

		<h1>
      <?php
        echo $currentPage['subdomenSeo']['header'] . (!$is_root_slice ? ' в ' . Yii::$app->params['subdomen_dec'] : '');
      ?>
     </h1>

    <?= $currentPage['subdomenSeo']['text_1'] ?>

		<div class="content_table">

      <?php 
        if ($is_root_slice){
          echo $this->render('/components/viewSection_list', [
            'subSliceList' => $subSliceList,
            'alias' => $currentPage['alias'],
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
            'alias' => count((array)$paramsList) > 3 ? $currentPage['alias'] : $currentPage['parent_alias'],
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
          ));
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