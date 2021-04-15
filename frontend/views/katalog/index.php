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
		<h1>Каталог</h1>
		<div class="main_cat _catalog">

    <?php
			
      foreach ($katalogPage as $item){
        echo '<div class="main_cat_item">';
        echo '<div class="main_cat_item_img">';
        echo '<img src="' . $item['extraContent']['menu_image'] . '" alt="">';
        echo '</div>';
        echo '<div class="main_cat_item_link">';
        echo '<a href="' . $item['alias'] . '/">' . $item['extraContent']['menu_name'] . '</a>';
        echo '</div>';
        // <div class="main_alloy_list"><a href="/katalog/alyuminievye_listy/ак4-1">АК4-1</a><a href="/katalog/alyuminievye_listy/1105">1105</a><a href="/katalog/alyuminievye_listy/1925">1925</a><a href="/katalog/alyuminievye_listy/д19ч">Д19Ч</a><a href="/katalog/alyuminievye_listy/д16">Д16</a><a href="/katalog/alyuminievye_listy/ак4">АК4</a><a href="/katalog/alyuminievye_listy/1163">1163</a><a href="/katalog/alyuminievye_listy/1915">1915</a><a href="/katalog/alyuminievye_listy/вд1">ВД1</a><a href="/katalog/alyuminievye_listy/в95">В95</a><a href="/katalog/alyuminievye_listy/д1">Д1</a><a href="/katalog/alyuminievye_listy/ав">АВ</a><a href="/katalog/alyuminievye_listy/амг5">АМГ5</a><a href="/katalog/alyuminievye_listy/амг2">АМГ2</a><a href="/katalog/alyuminievye_listy/ад1">АД1</a><a href="/katalog/alyuminievye_listy/а5">А5</a><a href="/katalog/alyuminievye_listy/амц">АМЦ</a></div>
        echo '</div>';
      }

    ?>

		</div>
	</div>
</div>