<?php 
	echo $this->render('/components/headerAddStatic');
?>

<div class="main_wrap _main">
	<div class="content">
		<?= $this->render('/components/breadcrumbs', array(
      'breadcrumbs' => $breadcrumbs,
      ))
    ?>
		<h1>
      <?php 
        echo str_replace('**city_rod**', Yii::$app->params['subdomen_dec'], $currentPage['header']);
      ?>
    </h1>

    <div id="ajax_map_wrapper">

		  <div class="contact_info" itemscope="" itemtype="http://schema.org/Organization">
        <p itemprop="name"><?= $currentBranch['name']?></p>
        <p itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
		      Адрес: 
          <span itemprop="postalCode"><?= $currentBranch['postalCode']?></span>,
          <span itemprop="addressLocality"><?= $currentBranch['addressLocality']?></span>,
          <span itemprop="streetAddress"><?= $currentBranch['streetAddress']?></span>
		    </p>
		    <p>Телефон: <span itemprop="telephone" class="telephone"><?= $currentBranch['phone']?></span></p>
		    <p>
          <a href="mailto:<?= $currentBranch['email']?>">
            <span itemprop="email"><?= $currentBranch['email']?></span>
          </a>
        </p>
		    <p><span itemprop="employee">Генеральный директор: Шапошников Максим Юрьевич</span></p>
		    <p><a href="/delivery/">Условия доставки</a></p>
		  </div>

      <?= $currentBranch['map']?>

    </div>

    </br>
    </br>

    <div class="contants_main">
		    <p>Центральный отдел продаж Самарской алюминиевой компании</p>
		    <p>Адрес: Самара 443111, ул. Ново-Вокзальная, 146А</p>
		    <p>Телефон: <span  class="telephone">(846) 993-45-55</span> (многоканальный)</p>
		    <p>Эл. почта: <a href="mailto:sbyt@samalco.ru">sbyt@samalco.ru</a></p>
			<div class="contact-main-items">
			    <div class="contact-main-item">
			        <p>Генеральный директор</p>
			        <p>Шапошников Максим Юрьевич</p>
			        <p><a href="mailto:Shaposhnikov@samalco.ru">Shaposhnikov@samalco.ru</a></p>
			    </div>
			    <div class="contact-main-item">
			        <p>Секретариат</p>
			        <p><a href="mailto:Sekretar@samalco.ru">Sekretar@samalco.ru</a></p>
			    </div>
			    <div class="contact-main-item">
			        <p>Производственный отдел</p>
			        <p>(846) 993-42-53</p>
			        <p><a href="mailto:msc@samalco.ru">msc@samalco.ru</a></p>
			    </div>
			    <div class="contact-main-item">
			        <p>Конструкторское бюро</p>
			        <p>(846) 993-42-59</p>
			        <p><a href="mailto:kb@samalco.ru">kb@samalco.ru</a></p>
			    </div>
			    <div class="contact-main-item">
			        <p>Отдел МТО</p>
			        <p>(846) 993-42-58</p>
			        <p><a href="mailto:omts@samalco.ru">omts@samalco.ru</a></p>
			    </div>
			    <div class="contact-main-item">
			        <p>Бухгалтерия</p>
			        <p><span  class="telephone">(846) 993-45-55</span> доб. 217</p>
			        <p><a href="mailto:STret@samalco.ru">STret@samalco.ru</a></p>
			    </div>
			    <div class="contact-main-item">
			        <p>Отдел маркетинга</p>
			        <p>(846) 993-42-57</p>
			        <p><a href="mailto:market@samalco.ru">market@samalco.ru</a></p>
			    </div>
			    <div class="contact-main-item">
			        <p>Служба логистики</p>
			        <p>(846) 993-42-54</p>
			        <p><a href="mailto:logist@samalco.ru">logist@samalco.ru</a></p>
			    </div>
			    <div class="contact-main-item">
			        <p>Склад</p>
			        <p>(846) 993-42-56</p>
			        <p><a href="mailto:sklad@samalco.ru">sklad@samalco.ru</a></p>
			    </div>
			</div>
		</div>

    <?= $this->render('/components/orderForm') ?>
    <?= $currentPage['subdomenSeo']['text_1'] ?>

	</div>
</div>