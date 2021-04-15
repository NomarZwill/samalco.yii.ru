<!-- {{headerAddStatic}} -->
<div class="main_wrap _main">

	<div class="main_block">
		<h1><?= $currentPage['header'] ?></h1>
		<div class="main_text">
			<?= $currentPage['text_1'] ?>
		</div>
		<div class="calc_link_block">
			<div class="calc_wrapper">
				<div class="calc_icon"></div>
				<div class="calc_title">Калькулятор веса алюминиевых изделий</div>
				<div class="calc_nav">
					<div class="calc_nav_title">Выберите нужный вид алюминиевого&nbsp;проката</div>
					<div class="calc_nav_items">
						<nav role="navigation">
							<div class="nav_wrapper">
								<div class="calc_item-first">Вид проката</div>
								<ul class="dropdown">
									<li><a href="/katalog/alyuminievye_listy/#to_calc">Алюминиевый лист</a></li>
									<li><a href="/katalog/alyuminievye_plity/#to_calc">Алюминиевые плиты</a></li>
									<li><a href="/katalog/alyuminievye_truby/#to_calc">Алюминиевые трубы</a></li>
									<li><a href="/katalog/alyuminievye_lenty/#to_calc">Алюминиевая лента</a></li>
									<li><a href="/katalog/alyuminievye_prutki/#to_calc">Алюминиевые прутки</a></li>
									<li><a href="/katalog/alyuminievye_profili/tavr/#to_calc">Алюминиевый тавр</a></li>
									<li><a href="/katalog/alyuminievye_profili/dvutavr/#to_calc">Алюминиевый двутавр</a></li>
									<li><a href="/katalog/alyuminievye_profili/shveller/#to_calc">Алюминиевый швеллер</a></li>
									<li><a href="/katalog/alyuminievye_profili/shveller/#to_calc">Алюминиевый п-образный профиль</a></li>
									<li><a href="/katalog/alyuminievye_profili/tavr/#to_calc">Алюминиевый т-образный профиль</a></li>
									<li><a href="/katalog/alyuminievye_profili/dvutavr/#to_calc">Алюминиевый н-образный профиль</a></li>
								</ul>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<h2>Каталог продукции в <?= $currentSubdomen['name_dec'] ?></h2>
		<div class="main_cat">
			<?php
				
				foreach ($katalogList as $item){
					echo '<div class="main_cat_item">';
					echo '<div class="main_cat_item_img">';
					echo '<img src="' . $item['extraContent']['menu_image'] . '" alt="">';
					echo '</div>';
					echo '<div class="main_cat_item_link">';
					echo '<a href="katalog/' . $item['alias'] . '/">' . $item['extraContent']['menu_name'] . '</a>';
					echo '</div>';
					// <div class="main_alloy_list"><a href="/katalog/alyuminievye_listy/ак4-1">АК4-1</a><a href="/katalog/alyuminievye_listy/1105">1105</a><a href="/katalog/alyuminievye_listy/1925">1925</a><a href="/katalog/alyuminievye_listy/д19ч">Д19Ч</a><a href="/katalog/alyuminievye_listy/д16">Д16</a><a href="/katalog/alyuminievye_listy/ак4">АК4</a><a href="/katalog/alyuminievye_listy/1163">1163</a><a href="/katalog/alyuminievye_listy/1915">1915</a><a href="/katalog/alyuminievye_listy/вд1">ВД1</a><a href="/katalog/alyuminievye_listy/в95">В95</a><a href="/katalog/alyuminievye_listy/д1">Д1</a><a href="/katalog/alyuminievye_listy/ав">АВ</a><a href="/katalog/alyuminievye_listy/амг5">АМГ5</a><a href="/katalog/alyuminievye_listy/амг2">АМГ2</a><a href="/katalog/alyuminievye_listy/ад1">АД1</a><a href="/katalog/alyuminievye_listy/а5">А5</a><a href="/katalog/alyuminievye_listy/амц">АМЦ</a></div>
					echo '</div>';
				}

			?>
		</div>
		
		<div class="main_text">
			<?= $currentPage['text_4'] ?>
		</div>
	</div>
	<div class="main_callback">
		<p class="callback_title">Мы свяжемся с вами в удобное время!</p>
		<p>Гарантируем конфиденциальность предоставляемой информации</p>
		<div class="main_callback_button">Отправить заявку</div>
	</div>

	<div class="main_block">
		<h2>Несколько слов о нас</h2>
		<div class="main_words">
			<div class="main_words_item">
				<div class="main_words_item_img">
					<img src="/images/main2018/ico1.png" alt=""/>
				</div>
				<div class="main_words_item_text">
					<p>Работаем с более чем 500 металлообрабатывающих компаний</p>
				</div>
			</div>
			<div class="main_words_item">
				<div class="main_words_item_img">
					<img src="/images/main2018/ico2.png" alt=""/>
				</div>
				<div class="main_words_item_text">
					<p>На рынке более 15 лет <br/>Более 300 видов изделий из алюминия</p>
				</div>
			</div>
			<div class="main_words_item">
				<div class="main_words_item_img">
					<img src="/images/main2018/ico3.png" alt=""/>
				</div>
				<div class="main_words_item_text">
					<p>Доставка за 2 дня <br/>Работаем по опту и рознице</p>
				</div>
			</div>
			<div class="main_words_item">
				<div class="main_words_item_img">
					<img src="/images/main2018/ico4.png" alt=""/>
				</div>
				<div class="main_words_item_text">
					<p>Собственный сервисный центр в <?= $currentSubdomen['name_dec'] ?> <br/>с качественным оборудованием</p>
				</div>
			</div>
			<div class="main_words_item">
				<div class="main_words_item_img">
					<img src="/images/main2018/ico5.png" alt=""/>
				</div>
				<div class="main_words_item_text">
					<p>Ежегодно выполняем более 500 гособоронзаказов</p>
				</div>
			</div>
		</div>
		<div class="main_text">
			<?= $currentPage['text_2'] ?>
		</div>
	</div>

	<div class="main_block">
		<h2>Как мы работаем</h2>
		<div class="main_work">
			<div class="main_work_item">
				<div class="main_work_item_img">
					<img src="/images/main2018/icow1.png" alt="">
				</div>
				<div class="main_work_item_text">
					<p>Получаем заказ, связываемся с вами для уточнения деталей</p>
				</div>
			</div>
			<div class="main_work_item">
				<div class="main_work_item_img">
					<img src="/images/main2018/icow2.png" alt="">
				</div>
				<div class="main_work_item_text">
					<p>Составляем предложение по поставке</p>
				</div>
			</div>
			<div class="main_work_item">
				<div class="main_work_item_img">
					<img src="/images/main2018/icow3.png" alt="">
				</div>
				<div class="main_work_item_text">
					<p>Формируем договор, счет, получаем от вас предоплату</p>
				</div>
			</div>
			<div class="main_work_item">
				<div class="main_work_item_img">
					<img src="/images/main2018/icow4.png" alt="">
				</div>
				<div class="main_work_item_text">
					<p>Изготавливаем продукт, доставляем на склад, получаем доплату по счету</p>
				</div>
			</div>
			<div class="main_work_item">
				<div class="main_work_item_img">
					<img src="/images/main2018/icow5.png" alt="">
				</div>
				<div class="main_work_item_text">
					<p>Отргужаем продукт согласно условиям, прописанным в договоре</p>
				</div>
			</div>
		</div>
	</div>

	<div class="main_callback">
		<p class="callback_title">Мы свяжемся с вами в удобное время!</p>
		<p>Гарантируем конфиденциальность предоставляемой информации</p>
		<div class="main_callback_button">Отправить заявку</div>
	</div>

	<div class="main_block">
		<div class="main_text">
			<?= $currentPage['text_3'] ?>
		</div>
	</div>

	<div class="main_contacts">
		<h2>Контакты</h2>
			<div class="main_contacts_wrap">
				<div class="main_contacts_text">
					<p class="main_contacts_address"><?= $currentBranch['addressLocality']?>,<br> <?= $currentBranch['postalCode']?>, <?= $currentBranch['streetAddress']?>.</p>
					<p class="main_contacts_phone"><?= $currentBranch['phone']?></p>
					<p class="main_contacts_mail"><a href="mailto:<?= $currentBranch['email']?>"><span itemprop="email"><?= $currentBranch['email']?></span></a></p>
					<p class="main_contacts_info"><a href="/kontact/">Подробная информация</a></p>
					<div class="main_contacts_callback">Обратная связь</div>
				</div>
				<?= $currentBranch['map']?>
			</div>
	</div>

</div>