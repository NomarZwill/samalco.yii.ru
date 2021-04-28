'use strict';

export default class Katalog
{
	constructor()
  {
    var self = this;
    $(".content_table").on("click", '.exclamation_link', function(e){
      var scroll_el = '.pod_zakaz';
      if ($(scroll_el).length != 0) { 
        $('html, body').animate({ scrollTop: $(scroll_el).offset().top - 150 }, 500);
      }
      e.preventDefault();
      return false;
    });  

    $(".content_table").on("click", '.show_all_link', function(){
      var this_ = $(this);
      if(this_.hasClass('clear')) {
        $(".pod_zakaz_tbl").css('display', 'block');
        $(".show_all_link").css({"border":"none", "cursor":"default", "color":"black"});
        this_.removeClass('clear');
        this_.hide();
      }
      // console.log(this_.data('table'));
      self.ajaxHandler({
        contentData: '.content_table noindex',
        table: this_.data('table'),
        filter: this_.data('filter'),
        table_head: this_.data('table_head'),
        table_params: this_.data('table_params'),
        // no_balance: "<?=$no_balance;?>",
        session_id: this_.data('session')
      });
    });

    // $("[data-profili-page-more-link]").on("click", function(e){
      // $(this).toggleClass('__active');

      // if ($(this).hasClass('__active')){
      //   $('[data-profili-page-more-text]').css('display', 'block');
      // } else {
      //   $('[data-profili-page-more-text]').css('display', 'none');
      // }
    // });

    $(".content_table").on("submit", ".product-form", function(e) {
      var self = this;
			var data = $(this).serialize();
			$.ajax({
				type: "POST",
				url: "/addCart.php",
				data: data,
				success: function(data) {
					// gtag('event', 'addcart', { 'event_category': 'addcart', 'event_action': 'click', });
					var hint = '<div class="add-cart-hint">Вы добавили в корзину<br><b>' + data.category + '<b> сплав <b>' + data.alloy + '</b></div>';
					// yaCounter9939076.reachGoal('addcart'); console.log('addCart');
					if ($('span').is('#cart-count')) {
						var count = parseInt($('#cart-count').html());
						$('#cart-count').html(count + 1);
					} else {
						$('.cart-total').append('<span class="cart-count" id="cart-count">1</span>');
						$('.cart-total a').attr('href','/cart/');
					}

					$('.cart-total').append(hint);
					setTimeout(hideHint, 2000);
				},
				error:function(data) {
					console.log(data);
				}
			});  
			e.preventDefault();

      function hideHint() {
        $('.add-cart-hint').fadeOut(500);
        setTimeout(hintRemove, 1000);
      }
    
      function hintRemove() {
        $('.add-cart-hint').remove();
      }    
		});
  }

  ajaxHandler(obj, callback){

    if ($(obj.contentData).children(":first").length <= 0) {
      $.ajax({
        type: 'post',
        url: '/ajax/get-no-balance-table/',
        data: obj,
        cache: !1,
        async: !0,
        headers: {
          "cache-control": "no-cache"
        },
        beforeSend: function(){
          $(obj.contentData).html('<div id="fountainG">' +
            '<div id="fountainG_1" class="fountainG"></div>' +
            '<div id="fountainG_2" class="fountainG"></div>' +
            '<div id="fountainG_3" class="fountainG"></div>' +
            '<div id="fountainG_4" class="fountainG"></div>' +
            '<div id="fountainG_5" class="fountainG"></div>' +
            '<div id="fountainG_6" class="fountainG"></div>' +
            '<div id="fountainG_7" class="fountainG"></div>' +
            '<div id="fountainG_8" class="fountainG"></div>' +
            '</div><br>');
        },
        success: function(response) {
          // console.log(JSON.parse(response).table);

          $('.table_caption.pod_zakaz').after(JSON.parse(response).table);

          setTimeout(function(){
            // $(obj.contentData).html(response);
          }, 1000);
          if (typeof callback === "function"){callback()};
        },
        error: function(response) {
          console.log('error ajaxHandler')
        }
      });
    } else {
      if(typeof callback === "function"){callback()};
    }
  }
}
