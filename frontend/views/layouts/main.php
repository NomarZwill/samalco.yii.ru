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
    <link type="text/css" rel="stylesheet" href="/css/style6.css?v=4">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
		<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<header>

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

				<a class="" href="/katalog/">Каталог</a>

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

					<a class="" href="/teh_doc/">Техническая документация</a>
					<a class="" href="/delivery/">Доставка</a>
					<a class="" href="/kontact/">Контакты</a>

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
			<!-- [!cart_total!] -->
		</div>

	</div>

	<img class="arrow_scroll arrow_scroll_up" src="/images/arrows/arrow_up.svg" alt="Наверх" title="Наверх" id="Go_Top">
	<img class="arrow_scroll arrow_scroll_down" src="/images/arrows/arrow_down.svg" alt="Вниз" title="Вниз" id="Go_Down">

</header>


<!-- <div class="container"> -->
    <?= $content ?>
<!-- </div> -->

<footer>

    <div class="footer_wrap">

        <div class="footer_left">

            <p>Copyrigth 2007-<?php echo date('Y') ?>, Самарская алюминиевая компания</p>
            <a href="/agreement/">Политика конфиденциальности</a>

        </div>

        <div class="footer_middle">

            <p>
                Обращаем ваше внимание, что вся информация (включая цены) на этом интернет-сайте носит исключительно информационный характер, и ни при каких условиях не является публичной офертой, определяемой 						положениями Статьи 437 (2) Гражданского кодекса РФ.
            </p>

        </div>

        <div class="footer_right">

            <p>Продвигается «<a href="https://liderpoiska.ru/" target="_blank">Лидером Поиска</a>»</p>

        </div>

    </div>

</footer>

<div class="callback_popup order-form-ext" data-context="popup">
	<div class="callback_layout"></div>
	<div class="callback_popup_wrap">
		<div class="callback_exit"></div>
		<h2>Оставьте заявку</h2>
		<form class="callback_form" action="/assets/snippets/mailer.php">
			<div class="form-row">
                <div class="form-group">
                    <label for="name_true">Ваше имя</label>
                    <input type="text" class="form-control" name="name_true" autocomplete="off" data-required="">
                    <input type="text" name="name" class="xxx_">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="phone">Номер телефона</label>
                    <input type="text" class="form-control" name="phone" autocomplete="off" data-required="" data-error="Пожалуйста, введите Ваш телефон">
                </div>
                <div class="form-group">
                    <label for="email">Электронная почта</label>
                    <input type="text" class="form-control" name="email" autocomplete="off" data-required="" data-error="Пожалуйста, введите Ваш email">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="org_name">Название организации с формой собственности</label>
                    <input type="text" class="form-control org-name" name="org_name" autocomplete="off" data-required="">
                </div>
                <div class="form-group">
                    <label for="org_address">Адрес организации</label>
                    <input type="text" class="form-control org-address" name="org_address" autocomplete="off" data-required="">
                </div>
            </div>
			<div class="form-row">
                <div class="form-group form-group-fw">
                    <label for="comment">Комментарий</label>
                    <textarea class="form-control" name="comment" placeholder="Оставьте Ваш вопрос или комментарий"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Отправить заявку</button>
                </div>
                <div class="form-group">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="terms" checked="" data-required="">
                            Я согласен на обработку <a href="https://samalco.ru/agreement/">моих персональных данных</a>
                    </label>
                </div>
            </div>
			<div class="g-recaptcha" data-sitekey="6LdAz-AUAAAAAPfqsfvShXH_tq5ZGKDjcj44YtCk"><div style="width: 304px; height: 78px;"><div><iframe src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LdAz-AUAAAAAPfqsfvShXH_tq5ZGKDjcj44YtCk&amp;co=aHR0cHM6Ly9zYW1hcmEuc2FtYWxjby5ydTo0NDM.&amp;hl=en-GB&amp;v=5mNs27FP3uLBP3KBPib88r1g&amp;size=normal&amp;cb=1uxqu5l6swa5" width="304" height="78" role="presentation" name="a-74yn1iojvxg7" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea></div><iframe style="display: none;"></iframe></div>
            <div class="text-danger" id="recaptchaError"></div>
		</form>
		<div class="form-overlay_popup">
			<div class="form-overlay-body">
				<p><span id="overlay-name_popup">Username</span>, спасибо за заявку!</p>
				<p>Наш менеджер свяжется с Вами в течение часа.</p>
				<a class="close" id="hide-overlay_popup">Понял, спасибо</a>
			</div>
			<div class="form-overlay-close_popup"></div>
			<div class="form-overlay-bg"></div>
		</div>
	</div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
