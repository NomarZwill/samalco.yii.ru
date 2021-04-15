<div class="main_wrap" data-page-type='katalog'>
	<div class="sidebar">
		<div class="sidebar_menu">
			<a href="/katalog/alyuminievaya_shina/" class="sidebar_item">
				<img src="/images/main2018/sidebar1.jpg"/>
				<p>Шина</p>
			</a>
			<a href="/katalog/alyuminievye_listy/" class="sidebar_item">
				<img src="/images/main2018/sidebar2.jpg"/>
				<p>Лист</p>
			</a>
			<a href="/katalog/alyuminievye_prutki/" class="sidebar_item">
				<img src="/images/main2018/sidebar3.jpg"/>
				<p>Пруток</p>
			</a>
			<a href="/katalog/alyuminievye_lenty/" class="sidebar_item">
				<img src="/images/main2018/sidebar4.jpg"/>
				<p>Лента</p>
			</a>
			<a href="/katalog/alyuminievye_plity/" class="sidebar_item">
				<img src="/images/main2018/sidebar5.jpg"/>
				<p>Плита</p>
			</a>
			<a href="/katalog/alyuminievye_truby/" class="sidebar_item">
				<img src="/images/main2018/sidebar6.jpg"/>
				<p>Труба</p>
			</a>
			<a href="/katalog/alyuminievye_profili/" class="sidebar_item">
				<img src="/images/main2018/sidebar7.jpg"/>
				<p>Профиль</p>
			</a>
			<a href="/katalog/alyuminieviy_profnastil/" class="sidebar_item">
				<img src="/images/main2018/sidebar8.jpg"/>
				<p>Профнастил (проф.лист)</p>
			</a>
			<a href="/katalog/alyuminievye_pokovki_i_shtampovki/" class="sidebar_item">
				<img src="/images/main2018/sidebar9.jpg"/>
				<p>Штамповка</p>
			</a>
		</div>
	</div>

	<div class="content">

		<div class="breadcrumbs">
			[[Breadcrumbs? &currentAsLink=`0` &crumbSeparator=`/` &in_city=`[!in_city!]` &showCurrentCrumb=`0`]]
		</div>

		<h1><?= $currentPage['subdomenSeo']['header'] ?></h1>

    <?= $currentPage['subdomenSeo']['text_1'] ?>

		<div class="content_table">

      <?= $this->render('/components/viewSection_list', [
        'subSliceList' => $subSliceList,
        'alias' => $currentPage['alias'],
        'currentSliceName' => $currentSlice['name'],
        'tableData' => $tableData,
        'currentItem' => $currentItem,
        'is_root_slice' => $is_root_slice,
        ]) 
      ?>

		</div>

    <?= $currentPage['subdomenSeo']['text_2'] ?>

    <div class="order_procedure_wrapper">
      <h2>Порядок заказа и оплаты <?= $currentPage['extraContent']['name_rod'] ?> в <?= Yii::$app->params['subdomen_dec'] ?></h2>
      <div class="order_procedure">
        <div class='order_procedure_item'>
          <div class='order_procedure_item_img'>
            <img src="/images/order_procedure/order_procedure_icon_1.svg"></div>
          <div class='order_procedure_item_text'>
            Вы <b>подаете заявки</b> на&nbsp;интересующую продукцию
          </div>
        </div>
        <div class='order_procedure_item'>
          <div class='order_procedure_item_img'>
            <img src="/images/order_procedure/order_procedure_icon_2.svg"></div>
          <div class='order_procedure_item_text'>
            <b>Заключаем договор</b> на&nbsp;поставку интересующей продукции в <?= Yii::$app->params['subdomen_dec'] ?>
          </div>
        </div>
        <div class='order_procedure_item'>
          <div class='order_procedure_item_img'>
            <img src="/images/order_procedure/order_procedure_icon_3.svg"></div>
          <div class='order_procedure_item_text'>
            На&nbsp;основании заявки <b>оформляем спецификацию</b>, в&nbsp;которой указывается цена, срок, отгрузка со&nbsp;склада или требуемое время на&nbsp;изготовление
          </div>
        </div>
        <div class='order_procedure_item'>
          <div class='order_procedure_item_img'>
            <img src="/images/order_procedure/order_procedure_icon_4.svg"></div>
          <div class='order_procedure_item_text'>
            На&nbsp;основании спецификации <b>выставляем счёт</b> на&nbsp;оплату
          </div>
        </div>
        <div class='order_procedure_item'>
          <div class='order_procedure_item_img'>
            <img src="/images/order_procedure/order_procedure_icon_5.svg"></div>
          <div class='order_procedure_item_text'>
            После оплаты <b>отгружаем продукцию</b>, имеющуюся в&nbsp;наличии на&nbsp;складе, либо <span class="blue_color">после 50% предоплаты</span> за&nbsp;партию отдаем заказ в&nbsp;производство
          </div>
        </div>
        <div class='order_procedure_item'>
          <div class='order_procedure_item_img'>
            <img src="/images/order_procedure/order_procedure_icon_6.svg"></div>
          <div class='order_procedure_item_text'>
            <b>Соблюдаем сроки изготовления</b> от&nbsp;10 до&nbsp;20 раб.&nbsp;дней, в&nbsp;зависимости от&nbsp;объёма заказа и&nbsp;загруженности производства
          </div>
        </div>
        <div class='order_procedure_item'>
          <div class='order_procedure_item_img'>
            <img src="/images/order_procedure/order_procedure_icon_7.svg"></div>
          <div class='order_procedure_item_text'>
            <b>Ожидаем оставшуюся сумму</b> от&nbsp;Заказчика в&nbsp;течение 5 раб.&nbsp;дней после уведомления о&nbsp;готовности продукции к&nbsp;отгрузке
          </div>
        </div>
        <div class='order_procedure_item'>
          <div class='order_procedure_item_img'>
            <img src="/images/order_procedure/order_procedure_icon_8.svg"></div>
          <div class='order_procedure_item_text'>
            <b>Отгружаем продукцию</b> по&nbsp;указанному адресу<br /> в <?= Yii::$app->params['subdomen_dec'] ?> после поступления на&nbsp;счёт 100% оплаты
          </div>
        </div>
      </div>
    </div>

    <?= $this->render('/components/orderForm') ?>

    <div id="ajax_map_wrapper">

      <div class="footer_phone">

        <p class="bigfont">Наш адрес: <?= $currentBranch['addressLocality']?>, <?= $currentBranch['postalCode']?>, <?= $currentBranch['streetAddress']?>.</p>

        <p>Телефон: <?= $currentBranch['phone']?></p>

        <?= $currentBranch['map']?>

      </div>

    </div>

	</div>

</div>