<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\models\Subdomen;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<header class="header">

    <div class="header_wrap">

		<div class="header_logo">

			<a href="/" class="header_logo_img"></a>
			<p><?= Yii::$app->params['branch_full_name'] ?></p>

		</div>

		<div class="header_city">

			<p class="header_city_fil"><a href="/filialy/">Филиалы в 17-ти регионах</a></p>
            <div class="header_city_curr">

                <p><?= Yii::$app->params['subdomen_name'] ?></p>
                <div class="header_burger"><div></div><div></div><div></div></div>
                <!-- <script type="text/javascript" src="/assets/js/regions.js?v=3"></script> -->
                <div class="b-dropdown__list-wrap">
                    <ul class="b-dropdown__list">

                        <?php
                            foreach (Subdomen::find()->all() as $subdomen){
                                if ($subdomen->alias !== ''){
                                    echo '<li class="b-dropdown__item"><a class="b-dropdown__link " href="http://' . $subdomen->alias . '.dev.samalco.ru">' . $subdomen->name . '</a></li>';
                                } else {
                                    echo '<li class="b-dropdown__item"><a class="b-dropdown__link " href="http://dev.samalco.ru">' . $subdomen->name . '</a></li>';
                                }
                            }
                        ?>
                    </ul>
                </div>
            </div>
		</div>

		<div class="header_menu_wrap">

			<div class="header_menu">

				<a class="[!menuClass? &param = `katalog`!]" href="[!domainHref!]/katalog/">Каталог</a>

				<div class="main_menu_sub">
				    <a class="[!menuClass? &param = `alyuminievaya_shina`!]" href="[!domainHref!]/katalog/alyuminievaya_shina/">Шина</a>
		            <a class="[!menuClass? &param = `alyuminieviy_profnastil`!]" href="[!domainHref!]/katalog/alyuminieviy_profnastil/">Профнастил</a>
		            <a class="[!menuClass? &param = `alyuminievye_listy`!]" href="[!domainHref!]/katalog/alyuminievye_listy/">Листы</a>
		            <a class="[!menuClass? &param = `alyuminievye_prutki`!]" href="[!domainHref!]/katalog/alyuminievye_prutki/">Прутки</a>
		            <a class="[!menuClass? &param = `alyuminievye_lenty`!]" href="[!domainHref!]/katalog/alyuminievye_lenty/">Ленты</a>
		            <a class="[!menuClass? &param = `alyuminievye_plity`!]" href="[!domainHref!]/katalog/alyuminievye_plity/">Плиты</a>
		            <a class="[!menuClass? &param = `alyuminievye_truby`!]" href="[!domainHref!]/katalog/alyuminievye_truby/">Трубы</a>
		            <a class="[!menuClass? &param = `alyuminievye_profili`!]" href="[!domainHref!]/katalog/alyuminievye_profili/">Профили</a>
		            <a class="[!menuClass? &param = `alyuminievye_pokovki_i_shtampovki`!]" href="[!domainHref!]/katalog/alyuminievye_pokovki_i_shtampovki/">Штамповка</a>
		    	</div>

		      	<a class="[!menuClass? &param = `teh_doc`!]" href="[!domainHref!]/teh_doc/">Техническая документация</a>
		      	<a class="[!menuClass? &param = `delivery`!]" href="[!domainHref!]/delivery/">Доставка</a>
				<a class="[!menuClass? &param = `kontact`!]" href="[!domainHref!]/kontact/">Контакты</a>

			</div>

			<div class="header_burger">
				<div></div>
				<div></div>
				<div></div>
			</div>

			<div class="header_menu_add">

				<div class="header_phone">
					<a class="call_by_click" href="tel:<?= Yii::$app->params['branch_phone'] ?>"><?= Yii::$app->params['branch_phone'] ?></a>
				</div>

				<div class="header_email">
					<a href="mailto:[!regionMail!]"><?= Yii::$app->params['branch_email'] ?></a>
				</div>

				<div class="callback_button">
					Обратная связь
				</div>

			</div>

		</div>

		<div class="header_cart cart-total">
			<a href="/cart/">Корзина</a>
			[!cart_total!]
		</div>

	</div>

	<img class="arrow_scroll arrow_scroll_up" src="/assets/images/arrows/arrow_up.svg" alt="Наверх" title="Наверх" id="Go_Top">
	<img class="arrow_scroll arrow_scroll_down" src="/assets/images/arrows/arrow_down.svg" alt="Вниз" title="Вниз" id="Go_Down">

</header>


<div class="container">
    <?= $content ?>
</div>

<footer class="footer">

    <div class="footer_wrap">

        <div class="footer_left">

            <p>Copyrigth 2007-[!year!], Самарская алюминиевая компания</p>
            <a href="https://samalco.ru/agreement/">Политика конфиденциальности</a>

        </div>

        <div class="footer_middle">

            <p>
                Обращаем ваше внимание, что вся информация (включая цены) на этом интернет-сайте носит исключительно информационный характер, и ни при каких условиях не является публичной офертой, определяемой 						положениями Статьи 437 (2) Гражданского кодекса РФ.
            </p>

        </div>

        <div class="footer_right">

            <p>Продвигается «<a href="http://liderpoiska.ru/" target="_blank">Лидером Поиска</a>»</p>

        </div>

    </div>

</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
