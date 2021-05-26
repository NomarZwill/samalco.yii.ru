<?php 
?>

<style>
	body {
		position: relative;
	}

	.stock_banner * {
		box-sizing: border-box;
		position: relative;
		color: #fff;
		cursor: pointer;
	}

	.stock_banner {
		width: 375px;
		height: 105px;
		background-color: rgba(226,51,0,0.9);
		border-radius: 8px;
		margin-left: 35px;
		margin-bottom: 22px;
		box-shadow: 1px 1px 3px 2px rgba(0,0,0,0.1);
		position: fixed;
		bottom: 10px;
		left: -100%;
		z-index: 999999;
		animation-name: banner_appear;
		animation-timing-function: ease-out;
		animation-delay: 1.5s;
		animation-duration: 2s;
		transition: 0.25s;
		animation-fill-mode: forwards;
	}

	.stock_banner:hover {
		transform: scale(1.03);
		transition: 0.25s;
	}

	@keyframes banner_appear {
		0% {
			left: -100%;
		}
		80% {
			left: -100%;
		}
		100% {
			left: 10px;
		}
	}

	.stock_banner_inner {
		display: flex;
		justify-content: space-between;
		width: 100%;
		height: 100%;
	}

	.stock_banner_img {
		display: block;
		transition: 0.25s;
	}

	.stock_banner_img:hover {
		opacity: 0.85;
		transition: 0.25s;
	}

	.stock_banner_img img {
		display: block;
		top: 50%;
    	left: 40%;
    	transform: translate(-50%, -50%);
    	width: 135px;
    	height: auto;
	}

	.stock_banner_content {
		display: flex;
		flex-direction: column;
		justify-content: center;
	}

	.stock_banner_title {
		font-size: 17px;
		margin-bottom: 5px;
	}

	.stock_banner_description {
		font-size: 15px;
		margin-bottom: 10px;
	}

	.stock_banner_description_addit {
		font-size: 13px;
	}

	.stock_banner_close {
		position: absolute;
		right: 10px;
		top: 10px;
		width: 22px;
		height: 22px;
		cursor: pointer;
		transition: 0.25s;
	}

	.stock_banner_close:before, .stock_banner_close:after {
		content: '';
		position: absolute;
		left: 0;
		top: 50%;
		background-color: #fff;
		width: 100%;
		height: 2px;
		box-shadow: 1px 1px 3px 2px rgba(0,0,0,0.1);
		transition: 0.25s;
	}

	.stock_banner_close:before {
		transform: translateY(-50%) rotate(-45deg);
	}

	.stock_banner_close:after {
		transform: translateY(-50%) rotate(45deg);
	}

	.stock_banner_close:hover:before, .stock_banner_close:hover:after {
		transition: 0.25s;
		box-shadow: 1px 1px 1px 1px rgba(0,0,0,0.1);
	}

	.stock_banner_close:hover {
		transform: translate(1px, 1px);
	}

	@media screen and (max-width: 480px) {
		.stock_banner {
			width: 100%;
			margin: 0;
			bottom: 0;
			left: 0;
		}

		.stock_banner_img {
			padding: 3px;
		}

		.stock_banner_img img {
			height: 100%;
			width: auto;
			top: unset;
			left: unset;
			transform: unset;
		}

		.arrow_scroll {
			display: none !important;
		}
	}

</style>

<div class="stock_banner">
	<div class="stock_banner_inner">
		<a class="stock_banner_img" href="/katalog/alyuminievye_prutki/">
			<img src="/images/stock_banner.png" alt="Прутки">
		</a>
		<div class="stock_banner_content">
			<div class="stock_banner_title">Ликвидация остатков!</div>
			<div class="stock_banner_description">Скидка&nbsp;30% на пруток&nbsp;1980Т1, диаметр&nbsp;35мм, ОСТ&nbsp;1&nbsp;92058-90</div>
			<div class="stock_banner_description_addit">Подробнее по телефону. Звоните!</div>
		</div>
		<div class="stock_banner_close"></div>
	</div>
</div>

<script>
	$('.stock_banner_close').click(function() {
		$(this).closest('.stock_banner').fadeOut('fast');
		sessionStorage.setItem('stock_banner', 'false');
	});

	$('body').on('click', '.stock_banner', function(event) {
		if(!$(event.target).hasClass('stock_banner_close')){
			window.location.href = '/katalog/alyuminievye_prutki/';
			sessionStorage.setItem('stock_banner', 'false');
		}
	});

	let stock_banner = sessionStorage.getItem('stock_banner');
	popup_stock = $('.stock_banner');
	if(stock_banner != 'false'){
		setTimeout(function(){
	  		popup_stock.css('display', 'block');
		},0);
	} else {
		popup_stock.css('display', 'none');
	}
	/*  Set/Get cookie END */
</script>