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
    <link type="text/css" rel="stylesheet" href="/css/styles2018.css"/>
    <link rel="stylesheet" type="text/css" media="only screen and (min-width: 768px) and (max-width: 1360px) " href="/css/styles2018Pad.css?v=1">
	<link rel="stylesheet" type="text/css" media="only screen and (min-width: 320px) and (max-width: 767px) " href="/css/styles2018Mobile.css?v=1">
	<link rel="stylesheet" type="text/css" href="/css/stylesMobile.css?v=1">
    <?= Html::csrfMetaTags() ?>
    <title><?php echo $this->title ?></title>
    <?php if (isset($this->params['desc']) and !empty($this->params['desc'])) echo "<meta name='description' content='".$this->params['desc']."'>";?>
    <?php if (isset($this->params['kw']) and !empty($this->params['kw'])) echo "<meta name='keywords' content='".$this->params['kw']."'>";?>
    <?php if (isset($this->params['robots']) and $this->params['robots']) echo "<meta name='robots' content='noindex, nofollow'>";?>

    <?php $this->head() ?>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
</head>
<body>
<?php $this->beginBody() ?>
<header>
<div class="_hidden" data-session-id="<?= Yii::$app->session->id ?>"></div>

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
                <script type="text/javascript" src="/js/regions.js?v=3"></script>
                <div class="b-dropdown__list-wrap">
                    <ul class="b-dropdown__list">

                        <?php
                            foreach (Subdomen::find()->orderBy(['sort_index' => SORT_ASC])->all() as $subdomen){
                                if ($subdomen->alias !== ''){
                                    echo '<li class="b-dropdown__item"><a class="b-dropdown__link " href="https://' . $subdomen->alias . '.samalco.ru">' . $subdomen->name . '</a></li>';
                                } else {
                                    echo '<li class="b-dropdown__item"><a class="b-dropdown__link " href="https://samalco.ru">' . $subdomen->name . '</a></li>';
                                }
                            }
                        ?>
                    </ul>
                </div>
            </div>
		</div>

		<div class="header_menu_wrap">

			<div class="header_menu">

				<a class="<?= stristr(Yii::$app->request->url, 'katalog') ? 'active' : 'noactive' ?>" href="/katalog/">Каталог</a>

				<div class="main_menu_sub">
                    <a class="<?= stristr(Yii::$app->request->url, 'alyuminievye_profili') ? 'active' : 'noactive' ?>" href="/katalog/alyuminievye_profili/">Профили</a>
                    <a class="<?= stristr(Yii::$app->request->url, 'alyuminievye_listy') ? 'active' : 'noactive' ?>" href="/katalog/alyuminievye_listy/">Листы</a>
                    <a class="<?= stristr(Yii::$app->request->url, 'alyuminievye_truby') ? 'active' : 'noactive' ?>" href="/katalog/alyuminievye_truby/">Трубы</a>
                    <a class="<?= stristr(Yii::$app->request->url, 'alyuminievye_plity') ? 'active' : 'noactive' ?>" href="/katalog/alyuminievye_plity/">Плиты</a>
                    <a class="<?= stristr(Yii::$app->request->url, 'alyuminievye_prutki') ? 'active' : 'noactive' ?>" href="/katalog/alyuminievye_prutki/">Прутки</a>
                    <a class="<?= stristr(Yii::$app->request->url, 'alyuminievye_lenty') ? 'active' : 'noactive' ?>" href="/katalog/alyuminievye_lenty/">Ленты</a>
				    <a class="<?= stristr(Yii::$app->request->url, 'alyuminievaya_shina') ? 'active' : 'noactive' ?>" href="/katalog/alyuminievaya_shina/">Шина</a>
                    <a class="<?= stristr(Yii::$app->request->url, 'alyuminieviy_profnastil') ? 'active' : 'noactive' ?>" href="/katalog/alyuminieviy_profnastil/">Профнастил</a>
                    <a class="<?= stristr(Yii::$app->request->url, 'alyuminievye_pokovki_i_shtampovki') ? 'active' : 'noactive' ?>" href="/katalog/alyuminievye_pokovki_i_shtampovki/">Штамповка</a>
				</div>

					<a class="<?= stristr(Yii::$app->request->url, 'teh_doc') ? 'active' : 'noactive' ?>" href="https://samalco.ru/teh_doc/">Техническая документация</a>
					<a class="<?= stristr(Yii::$app->request->url, 'delivery') ? 'active' : 'noactive' ?>" href="/delivery/">Доставка</a>
					<a class="<?= stristr(Yii::$app->request->url, 'kontact') ? 'active' : 'noactive' ?>" href="/kontact/">Контакты</a>

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

			<?php include '../views/components/cart_total.php' ?>

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
		<form class="callback_form" action="/form/index/">
			<div class="form-row">
                <div class="form-group">
                    <label for="name_true">Ваше имя *</label>
                    <input type="text" class="form-control" name="name_true" autocomplete="off" data-required="">
                    <input type="text" name="name" class="xxx_">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="phone">Номер телефона *</label>
                    <input type="text" class="form-control" name="phone" autocomplete="off" data-required="" data-error="Пожалуйста, введите Ваш телефон">
                </div>
                <div class="form-group">
                    <label for="email">Электронная почта *</label>
                    <input type="text" class="form-control" name="email" autocomplete="off" data-required="" data-error="Пожалуйста, введите Ваш email">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="org_name">Название организации с формой собственности</label>
                    <input type="text" class="form-control org-name" name="org_name" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="org_address">Адрес организации</label>
                    <input type="text" class="form-control org-address" name="org_address" autocomplete="off">
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

        <div class="form-wait-until-send _hidden" data-wait-until-send></div>
	</div>
</div>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter9939076 = new Ya.Metrika({
                    id:9939076,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true,
                    params:window.yaParams
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>

<noscript><div><img src="https://mc.yandex.ru/watch/9939076" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<script type="module" src="/js/app.js"></script>
<script type="module" src="/js/jquery.inputmask.bundle.js"></script>
<script src="/js/form.js"></script>
<!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->

<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
</script>

<!-- <div class="g-recaptcha"></div> -->

<script>
    var onloadCallback = function() {
        //remove old
        $('.g-recaptcha').html('');

        $('.g-recaptcha').each(function (i, captcha) {
            grecaptcha.render(captcha, {
                'sitekey' : '6LdAz-AUAAAAAPfqsfvShXH_tq5ZGKDjcj44YtCk'
            });
        });
    };
</script>

<script>
    $('[data-header-phone-mobile]').on('click', function(){
        yaCounter9939076.reachGoal('call_header');
    });
    $('#Go_Top').on('click', function(){
        yaCounter9939076.reachGoal('scroll_up');
    });
    $('#Go_Down').on('click', function(){
        yaCounter9939076.reachGoal('scroll_down');
    });
</script>

<link rel="stylesheet" href="https://cdn.envybox.io/widget/cbk.css">
<script type="text/javascript" src="https://cdn.envybox.io/widget/cbk.js?wcb_code=3a85fd2d2b8c1c5dc2f511c8bb1b8f2e" charset="UTF-8" async></script>

<?php
    if(preg_match('/samara/',$_SERVER['HTTP_HOST'])) echo '<script src="//cdn.callibri.ru/callibri.js" type="text/javascript" charset="utf-8"></script>';
?>

<?php include 'stock_banner.php' ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
