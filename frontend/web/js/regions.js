$(document).ready(function() {
	console.log('hi from js');
	
	$('form input').on('keypress', function(e) {
		console.log('press');
    return e.which !== 13;
});
	if ($('span').is('#cart-count')) {
    	$('.cart-total a').attr('href','/cart/');
  	}

	// $('#customer').submit(function(e) {
	// 	yaCounter9939076.reachGoal('sendcart'); console.log('sendcart');
	// 	//ga('send', 'event', 'sendcart', 'click');
	// });

	// $('.calcform #btn').click(function() {
	// 	yaCounter9939076.reachGoal('massa'); console.log('massa');
	// 	//ga('send', 'event', 'massa', 'click');
	// 	gtag('event', 'massa', { 'event_category': 'massa', 'event_action': 'click', });
	// });

	// $('.section.lists a').click(function() {
	// 	yaCounter9939076.reachGoal('click_list'); console.log('click_list');
	// });

	// $('.section.plates a').click(function() {
	// 	yaCounter9939076.reachGoal('click_plity'); console.log('click_plity');
	// });

	// $('.section.tubing a').click(function() {
	// 	yaCounter9939076.reachGoal('click_truby'); console.log('click_truby');
	// });

	// $('.section.tapes a').click(function() {
	// 	yaCounter9939076.reachGoal('click_lenty'); console.log('click_lenty');
	// });

	// $('.section.rods a').click(function() {
	// 	yaCounter9939076.reachGoal('click_prutki'); console.log('click_prutki');
	// });

	$(".pod_zakaz_tbl .button").val("");

	$(".show_color_proflists").click(function() {
		$(".b-ral_with_name").slideToggle(300);
	});

	$("#more_link").click(function() {
		if ($(this).hasClass('__active')) {
			$(this).removeClass('__active');
			$('#more_text').hide();
		} else {
			$(this).addClass('__active');
			$('#more_text').show();
		}
	});

	$('.header_burger').on('click', function(){
		if($(this).parent().hasClass('header-nav')){
			$('.header-nav').toggleClass('_active');
		}
		if($(this).parent().hasClass('b-dropdown')){
			$('.b-dropdown').toggleClass('_active');
		}
		if($(this).parent().hasClass('header_menu_wrap')){
			$('.header_menu').toggleClass('_active');
		}
		if($(this).parent().hasClass('header_city_curr')){
			$('.header_city_curr').toggleClass('_active');
		}
	});

	$('.filter_select').on('click', function(){
		$(this).parent().toggleClass('_active');
	});

	$('.b-bropdown__current-val').on('click', function(){
		$(this).parent().toggleClass('_active');
	});

	$('.header_city_curr > p').on('click', function(){
		$(this).parent().toggleClass('_active');
	});

	$('.header_add_calc').on('click', function(){
		$(this).toggleClass('_active');
		$('.header_add_popup').toggleClass('_active');
	});

	$('body').on('click', '.main_callback_button, .callback_button, .main_contacts_callback', function(){
		$('.callback_popup').addClass('_active');
	});

	$('.callback_exit, .callback_layout').on('click', function(){
		$('.callback_popup').removeClass('_active');
	});

	$(window).scroll(function() {
        var offset_header = $('header').outerHeight();
        var top = $(this).scrollTop();
        if (top > offset_header) {
            $('.header_add').addClass('_fixed');
            $('header').addClass('_margin');
        } else {
            $('.header_add').removeClass('_fixed');
            $('header').removeClass('_margin');
        }
    });

	$(window).on("click", function(event){		
		if ($(".header_add_popup").has(event.target).length == 0 && !$(".header_add_popup").is(event.target) && $(".header_add_calc").has(event.target).length == 0 && !$(".header_add_calc").is(event.target)){
				$(".header_add_popup").removeClass('_active');
				$('.header_add_calc').removeClass('_active');
		}
	});

});

var Base64 = {

	// private property
	_keyStr : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",

	// public method for encoding
	encode : function (input) {
		var output = "";
		var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
		var i = 0;

		input = Base64._utf8_encode(input);

		while (i < input.length) {

			chr1 = input.charCodeAt(i++);
			chr2 = input.charCodeAt(i++);
			chr3 = input.charCodeAt(i++);

			enc1 = chr1 >> 2;
			enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
			enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
			enc4 = chr3 & 63;

			if (isNaN(chr2)) {
				enc3 = enc4 = 64;
			} else if (isNaN(chr3)) {
				enc4 = 64;
			}

			output = output +
			this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) +
			this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);

		}

		return output;
	},

	// public method for decoding
	decode : function (input) {
		var output = "";
		var chr1, chr2, chr3;
		var enc1, enc2, enc3, enc4;
		var i = 0;

		input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

		while (i < input.length) {

			enc1 = this._keyStr.indexOf(input.charAt(i++));
			enc2 = this._keyStr.indexOf(input.charAt(i++));
			enc3 = this._keyStr.indexOf(input.charAt(i++));
			enc4 = this._keyStr.indexOf(input.charAt(i++));

			chr1 = (enc1 << 2) | (enc2 >> 4);
			chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
			chr3 = ((enc3 & 3) << 6) | enc4;

			output = output + String.fromCharCode(chr1);

			if (enc3 != 64) {
				output = output + String.fromCharCode(chr2);
			}
			if (enc4 != 64) {
				output = output + String.fromCharCode(chr3);
			}

		}

		output = Base64._utf8_decode(output);

		return output;

	},

	// private method for UTF-8 encoding
	_utf8_encode : function (string) {
		string = string.replace(/\r\n/g,"\n");
		var utftext = "";

		for (var n = 0; n < string.length; n++) {

			var c = string.charCodeAt(n);

			if (c < 128) {
				utftext += String.fromCharCode(c);
			}
			else if((c > 127) && (c < 2048)) {
				utftext += String.fromCharCode((c >> 6) | 192);
				utftext += String.fromCharCode((c & 63) | 128);
			}
			else {
				utftext += String.fromCharCode((c >> 12) | 224);
				utftext += String.fromCharCode(((c >> 6) & 63) | 128);
				utftext += String.fromCharCode((c & 63) | 128);
			}

		}

		return utftext;
	},

	// private method for UTF-8 decoding
	_utf8_decode : function (utftext) {
		var string = "";
		var i = 0;
		var c = c1 = c2 = 0;

		while ( i < utftext.length ) {

			c = utftext.charCodeAt(i);

			if (c < 128) {
				string += String.fromCharCode(c);
				i++;
			}
			else if((c > 191) && (c < 224)) {
				c2 = utftext.charCodeAt(i+1);
				string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
				i += 2;
			}
			else {
				c2 = utftext.charCodeAt(i+1);
				c3 = utftext.charCodeAt(i+2);
				string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
				i += 3;
			}

		}

		return string;
	}
}

// http
// document.write(Base64.decode("PGRpdiBjbGFzcz0iYi1kcm9wZG93bl9fbGlzdC13cmFwIj4KPHVsIGNsYXNzPSJiLWRyb3Bkb3duX19saXN0Ij4KPGxpIGNsYXNzPSJiLWRyb3Bkb3duX19pdGVtIj48YSBjbGFzcz0iYi1kcm9wZG93bl9fbGluayAiIGhyZWY9Imh0dHA6Ly9zYW1hbGNvLnJ1IiBvbkNsaWNrPSJkZWxldGVDb29raWUoKTsiPtCc0L7RgdC60LLQsDwvYT48L2xpPgo8bGkgY2xhc3M9ImItZHJvcGRvd25fX2l0ZW0iPjxhIGNsYXNzPSJiLWRyb3Bkb3duX19saW5rICIgaHJlZj0iaHR0cDovL3NwYi5zYW1hbGNvLnJ1Ij7QodCw0L3QutGCLdCf0LXRgtC10YDQsdGD0YDQszwvYT48L2xpPgo8bGkgY2xhc3M9ImItZHJvcGRvd25fX2l0ZW0iPjxhIGNsYXNzPSJiLWRyb3Bkb3duX19saW5rICIgaHJlZj0iaHR0cDovL3NhbWFyYS5zYW1hbGNvLnJ1Ij7QodCw0LzQsNGA0LA8L2E+PC9saT4KPGxpIGNsYXNzPSJiLWRyb3Bkb3duX19pdGVtIj48YSBjbGFzcz0iYi1kcm9wZG93bl9fbGluayAiIGhyZWY9Imh0dHA6Ly9jaGVseWFiaW5zay5zYW1hbGNvLnJ1Ij7Qp9C10LvRj9Cx0LjQvdGB0Lo8L2E+PC9saT4KPGxpIGNsYXNzPSJiLWRyb3Bkb3duX19pdGVtIj48YSBjbGFzcz0iYi1kcm9wZG93bl9fbGluayAiIGhyZWY9Imh0dHA6Ly9wZXJtLnNhbWFsY28ucnUiPtCf0LXRgNC80Yw8L2E+PC9saT4KPGxpIGNsYXNzPSJiLWRyb3Bkb3duX19pdGVtIj48YSBjbGFzcz0iYi1kcm9wZG93bl9fbGluayAiIGhyZWY9Imh0dHA6Ly92b2xnb2dyYWQuc2FtYWxjby5ydSI+0JLQvtC70LPQvtCz0YDQsNC0PC9hPjwvbGk+CjxsaSBjbGFzcz0iYi1kcm9wZG93bl9faXRlbSI+PGEgY2xhc3M9ImItZHJvcGRvd25fX2xpbmsgIiBocmVmPSJodHRwOi8va2F6YW4uc2FtYWxjby5ydSI+0JrQsNC30LDQvdGMPC9hPjwvbGk+CjxsaSBjbGFzcz0iYi1kcm9wZG93bl9faXRlbSI+PGEgY2xhc3M9ImItZHJvcGRvd25fX2xpbmsgIiBocmVmPSJodHRwOi8vdHVsYS5zYW1hbGNvLnJ1Ij7QotGD0LvQsDwvYT48L2xpPgo8bGkgY2xhc3M9ImItZHJvcGRvd25fX2l0ZW0iPjxhIGNsYXNzPSJiLWRyb3Bkb3duX19saW5rICIgaHJlZj0iaHR0cDovL3VmYS5zYW1hbGNvLnJ1Ij7Qo9GE0LA8L2E+PC9saT4KPGxpIGNsYXNzPSJiLWRyb3Bkb3duX19pdGVtIj48YSBjbGFzcz0iYi1kcm9wZG93bl9fbGluayAiIGhyZWY9Imh0dHA6Ly9yb3N0b3Yuc2FtYWxjby5ydSI+0KDQvtGB0YLQvtCyLdCd0LAt0JTQvtC90YM8L2E+PC9saT4KPGxpIGNsYXNzPSJiLWRyb3Bkb3duX19pdGVtIj48YSBjbGFzcz0iYi1kcm9wZG93bl9fbGluayAiIGhyZWY9Imh0dHA6Ly9ubi5zYW1hbGNvLnJ1Ij7QndC40LbQvdC40Lkg0J3QvtCy0LPQvtGA0L7QtDwvYT48L2xpPgo8bGkgY2xhc3M9ImItZHJvcGRvd25fX2l0ZW0iPjxhIGNsYXNzPSJiLWRyb3Bkb3duX19saW5rICIgaHJlZj0iaHR0cDovL2VrYi5zYW1hbGNvLnJ1Ij7QldC60LDRgtC10YDQuNC90LHRg9GA0LM8L2E+PC9saT4KPGxpIGNsYXNzPSJiLWRyb3Bkb3duX19pdGVtIj48YSBjbGFzcz0iYi1kcm9wZG93bl9fbGluayAiIGhyZWY9Imh0dHA6Ly9uc2suc2FtYWxjby5ydSI+0J3QvtCy0L7RgdC40LHQuNGA0YHQujwvYT48L2xpPgo8bGkgY2xhc3M9ImItZHJvcGRvd25fX2l0ZW0iPjxhIGNsYXNzPSJiLWRyb3Bkb3duX19saW5rICIgaHJlZj0iaHR0cDovL29tc2suc2FtYWxjby5ydSI+0J7QvNGB0Lo8L2E+PC9saT4KPGxpIGNsYXNzPSJiLWRyb3Bkb3duX19pdGVtIj48YSBjbGFzcz0iYi1kcm9wZG93bl9fbGluayAiIGhyZWY9Imh0dHA6Ly90YW1ib3Yuc2FtYWxjby5ydSI+0KLQsNC80LHQvtCyPC9hPjwvbGk+CjxsaSBjbGFzcz0iYi1kcm9wZG93bl9faXRlbSI+PGEgY2xhc3M9ImItZHJvcGRvd25fX2xpbmsgIiBocmVmPSJodHRwOi8va2lyb3Yuc2FtYWxjby5ydSI+0JrQuNGA0L7QsjwvYT48L2xpPgo8bGkgY2xhc3M9ImItZHJvcGRvd25fX2l0ZW0iPjxhIGNsYXNzPSJiLWRyb3Bkb3duX19saW5rICIgaHJlZj0iaHR0cDovL3R2ZXIuc2FtYWxjby5ydSI+0KLQstC10YDRjDwvYT48L2xpPgo8L3VsPgo8L2Rpdj4="));

// https
document.write(Base64.decode("PGRpdiBjbGFzcz0iYi1kcm9wZG93bl9fbGlzdC13cmFwIj4KPHVsIGNsYXNzPSJiLWRyb3Bkb3duX19saXN0Ij4KPGxpIGNsYXNzPSJiLWRyb3Bkb3duX19pdGVtIj48YSBjbGFzcz0iYi1kcm9wZG93bl9fbGluayAiIGhyZWY9Imh0dHBzOi8vc2FtYWxjby5ydSIgb25DbGljaz0iZGVsZXRlQ29va2llKCk7Ij7QnNC+0YHQutCy0LA8L2E+PC9saT4KPGxpIGNsYXNzPSJiLWRyb3Bkb3duX19pdGVtIj48YSBjbGFzcz0iYi1kcm9wZG93bl9fbGluayAiIGhyZWY9Imh0dHBzOi8vc3BiLnNhbWFsY28ucnUiPtCh0LDQvdC60YIt0J/QtdGC0LXRgNCx0YPRgNCzPC9hPjwvbGk+CjxsaSBjbGFzcz0iYi1kcm9wZG93bl9faXRlbSI+PGEgY2xhc3M9ImItZHJvcGRvd25fX2xpbmsgIiBocmVmPSJodHRwczovL3NhbWFyYS5zYW1hbGNvLnJ1Ij7QodCw0LzQsNGA0LA8L2E+PC9saT4KPGxpIGNsYXNzPSJiLWRyb3Bkb3duX19pdGVtIj48YSBjbGFzcz0iYi1kcm9wZG93bl9fbGluayAiIGhyZWY9Imh0dHBzOi8vY2hlbHlhYmluc2suc2FtYWxjby5ydSI+0KfQtdC70Y/QsdC40L3RgdC6PC9hPjwvbGk+CjxsaSBjbGFzcz0iYi1kcm9wZG93bl9faXRlbSI+PGEgY2xhc3M9ImItZHJvcGRvd25fX2xpbmsgIiBocmVmPSJodHRwczovL3Blcm0uc2FtYWxjby5ydSI+0J/QtdGA0LzRjDwvYT48L2xpPgo8bGkgY2xhc3M9ImItZHJvcGRvd25fX2l0ZW0iPjxhIGNsYXNzPSJiLWRyb3Bkb3duX19saW5rICIgaHJlZj0iaHR0cHM6Ly92b2xnb2dyYWQuc2FtYWxjby5ydSI+0JLQvtC70LPQvtCz0YDQsNC0PC9hPjwvbGk+CjxsaSBjbGFzcz0iYi1kcm9wZG93bl9faXRlbSI+PGEgY2xhc3M9ImItZHJvcGRvd25fX2xpbmsgIiBocmVmPSJodHRwczovL2themFuLnNhbWFsY28ucnUiPtCa0LDQt9Cw0L3RjDwvYT48L2xpPgo8bGkgY2xhc3M9ImItZHJvcGRvd25fX2l0ZW0iPjxhIGNsYXNzPSJiLWRyb3Bkb3duX19saW5rICIgaHJlZj0iaHR0cHM6Ly90dWxhLnNhbWFsY28ucnUiPtCi0YPQu9CwPC9hPjwvbGk+CjxsaSBjbGFzcz0iYi1kcm9wZG93bl9faXRlbSI+PGEgY2xhc3M9ImItZHJvcGRvd25fX2xpbmsgIiBocmVmPSJodHRwczovL3VmYS5zYW1hbGNvLnJ1Ij7Qo9GE0LA8L2E+PC9saT4KPGxpIGNsYXNzPSJiLWRyb3Bkb3duX19pdGVtIj48YSBjbGFzcz0iYi1kcm9wZG93bl9fbGluayAiIGhyZWY9Imh0dHBzOi8vcm9zdG92LnNhbWFsY28ucnUiPtCg0L7RgdGC0L7Qsi3QndCwLdCU0L7QvdGDPC9hPjwvbGk+CjxsaSBjbGFzcz0iYi1kcm9wZG93bl9faXRlbSI+PGEgY2xhc3M9ImItZHJvcGRvd25fX2xpbmsgIiBocmVmPSJodHRwczovL25uLnNhbWFsY28ucnUiPtCd0LjQttC90LjQuSDQndC+0LLQs9C+0YDQvtC0PC9hPjwvbGk+CjxsaSBjbGFzcz0iYi1kcm9wZG93bl9faXRlbSI+PGEgY2xhc3M9ImItZHJvcGRvd25fX2xpbmsgIiBocmVmPSJodHRwczovL2VrYi5zYW1hbGNvLnJ1Ij7QldC60LDRgtC10YDQuNC90LHRg9GA0LM8L2E+PC9saT4KPGxpIGNsYXNzPSJiLWRyb3Bkb3duX19pdGVtIj48YSBjbGFzcz0iYi1kcm9wZG93bl9fbGluayAiIGhyZWY9Imh0dHBzOi8vbnNrLnNhbWFsY28ucnUiPtCd0L7QstC+0YHQuNCx0LjRgNGB0Lo8L2E+PC9saT4KPGxpIGNsYXNzPSJiLWRyb3Bkb3duX19pdGVtIj48YSBjbGFzcz0iYi1kcm9wZG93bl9fbGluayAiIGhyZWY9Imh0dHBzOi8vb21zay5zYW1hbGNvLnJ1Ij7QntC80YHQujwvYT48L2xpPgo8bGkgY2xhc3M9ImItZHJvcGRvd25fX2l0ZW0iPjxhIGNsYXNzPSJiLWRyb3Bkb3duX19saW5rICIgaHJlZj0iaHR0cHM6Ly90YW1ib3Yuc2FtYWxjby5ydSI+0KLQsNC80LHQvtCyPC9hPjwvbGk+CjxsaSBjbGFzcz0iYi1kcm9wZG93bl9faXRlbSI+PGEgY2xhc3M9ImItZHJvcGRvd25fX2xpbmsgIiBocmVmPSJodHRwczovL2tpcm92LnNhbWFsY28ucnUiPtCa0LjRgNC+0LI8L2E+PC9saT4KPGxpIGNsYXNzPSJiLWRyb3Bkb3duX19pdGVtIj48YSBjbGFzcz0iYi1kcm9wZG93bl9fbGluayAiIGhyZWY9Imh0dHBzOi8vdHZlci5zYW1hbGNvLnJ1Ij7QotCy0LXRgNGMPC9hPjwvbGk+CjwvdWw+CjwvZGl2Pg=="));