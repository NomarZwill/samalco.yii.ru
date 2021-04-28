/*
* https://github.com/barsukidze/knowledge/tree/master/frontend/js/form
*
* Универсальный обработчик форм. 
* Поддерживает классы Bootstrap.
* 
* Аттрибуты формы:
* data-context - Задает контекст формы (callback, order etc)
* data-targer-action - Задает цель в Яндекс Метрике и Action в Google Analytics
* data-target-category - Задает Category в Google Analytics
* 
* Аттрибуты полей формы:
* data-required - Делает поле обязательным
* data-error - Сообщение для вывода ошибки, если поле содержит data-required и не соответствует установленным правилам валидации.
* 
*/

var formSender = {
    to: '/form/index',
    $form : {},
    init : function() {
        $('form').each(function() {

            var $form = $(this);

            $form.find('[data-required]').each(function() {
                $(this).on('keyup', function(e) {
                    if (e.keyCode == 9) { return };
                    formSender.checkField($(this));
                });
            });
            $form.on('submit', function(event) {
                if ($(this).hasClass('product-form')) {
                    console.log('Cancel submit :('); return;
                }

                //$form.find('button').addClass('disabled').attr('disabled','disabled');;

                console.log('Try form submit..');
                formSender.sendIfValid($form, event);
            });
            $form.on('click', 'button.disabled', function(e) {
                e.preventDefault();
                return false;
            })
        });
    },
    checkFields : function($form) {

        var valid = true;

        $form.find('[data-required]').each(function() {

            if (!$(this).hasClass('is-valid')) {
                valid = false;
            }

            formSender.checkField($(this));
        });

        if (!valid) {
            $form.find('.is-invalid')[0].focus();
        }

        return valid;
    },
    checkField : function($field) {

        valid = true;
        var name = $field.attr('name');

        pattern_email = /^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i;
        
        if ($field.val() == '') {

            valid = false;

        } else {

            if (name=='phone' && $field.val().indexOf('_') >= 0) {
                valid = false;
                var $custom_error = 'Неверный формат телефона';
            }

            if (name=='email' && !(pattern_email.test($field.val()))) {
                valid = false;
                var $custom_error = 'Неверный формат электронной почты';
            }

        }

        if (name=='terms' && !$field[0].checked) {
            valid = false;
            var $custom_error = 'Ознакомьтесь с правилами и согласитесь с ними';
        }

        if (valid) {

            $field.removeClass('is-invalid').addClass('is-valid');

            if ($field.parent().find('.invalid-feedback').length > 0) {
                $field.parent().find('.invalid-feedback').remove();
            }

            if ($field.parent().parent().find('.invalid-feedback').length > 0) {
                $field.parent().parent().find('.invalid-feedback').remove();
            }

        } else {

            $field.addClass('is-invalid');

            var $form_error = $field.data('error') || 'Заполните поле';
            var $error_message = $custom_error || $form_error;

            if ($field.parent().find('.invalid-feedback').length  == 0) {
                $field.parent('.form-group').append('<div class="invalid-feedback">' + $error_message + '</div>');
            } else {
                $field.next('.invalid-feedback').html($error_message);
            }

            if ($field.parent().parent().find('.invalid-feedback').length  == 0) {
                $field.parent().parent('.form-group').append('<div class="invalid-feedback">' + $error_message + '</div>');
            } else {
                $field.parent().next('.invalid-feedback').html($error_message);
            }


        }

    },
    sendIfValid : function($form, e) {
        console.log('hi from row form');
        
        e.preventDefault();
        console.log($form[0]);
        var formData = new FormData($form[0]);
        // var formData = $($form[0]).toArray();

        console.log(formData.get('total_price[]'));
    
        $form.find('[data-required]').each(function() {
            formSender.checkField($(this));
        });

        var context = $form.closest('[data-context]').data('context');
        var target_action = $form.closest('[data-target-action]').data('target-action');
        var target_action_category = $form.closest('[data-target-category]').data('target-category');
        var session = $form.find('[name="session"]').val();

        formData.append('context', context);
        formData.append('session', session);
        formData.append('source', document.location.href);

        if (formSender.checkFields($form, true) && $form.find('[name="terms"]')[0].checked) {
            var to = typeof $form.attr('action') !== 'undefined' ? $form.attr('action') : formSender.to;
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]);
             }
            console.log('Try send...');
            if (context == 'cart') {
                var cart_text = '';
                $('.cart-wrapper').each(function(){
                    cart_text += $(this).find('h3').text() + '<br/>';
                    cart_text += $(this).find('.alloy_name').text() + '<br/>';
                    cart_text += $(this).find('.dimensions').text() + '<br/>';
					cart_text += 'Вес: ' + $(this).find('.quantity_count').attr('value') + ' кг.<br/><br/>';
                });
                formData.append('cart_text', cart_text);
                console.log(cart_text);
            }

            var captcha = grecaptcha.getResponse();

            if (!captcha.length) {
              // Выводим сообщение об ошибке
              $('#recaptchaError').text('* Вы не прошли проверку "Я не робот"');
            } else {
              // получаем элемент, содержащий капчу
              $('#recaptchaError').text('');
            }

            if($form.find('.xxx_').val() == '' && (captcha.length)) {       // проверка на бота
                console.log(formData);
                formData.append('g-recaptcha-response', captcha);
                $.ajax({
                    beforeSend: function() {
                        $form.find('button').addClass('disabled').attr('disabled','disabled');
                    },
                    type: "POST",
                    url: to,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log('Success...');
                        // console.log(response);
                        console.log(document.location.href);

                        $form.find('button').removeClass('disabled').removeAttr('disabled');
                        
                        if(response != 'stopwords'){

                            if(context == 'popup'){
                                $('#overlay-name_popup').html(formData.get('name_true'));
                                $('.form-overlay_popup').fadeIn(300);
                                // gtag('event', 'callback_button', { 'event_category': 'callback_button', 'event_action': 'click', });
                                // yaCounter9939076.reachGoal('main_send');        //CALLBACK_FORM_REQUEST
                            }

                            if (context == 'default') {
                                $('#overlay-name').html(formData.get('name_true'));
                                $('.form-overlay').fadeIn(300);
                            }

                            if (context == 'cart') {
                                $('.cart-total .cart-count').remove();
                                $('.order-form-ext').html('<p>Ваша корзина пуста.</p>');
                                $('#overlay-name').html(formData.get('name_true'));
                                $('.form-overlay').fadeIn(300);
                                // gtag('event', 'sendcart', { 'event_category': 'sendcart', 'event_action': 'click', });
                                // yaCounter9939076.reachGoal('sendcart');
                            }

                            if (context == 'ext') {
                                $('#overlay-name').html(formData.get('name_true'));
                                $('.form-overlay').fadeIn(300);
                                // yaCounter9939076.reachGoal('send_request');
                            }
                        }

                        // Сброс состояний и очистка формы
                        $form.find('[data-required]').each(function() {
                            $(this).removeClass('is-valid');
                        });
                        $form[0].reset();
                        // grecaptcha.reset();
                        // Отправка целей
                        // if (target_action) {
                        //     yandexTarget(target_action);
                        //     if (target_action_category) {
                        //         gaTarget(target_action_category, target_action);
                        //     }
                        // }
                    }, 
                    error: function(response) {
                        grecaptcha.reset();
                        console.log('Error!!!');
                        console.log(response);
                    }
                });
            }
        }
    }
};

// Отправка цели Яндекс
// var yandexTarget = function(yaTargetName) {
    
//     // Находим все счетчики Яндекс Метрики
//     if (typeof yandexCounters === 'undefined') {
//         yandexCounters = [];
//     }

//     if (yandexCounters.length == 0) {
//         yandexCounters = Object.keys(window).filter(function(el) {
//             return /^yaCounter.*?/i.test(el);
//         });
//     }

//     // Если на странице есть счетчики, берем первый и отправляем в него цель
//     if (yandexCounters.length > 0) {
//         window[yandexCounters[0]]['reachGoal'](yaTargetName);
//     }
// };

// Отправка цели Google Analytics
// var gaTarget = function(gaCategory, gaAction) {
//     if (typeof ga !== 'undefined') {
//         ga('send', 'event', gaCategory, gaAction);
//     }
// };

$(document).ready(function() {
    
    formSender.init();

    if ($.fn.inputmask) {
        $('[name=phone]').inputmask('9 999 999-99-99');
    } else {
        console.log('jquery.inputmask.js required to mask fields!')
    }

    $('#hide-overlay, .form-overlay-close').click(function() {
        $(this).closest('.form-overlay').fadeOut(300);
    });

    $('#hide-overlay_popup, .form-overlay-close_popup').click(function() {
        $(this).closest('.form-overlay_popup').fadeOut(300);
    });

    $('body').on('click', '.attache .delete', function() {
        console.log('delete file');
        $(this).parent('.attache').find('.file_upload').find('.added-files').html('прикрепить').next().val('');
        $(this).parent('.attache').remove();
    });

    $('body').on('change', '.attache input', function() {
        var files = this.files;

        if (files.length > 0) {
            $(this).parent().find('.added-files').html('');

            //$('#file_upload-name').html('');
            for (var i = 0; i < files.length; i++) {
                console.log('file add');
                $(this).parent().find('.added-files').append('<span class="file-name">'+files[i].name+'</span>');
                $(this).parent().parent().append('<span class="delete tet"></span>');
            }
        
            $(this).parent().parent().parent().append('<div class="attache"><label class="file_upload"><span class="added-files" id="file_upload-name">прикрепить</span><input type="file" name="docs[]" accept="image/png, image/jpeg" /></label></div>');


        } else {
            $(this).parent().find('.added-files').html('прикрепить');
        }

    });

    $('.select_form').click(function() {
        $('.select_uploader').removeClass('__active');
        $(this).addClass('__active');
        $('.for-select_form').show();
        $('.for-select_uploader').hide();
    });

    $('.select_uploader').click(function() {
        $('.select_form').removeClass('__active');
        $(this).addClass('__active');
        $('.for-select_form').hide();
        $('.for-select_uploader').show();
    });

    $('body').on('click', '.report_404', function(event) {
        event.preventDefault();
        var $url = window.location.href;
        /* Act on the event */
        $.ajax({
            beforeSend: function() {
                $('.report_404').html('<div id="fountainG">' +
                                                '<div id="fountainG_1" class="fountainG"></div>' +
                                                '<div id="fountainG_2" class="fountainG"></div>' +
                                                '<div id="fountainG_3" class="fountainG"></div>' +
                                                '<div id="fountainG_4" class="fountainG"></div>' +
                                                '<div id="fountainG_5" class="fountainG"></div>' +
                                                '<div id="fountainG_6" class="fountainG"></div>' +
                                                '<div id="fountainG_7" class="fountainG"></div>' +
                                                '<div id="fountainG_8" class="fountainG"></div>' +
                                            '</div>');
            },
            type: "POST",
            url: '/js/send_report_404.php',
            data: {url: $url},
            success: function(response) {
                // alert('success!');
                $('.report_404').replaceWith('<div class="report_404 response_404">Благодарим за сообщение!</div>');
            }, 
            error: function(response) {
                console.log('Error!!!');
                console.log(response);
            }
        });
    });

    $('body').on('click', '.call_by_click', function(event) {
        if($(window).width() < 450) {
            // yaCounter9939076.reachGoal('call_header');
            console.log('Отправка цели call_header с мобильного');
        }
    });


	// Кнопка вверх с плавным появлением и плавной прокруткой странички
	$.fn.scrollToTop = function() {
		$(this).hide();
		if ($(window).scrollTop() >= 350){ $(this).fadeIn("fast"); }
		var scrollDiv = $(this);
		$(window).scroll(function() {
			if ($(window).scrollTop() < 350){ $(scrollDiv).fadeOut("fast"); } else{ $(scrollDiv).fadeIn("fast"); }
		});
		$(this).click(function() {
			// yaCounter9939076.reachGoal('scroll_up');
		 	$("html, body").animate({scrollTop: 0}, "fast");
		})
	}

	$.fn.scrollToDown = function() {
		$(this).hide();
		if ($(window).scrollTop() < $(document).height()){ $(this).fadeIn("fast"); }
		var scrollDiv = $(this);
		$(window).scroll(function() {
			if ($(window).scrollTop()+$(window).height()+50 >= $(document).height()){ $(scrollDiv).fadeOut("fast"); } else{ $(scrollDiv).fadeIn("fast"); }
		});
		$(this).click(function() {
			// yaCounter9939076.reachGoal('scroll_down');
			$("html, body").animate({scrollTop: $(document).height()}, "fast");
		})
	}

	$(function() {
		$("#Go_Top").scrollToTop();
		$("#Go_Down").scrollToDown();
	});


    // Попап калькулятор по нажатию на кнопку
    $('body').on('click', '.btn_popup_weight', function(event) {
        var width = $(window).width();

        if(width >= 768 && width <= 1360) {
            if(!$('.calc_popup_overlay').length) {
                $('body').append('<div class="callback_layout calc_popup_overlay"></div>');
            }

            if(!$('.calcform .callback_exit').length) {
                $('.sidebar .calcform').append('<div class="callback_exit"></div>');
            }

            $('.sidebar .calcform').css({
                'position': 'fixed',
                'top': '50%',
                'left': '50%',
                'transform': 'translate(-50%, -50%)',
                'z-index': '100',
                'box-shadow': '0 1px 10px 3px rgba(0,0,0,0.3)'
            });

            $('.sidebar').css({
                'display': 'block',
                'width': '0',
                'margin': '0',
                'padding': '0'
            });

            $('.sidebar > *:not(.sidebar .calcform)').css({
                'display': 'none'
            });
        }
    });

    $('body').on('click', '.callback_layout.calc_popup_overlay', function() {
        closeCalcPopup();
    });

    $(document).keydown(function(e) {
        if(e.keyCode  == 27) { 
            closeCalcPopup();
        }
    });

    $('body').on('click', '.calcform .callback_exit', function(event) {
        closeCalcPopup();
    });

    function closeCalcPopup(){
        $('.calc_popup_overlay').remove();
        $('.sidebar').css('display', 'none');
    }

    $('body').on('click', '.calc_item-first', function(event) {
        wrapp = $(this).closest('.calc_nav_items');
        list = wrapp.find('ul');
        btn = wrapp.find('.calc_item-first');
        btn.css({
            'border-bottom-left-radius': 'unset',
            'border-bottom-right-radius': 'unset'
        });
        list.css({
            'visibility': 'visible',
            'opacity': '1',
            'display': 'block',
            'transition': '0.35s',
        });
        if (!btn.hasClass("arrow_top")) {
            btn.addClass('arrow_top');
        }
    });

    $('body').on('mouseleave', '.calc_nav_items', function(event) {
        this_ = $(this);
        btn = this_.find('.calc_item-first');
        btn.css({
            'border-bottom-left-radius': '5px',
            'border-bottom-right-radius': '5px'
        });
        this_.find('ul').css({
            'visibility': 'hidden',
            'opacity': '0',
            'display': 'hidden',
            'transition': '0.5s',
        });
        btn.removeClass('arrow_top');
    });

    //-- Якорная ссылка ------------------------------------------------------------------------
    hashName = window.location.hash;
    
    if(hashName){
    	window.location.hash = '';
	    $(function(){
	        $('html,body').stop().animate({
	            scrollTop: $(hashName).offset().top  - 150
	        }, 500);

	        if($('.btn_popup_weight').is(":visible")) {
	            $('html,body').stop().animate({
	                scrollTop: $('.btn_popup_weight').offset().top  - 110
	            }, 500);
	        }
	    });
    }
    //-- Якорная ссылка END --------------------------------------------------------------------

    //-- КОРЗИНА -------------------------------------------------------------------------------
    $('.cart_wrap').on('click', '.prod_quantity_type', function() {
        let this_ = $(this);
        let type = this_.data('type');
        let wrap = this_.closest('.prod_quantity');

        if(!this_.hasClass('prod_quantity_active')) {
            wrap.find('.prod_quantity_type').removeClass('prod_quantity_active');
            this_.addClass('prod_quantity_active');
            wrap.find('.prod_quantity_value').addClass('hidden');
            wrap.find('[data-type="'+type+'"].prod_quantity_value').removeClass('hidden');
            this_.closest('.prod_quantity').removeClass('min_weight_warning');
        }
    });
   
    $('.cart_wrap').on('blur', '.prod_quantity_value', function() {
        let this_ = $(this);
        let type = this_.data('type');
        let prod_item = this_.closest('.cart_prod_item');
        let id = prod_item.data('id');
        let val = parseFloat(this_.val());
        let min = parseFloat(this_.attr('min'));
        let max = parseFloat(this_.attr('max'));
        let price_1kg = parseFloat(prod_item.find('.prod_price_value').text());
        let weight_for_one = parseFloat(prod_item.find('input[type="hidden"].inp_weight_for_one').val());
        var hide_input = prod_item.find('.prod_quantity_value.hidden');
        var hide_input_type = hide_input.data('type');

        if(val < min || !$.isNumeric(this_.val())) {
            this_.val(min);
            if(!this_.closest('.prod_quantity').hasClass('min_weight_warning')) {
                this_.closest('.prod_quantity').addClass('min_weight_warning');
            }
        } else if(val > max) {
            this_.val(max);
        } else {
            this_.closest('.prod_quantity').removeClass('min_weight_warning');
        }

        if(price_1kg) {
            if(type == 'kg'){
            	var price_total = Math.round(price_1kg*parseFloat(this_.val()));
                let price_total_formated = addCommas(Math.round(price_1kg*parseFloat(this_.val())));
                prod_item.find('.prod_price_total_value').text(price_total_formated);
            } else if(type == "sht") {
            	var price_total = Math.round(weight_for_one*price_1kg*parseFloat(this_.val()));
                let price_total_formated = addCommas(Math.round(weight_for_one*price_1kg*parseFloat(this_.val())));
                prod_item.find('.prod_price_total_value').text(price_total_formated);
            } else if(type == "p_m") {
            	var price_total = Math.round(weight_for_one*price_1kg*parseFloat(this_.val()));
                let price_total_formated = addCommas(Math.round(weight_for_one*price_1kg*parseFloat(this_.val())));
                prod_item.find('.prod_price_total_value').text(price_total_formated);
            }

            if(hide_input_type == 'kg'){
                val_kg = parseFloat((price_total/price_1kg).toFixed(2));
                hide_input.val(val_kg);
            } else if(hide_input_type == "sht" || hide_input_type == "p_m") {
                val_sht = val_pm = Math.round(price_total/(price_1kg*weight_for_one));
                hide_input.val(val_sht);
            }
        }

        $('[data-name]').each(function() {
            let wrap = $(this).closest('.cart_prod_item');
            let name = $(this).data('name');
            let tagName = this.tagName.toLowerCase();
            let value = (tagName == 'input') ? $(this).val() : $(this).text();
            value = value.replace(/\s/g, '');
            wrap.find('input[type="hidden"].inp_'+name).val(value);
        });

        // Предварительная стоимость
        let sum_price = 0;
        $('input[type="hidden"].inp_total_price').each(function() {
            if(!isNaN($(this).val())) {
                sum_price = parseInt(sum_price) + parseInt($(this).val());
            }
        });
        $('.sum_price_value').text(addCommas(sum_price));


        if(price_1kg) {
            data = {
                id: id,
                total_price: prod_item.find('input[type="hidden"].inp_total_price').val()
            }

            $.ajax({
                url: '/ajax-cart',
                type: 'POST',
                data: data,
            })
            .done(function() {
                console.log("success change total_price in cart");
            })
            .fail(function() {
                console.log("error change total_price in cart");
            })
        }
        
    });

    $('.cart_wrap').on('click', '.prod_quantity_value', function() {
        var el=this;
        el.focus();
        el.setSelectionRange(0,el.value.length);
    });

    $('input.prod_quantity_value').bind("enterKey",function(e){
        $( this ).trigger( "focusout" );
    });

    $('input.prod_quantity_value').keyup(function(e){
        if(e.keyCode == 13) {
            $(this).trigger("enterKey");
        }
    });

    //-- КОРЗИНА END ---------------------------------------------------------------------------

});

function getNames(str){

    var files = document.getElementById("docs[]").files;

    if (files.length > 0) {
        $('#file_upload-name').html('');
        for (var i = 0; i < files.length; i++) {
            $('#file_upload-name').append('<span class="file-name">'+files[i].name+'</span>').parent().parent().append('<span class="delete"></span>');
        }
        //$(this).parent().parent().append('<label class="file_upload"><span class="added-files" id="file_upload-name">прикрепить</span><input type="file" name="docs[]" id="docs[]" accept="image/png, image/jpeg" onchange="getNames(this.value);" /></label>');


    } else {
        $('#file_upload-name').html('прикрепить');
    }

}

function getName(str){

    if (str.lastIndexOf('\\')){
        var i = str.lastIndexOf('\\')+1;
    } else {
        var i = str.lastIndexOf('/')+1;
    }      
                     
    var filename = str.slice(i);

    if (filename == '') {
        $('#file_upload-name').html('Прикрепить файл');   
    } else {
        $('#file_upload-name').html(filename);
    }
}

function addCommas(nStr) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ' ' + '$2');
    }
    return x1 + x2;
}

/*
     FILE ARCHIVED ON 02:54:15 Jun 14, 2018 AND RETRIEVED FROM THE
     INTERNET ARCHIVE ON 11:44:44 Jul 20, 2018.
     JAVASCRIPT APPENDED BY WAYBACK MACHINE, COPYRIGHT INTERNET ARCHIVE.

     ALL OTHER CONTENT MAY ALSO BE PROTECTED BY COPYRIGHT (17 U.S.C.
     SECTION 108(a)(3)).
*/
/*
playback timings (ms):
  LoadShardBlock: 81.809 (3)
  esindex: 0.011
  captures_list: 110.489
  CDXLines.iter: 11.863 (3)
  PetaboxLoader3.datanode: 125.903 (4)
  exclusion.robots: 0.239
  exclusion.robots.policy: 0.226
  RedisCDXSource: 12.881
  PetaboxLoader3.resolve: 155.235
  load_resource: 456.082
*/