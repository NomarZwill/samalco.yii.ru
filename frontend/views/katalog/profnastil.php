<div class="main_wrap">

<?= $this->render('/components/sidebar', array(
  'table' => '',
  'mobile' => '',
)) ?>

	<div class="content">
    <?= $this->render('/components/breadcrumbs', array(
      'breadcrumbs' => $breadcrumbs,
      ))
    ?>
		<h1><?= $currentPage['subdomenSeo']['header'] ?></h1>
		<div class="content_table_static">
		<?= $currentPage['subdomenSeo']['text_1'] ?>
    <div class="sectionContent proflistsSection">
      <div style="background: #ededed; border: 1px solid #e3e3e3; padding: 20px;">
      <p><strong>Вы можете приобрести наш профлист:</strong></p>
      <ul>
      <li>Со склада: толщиной 0,5мм и 0,6мм, с высотой гофры 21мм и 44мм длиной 3 и 4 метра.
      </li>
      <li>Под заказ: толщиной от 0,5мм до 1,2мм, с высотой гофры до 75мм и длиной до 12м.</li>
      </ul>
      </div>
      <p>
      <br /><br /></p>
      <h2>Новинка! Крашенные профлисты</h2>
      <p>Окраска профлистов всех типов! Выберите подходящий цвет и закажите профлист уже окрашенным. Фото примеров окрашенных профлистов:</p>
      <p>&nbsp;</p>
      <div class="proflists">
      <div class="proflist-item"><img src="/images/al-proflist/5005.png" alt="" />
      <div class="proflist-title">RAL 5005</div>
      </div>
      <div class="proflist-item"><img src="/images/al-proflist/6002.png" alt="" />
      <div class="proflist-title">RAL 6002</div>
      </div>
      <div class="proflist-item"><img src="/images/al-proflist/1002.png" alt="" />
      <div class="proflist-title">RAL 1002</div>
      </div>
      <div class="proflist-item"><img src="/images/al-proflist/9003.png" alt="" />
      <div class="proflist-title">RAL 9003</div>
      </div>
      </div>
      <div class="show_color_proflists">
          <span class="__big">Возможные цвета окрашенного профнастила с полимерным покрытием</span><br /><span class="__small">от Самарской алюминиевой компании</span>
      </div>
      </div>
      <div class="b-ral b-ral_with_name" style="display: none;">
      <div class="b-ral-item">
        <p class="b-ral-item__name">Желтый окрашенный профнастил по каталогу RAL</p>
        <div class="b-ral-item__colors" border="0">
          <div style="background: #ccc188; color: #000000;">RAL 1000</div>
          <div style="background: #ceb487; color: #000000;">RAL 1001</div>
          <div style="background: #d0b173; color: #000000;">RAL 1002</div>
          <div style="background: #f2ad00; color: #000000;">RAL 1003</div>
          <div style="background: #e4a700; color: #ffffff;">RAL 1004</div>
          <div style="background: #c79600; color: #ffffff;">RAL 1005</div>
          <div style="background: #d99300; color: #ffffff;">RAL 1006</div>
          <div style="background: #e69400; color: #ffffff;">RAL 1007</div>
          <div style="background: #d8ba2e; color: #000000;">RAL 1011</div>
          <div style="background: #af8552; color: #ffffff;">RAL 1012</div>
          <div style="background: #e5dfcc; color: #000000;">RAL 1013</div>
          <div style="background: #dfcea1; color: #000000;">RAL 1014</div>
          <div style="background: #e6d9bd; color: #000000;">RAL 1015</div>
          <div style="background: #ecea41; color: #000000;">RAL 1016</div>
          <div style="background: #f6b256; color: #000000;">RAL 1017</div>
          <div style="background: #fdda38; color: #000000;">RAL 1018</div>
          <div style="background: #a6937b; color: #ffffff;">RAL 1019</div>
          <div style="background: #a09465; color: #ffffff;">RAL 1020</div>
          <div style="background: #f2c000; color: #000000;">RAL 1021</div>
          <div style="background: #f2bf00; color: #000000;">RAL 1023</div>
          <div style="background: #b89650; color: #ffffff;">RAL 1024</div>
          <div style="background: #a4861a; color: #ffffff;">RAL 1027</div>
          <div style="background: #ffa600; color: #000000;">RAL 1028</div>
          <div style="background: #e2ac00; color: #ffffff;">RAL 1032</div>
          <div style="background: #f7a11f; color: #000000;">RAL 1033</div>
          <div style="background: #eba557; color: #000000;">RAL 1034</div>
        </div>
      </div>
      <div class="b-ral-item">
        <p class="b-ral-item__name">Оранжевый окрашенный профлист по каталогу RAL</p>
        <div class="b-ral-item__colors" border="0">
          <div style="background: #d97604; color: #ffffff;">RAL 2000</div>
          <div style="background: #bb4926; color: #ffffff;">RAL 2001</div>
          <div style="background: #c13524; color: #ffffff;">RAL 2002</div>
          <div style="background: #f97a31; color: #ffffff;">RAL 2003</div>
          <div style="background: #e8540d; color: #ffffff;">RAL 2004</div>
          <div style="background: #f46f29; color: #ffffff;">RAL 2008</div>
          <div style="background: #db5316; color: #ffffff;">RAL 2009</div>
          <div style="background: #d55d23; color: #ffffff;">RAL 2010</div>
          <div style="background: #ea7625; color: #ffffff;">RAL 2011</div>
          <div style="background: #d6654e; color: #ffffff;">RAL 2012</div>
        </div>
      </div>
      <div class="b-ral-item">
        <p class="b-ral-item__name">Красный окрашенный профнастил по каталогу RAL</p>
        <div class="b-ral-item__colors" border="0">
          <div style="background: #a02725; color: #ffffff;">RAL 3000</div>
          <div style="background: #a0001c; color: #ffffff;">RAL 3001</div>
          <div style="background: #991424; color: #ffffff;">RAL 3002</div>
          <div style="background: #870a24; color: #ffffff;">RAL 3003</div>
          <div style="background: #6c1b2a; color: #ffffff;">RAL 3004</div>
          <div style="background: #581e29; color: #ffffff;">RAL 3005</div>
          <div style="background: #402226; color: #ffffff;">RAL 3007</div>
          <div style="background: #6d312b; color: #ffffff;">RAL 3009</div>
          <div style="background: #791f24; color: #ffffff;">RAL 3011</div>
          <div style="background: #c68873; color: #ffffff;">RAL 3012</div>
          <div style="background: #992a28; color: #ffffff;">RAL 3013</div>
          <div style="background: #cf7278; color: #ffffff;">RAL 3014</div>
          <div style="background: #e3a0ac; color: #000000;">RAL 3015</div>
          <div style="background: #ab392d; color: #ffffff;">RAL 3016</div>
          <div style="background: #cc515e; color: #ffffff;">RAL 3017</div>
          <div style="background: #ca3f51; color: #ffffff;">RAL 3018</div>
          <div style="background: #bf111b; color: #ffffff;">RAL 3020</div>
          <div style="background: #d36b56; color: #ffffff;">RAL 3022</div>
          <div style="background: #b01d42; color: #ffffff;">RAL 3027</div>
          <div style="background: #a7323e; color: #ffffff;">RAL 3031</div>
        </div>
      </div>
      <div class="b-ral-item">
        <p class="b-ral-item__name">Фиолетовый окрашенный профлист по каталогу RAL</p>
        <div class="b-ral-item__colors" border="0">
          <div style="background: #865d86; color: #ffffff;">RAL 4001</div>
          <div style="background: #8f3f51; color: #ffffff;">RAL 4002</div>
          <div style="background: #ca5b91; color: #ffffff;">RAL 4003</div>
          <div style="background: #69193b; color: #ffffff;">RAL 4004</div>
          <div style="background: #7e63a1; color: #ffffff;">RAL 4005</div>
          <div style="background: #912d76; color: #ffffff;">RAL 4006</div>
          <div style="background: #48233e; color: #ffffff;">RAL 4007</div>
          <div style="background: #853d7d; color: #ffffff;">RAL 4008</div>
          <div style="background: #9d8493; color: #ffffff;">RAL 4009</div>
        </div>
      </div>
      <div class="b-ral-item">
        <p class="b-ral-item__name">Синий окрашенный профнастил по каталогу RAL</p>
        <div class="b-ral-item__colors" border="0">
          <div style="background: #2f4a71; color: #ffffff;">RAL 5000</div>
          <div style="background: #0e4666; color: #ffffff;">RAL 5001</div>
          <div style="background: #162e7b; color: #ffffff;">RAL 5002</div>
          <div style="background: #193058; color: #ffffff;">RAL 5003</div>
          <div style="background: #1a1d2a; color: #ffffff;">RAL 5004</div>
          <div style="background: #004389; color: #ffffff;">RAL 5005</div>
          <div style="background: #38618c; color: #ffffff;">RAL 5007</div>
          <div style="background: #2d3944; color: #ffffff;">RAL 5008</div>
          <div style="background: #245878; color: #ffffff;">RAL 5009</div>
          <div style="background: #00427f; color: #ffffff;">RAL 5010</div>
          <div style="background: #1a2740; color: #ffffff;">RAL 5011</div>
          <div style="background: #2781bb; color: #ffffff;">RAL 5012</div>
          <div style="background: #202e53; color: #ffffff;">RAL 5013</div>
          <div style="background: #667b9a; color: #ffffff;">RAL 5014</div>
          <div style="background: #0071b5; color: #ffffff;">RAL 5015</div>
          <div style="background: #004c91; color: #ffffff;">RAL 5017</div>
          <div style="background: #138992; color: #ffffff;">RAL 5018</div>
          <div style="background: #005688; color: #ffffff;">RAL 5019</div>
          <div style="background: #00747d; color: #ffffff;">RAL 5020</div>
          <div style="background: #00747d; color: #ffffff;">RAL 5021</div>
          <div style="background: #28275a; color: #ffffff;">RAL 5022</div>
          <div style="background: #486591; color: #ffffff;">RAL 5023</div>
          <div style="background: #6391b0; color: #ffffff;">RAL 5024</div>
        </div>
      </div>
      <div class="b-ral-item">
        <p class="b-ral-item__name">Зелёный окрашенный профлист по каталогу RAL</p>
        <div class="b-ral-item__colors" border="0">
          <div style="background: #327663; color: #ffffff;">RAL 6000</div>
          <div style="background: #266d3b; color: #ffffff;">RAL 6001</div>
          <div style="background: #276230; color: #ffffff;">RAL 6002</div>
          <div style="background: #4e553d; color: #ffffff;">RAL 6003</div>
          <div style="background: #004547; color: #ffffff;">RAL 6004</div>
          <div style="background: #0e4438; color: #ffffff;">RAL 6005</div>
          <div style="background: #3b3d33; color: #ffffff;">RAL 6006</div>
          <div style="background: #2b3626; color: #ffffff;">RAL 6007</div>
          <div style="background: #302f22; color: #ffffff;">RAL 6008</div>
          <div style="background: #213529; color: #ffffff;">RAL 6009</div>
          <div style="background: #426e38; color: #ffffff;">RAL 6010</div>
          <div style="background: #68825f; color: #ffffff;">RAL 6011</div>
          <div style="background: #293a37; color: #ffffff;">RAL 6012</div>
          <div style="background: #76785b; color: #ffffff;">RAL 6013</div>
          <div style="background: #443f31; color: #ffffff;">RAL 6014</div>
          <div style="background: #383b34; color: #ffffff;">RAL 6015</div>
          <div style="background: #00664f; color: #ffffff;">RAL 6016</div>
          <div style="background: #4d8542; color: #ffffff;">RAL 6017</div>
          <div style="background: #4b9b3e; color: #ffffff;">RAL 6018</div>
          <div style="background: #b2d8b4; color: #000000;">RAL 6019</div>
          <div style="background: #394937; color: #ffffff;">RAL 6020</div>
          <div style="background: #87a180; color: #ffffff;">RAL 6021</div>
          <div style="background: #3c372a; color: #ffffff;">RAL 6022</div>
          <div style="background: #008455; color: #ffffff;">RAL 6024</div>
          <div style="background: #56723d; color: #ffffff;">RAL 6025</div>
          <div style="background: #005c54; color: #ffffff;">RAL 6026</div>
          <div style="background: #77bbbd; color: #ffffff;">RAL 6027</div>
          <div style="background: #2e554b; color: #ffffff;">RAL 6028</div>
          <div id="bx_3218110189_389" style="background: #006f43; color: #ffffff;">RAL 6029</div>
          <div style="background: #00855a; color: #ffffff;">RAL 6032</div>
          <div style="background: #3f8884; color: #ffffff;">RAL 6033</div>
          <div style="background: #75adb1; color: #ffffff;">RAL 6034</div>
        </div>
      </div>
      <div class="b-ral-item">
        <p class="b-ral-item__name">Серый окрашенный профнастил по каталогу RAL</p>
        <div class="b-ral-item__colors" border="0">
          <div style="background: #798790; color: #ffffff;">RAL 7000</div>
          <div style="background: #8c969f; color: #ffffff;">RAL 7001</div>
          <div style="background: #827d67; color: #ffffff;">RAL 7002</div>
          <div style="background: #79796c; color: #ffffff;">RAL 7003</div>
          <div style="background: #999a9f; color: #ffffff;">RAL 7004</div>
          <div style="background: #6d7270; color: #ffffff;">RAL 7005</div>
          <div id="bx_3218110189_399" style="background: #766a5d; color: #ffffff;">RAL 7006</div>
          <div style="background: #756444; color: #ffffff;">RAL 7008</div>
          <div style="background: #585e55; color: #ffffff;">RAL 7009</div>
          <div style="background: #565957; color: #ffffff;">RAL 7010</div>
          <div style="background: #525a60; color: #ffffff;">RAL 7011</div>
          <div style="background: #575e62; color: #ffffff;">RAL 7012</div>
          <div style="background: #585346; color: #ffffff;">RAL 7013</div>
          <div style="background: #4c5057; color: #ffffff;">RAL 7015</div>
          <div style="background: #363d43; color: #ffffff;">RAL 7016</div>
          <div style="background: #2e3236; color: #ffffff;">RAL 7021</div>
          <div style="background: #464644; color: #ffffff;">RAL 7022</div>
          <div style="background: #7f8279; color: #ffffff;">RAL 7023</div>
          <div style="background: #484b52; color: #ffffff;">RAL 7024</div>
          <div style="background: #354044; color: #ffffff;">RAL 7026</div>
          <div style="background: #919089; color: #ffffff;">RAL 7030</div>
          <div style="background: #5b686f; color: #ffffff;">RAL 7031</div>
          <div style="background: #b5b5a7; color: #000000;">RAL 7032</div>
          <div style="background: #7a8376; color: #ffffff;">RAL 7033</div>
          <div style="background: #928d75; color: #ffffff;">RAL 7034</div>
          <div style="background: #c4caca; color: #000000;">RAL 7035</div>
          <div style="background: #949294; color: #ffffff;">RAL 7036</div>
          <div style="background: #7e8082; color: #ffffff;">RAL 7037</div>
          <div style="background: #b0b3af; color: #000000;">RAL 7038</div>
          <div style="background: #6d6b64; color: #ffffff;">RAL 7039</div>
          <div style="background: #9aa0a7; color: #ffffff;">RAL 7040</div>
          <div style="background: #929899; color: #ffffff;">RAL 7042</div>
          <div style="background: #505455; color: #ffffff;">RAL 7043</div>
          <div style="background: #bab9b0; color: #000000;">RAL 7044</div>
        </div>
      </div>
      <div class="b-ral-item">
        <p class="b-ral-item__name">Коричневый окрашенный профнастил по каталогу RAL</p>
        <div class="b-ral-item__colors" border="0">
          <div style="background: #8b7045; color: #ffffff;">RAL 8000</div>
          <div style="background: #9c6935; color: #ffffff;">RAL 8001</div>
          <div style="background: #774c3b; color: #ffffff;">RAL 8002</div>
          <div style="background: #815333; color: #ffffff;">RAL 8003</div>
          <div style="background: #904e3b; color: #ffffff;">RAL 8004</div>
          <div style="background: #6b442a; color: #ffffff;">RAL 8007</div>
          <div style="background: #735230; color: #ffffff;">RAL 8008</div>
          <div style="background: #5b3927; color: #ffffff;">RAL 8011</div>
          <div style="background: #64312a; color: #ffffff;">RAL 8012</div>
          <div style="background: #49372a; color: #ffffff;">RAL 8014</div>
          <div style="background: #5a2e2a; color: #ffffff;">RAL 8015</div>
          <div style="background: #4f3128; color: #ffffff;">RAL 8016</div>
          <div style="background: #45302b; color: #ffffff;">RAL 8017</div>
          <div style="background: #3b3332; color: #ffffff;">RAL 8019</div>
          <div style="background: #1e1a1a; color: #ffffff;">RAL 8022</div>
          <div style="background: #a45c32; color: #ffffff;">RAL 8023</div>
          <div style="background: #7b5741; color: #ffffff;">RAL 8024</div>
          <div style="background: #765d4d; color: #ffffff;">RAL 8025</div>
          <div style="background: #4f3b2b; color: #ffffff;">RAL 8028</div>
        </div>
      </div>
      <div class="b-ral-item">
        <p class="b-ral-item__name">Черный, белый и бежевый окрашенный профнастил по каталогу RAL</p>
        <div class="b-ral-item__colors" border="0">
          <div style="background: #eee9da; color: #000000;">RAL 9001</div>
          <div style="background: #dadbd5; color: #000000;">RAL 9002</div>
          <div style="background: #f8f9fb; color: #000000;">RAL 9003</div>
          <div style="background: #252427; color: #ffffff;">RAL 9004</div>
          <div style="background: #151619; color: #ffffff;">RAL 9005</div>
          <div style="background: #f4f4ed; color: #000000;">RAL 9010</div>
          <div style="background: #1f2126; color: #ffffff;">RAL 9011</div>
          <div style="background: #f3f6f6; color: #000000;">RAL 9016</div>
          <div style="background: #1b191d; color: #ffffff;">RAL 9017</div>
          <div style="background: #cbd2d0; color: #000000;">RAL 9018</div>
        </div>
      </div>
      </div>
      <div class="sectionContent proflistsSection">
      <h2>Тип Н75</h2>
      <div class="proflistsSection_table">
        <table border="0" cellspacing="0" cellpadding="0" width="710">
          <tbody>
          <tr height="51">
            <th class="xl65" style="text-align: center;" width="124" height="51"><strong>Тип</strong></th>
            <th class="xl66" style="text-align: center;" width="81"><strong>Толщина, мм</strong></th>
            <th class="xl65" style="text-align: center;" width="81"><strong>Габаритная
              ширина, мм</strong></th>
            <th class="xl65" style="text-align: center;" width="81"><strong>Монтажная
              ширина,мм&nbsp;</strong></th>
            <th class="xl65" style="text-align: center;" width="81"><strong>Вес 1 м.п.,кг</strong></th>
            <th class="xl65" style="text-align: center;" width="81"><strong>Вес 1м.кв.,кг</strong></th>
            <th class="xl67" style="text-align: center;" width="181"><strong>Стоимость 1м2,
              руб&nbsp;</strong></th>
          </tr>
          <tr height="17">
            <td class="xl71" style="text-align: center;" rowspan="3" height="51">Н75</td>
            <td class="xl68" style="text-align: center;">0,8</td>
            <td class="xl69" style="text-align: center;">800</td>
            <td class="xl69" style="text-align: center;">750</td>
            <td class="xl69" style="text-align: center;">2,6688</td>
            <td class="xl70" style="text-align: center;">3,34</td>
            <td class="xl72" style="text-align: center;" rowspan="3" width="181"><span style="color: #ff0000;">Наличие
              и цены уточняйте в отделе продаж</span></td>
          </tr>
          <tr height="17">
            <td class="xl68" style="text-align: center;" height="17">1,0</td>
            <td class="xl69" style="text-align: center;">800</td>
            <td class="xl69" style="text-align: center;">750</td>
            <td class="xl69" style="text-align: center;">3,336</td>
            <td class="xl70" style="text-align: center;">4,17</td>
          </tr>
          <tr height="17">
            <td class="xl68" style="text-align: center;" height="17">1,2</td>
            <td class="xl69" style="text-align: center;">800</td>
            <td class="xl69" style="text-align: center;">750</td>
            <td class="xl69" style="text-align: center;">4,0032</td>
            <td class="xl70" style="text-align: center;">5,00</td>
          </tr>
          </tbody>
        </table>
      </div>
      <p class="proflist_img"><img src="/images/al-proflist/al-proflist-04.jpg" alt="Алюминиевый профнастил тип Н75" width="640" height="119" /></p>
      <p>Алюминиевый профнастил с высотой гофры 75 мм, ширина листа габаритная 800 мм, ширина листа полезная 750 мм, толщина листа - 0,80 &ndash; 1,2 мм, длина листа 2 &ndash; 12 м.Применяется в промышленном строительстве при покрытии больших пролетов цехов, ангаров, в монолитных перекрытиях, используется при установке наружных ограждений . В жилищном строительстве применяется как кровельный материал с максимальной несущей способностью.<br /><strong>Достоинства: высокая несущая способность.</strong></p>
      <h2>Тип Н60</h2>
      <div class="proflistsSection_table">
        <table border="0" cellspacing="0" cellpadding="0" width="710">
          <tbody>
          <tr height="51">
            <th class="xl65" style="text-align: center;" width="124" height="51"><strong>Тип</strong></th>
            <th class="xl66" style="text-align: center;" width="81"><strong>Толщина, мм</strong></th>
            <th class="xl65" style="text-align: center;" width="81"><strong>Габаритная
              ширина, мм</strong></th>
            <th class="xl65" style="text-align: center;" width="81"><strong>Монтажная
              ширина,мм&nbsp;</strong></th>
            <th class="xl65" style="text-align: center;" width="81"><strong>Вес 1 м.п.,кг</strong></th>
            <th class="xl65" style="text-align: center;" width="81"><strong>Вес 1м.кв.,кг</strong></th>
            <th class="xl67" style="text-align: center;" width="181"><strong>Стоимость 1м2,
              руб&nbsp;</strong></th>
          </tr>
          <tr height="17">
            <td class="xl71" style="text-align: center;" rowspan="3" height="51">Н60</td>
            <td class="xl68" style="text-align: center;">0,6</td>
            <td class="xl69" style="text-align: center;">902</td>
            <td class="xl69" style="text-align: center;">845</td>
            <td class="xl69" style="text-align: center;">2,0016</td>
            <td class="xl70" style="text-align: center;">2,22</td>
            <td class="xl72" style="text-align: center;" rowspan="3" width="181"><span style="color: #ff0000;">Наличие
              и цены уточняйте в отделе продаж</span></td>
          </tr>
          <tr height="17">
            <td class="xl68" style="text-align: center;" height="17">0,8</td>
            <td class="xl69" style="text-align: center;">902</td>
            <td class="xl69" style="text-align: center;">845</td>
            <td class="xl69" style="text-align: center;">2,6688</td>
            <td class="xl70" style="text-align: center;">2,96</td>
          </tr>
          <tr height="17">
            <td class="xl68" style="text-align: center;" height="17">1,0</td>
            <td class="xl69" style="text-align: center;">902</td>
            <td class="xl69" style="text-align: center;">845</td>
            <td class="xl69" style="text-align: center;">3,336</td>
            <td class="xl70" style="text-align: center;">3,70</td>
          </tr>
          </tbody>
        </table>
      </div>
      <p class="proflist_img"><img src="/images/al-proflist/al-proflist-03.jpg" alt="Алюминиевый профнастил тип Н60" width="640" height="119" /></p>
      <p>Профнастил с высотой гофры 60 мм, ширина листа габаритная 902 мм, ширина листа полезная 845 мм, толщина листа - 0,6 &mdash; 1,0 мм, длина листа 2 &ndash; 12 м.Применяется как кровельный материал при покрытии больших пролетов в цехах, ангарах и как стеновой - при установке наружных ограждений. Используется также при меньших углах наклона кровли зданий в зонах с обильными атмосферными осадками.<br /><strong>Достоинства: высокая несущая способность &ndash; выдерживает значительные нагрузки даже при горизонтальном положении с большими пролётами между опорными точками.</strong></p>
      <h2>Тип С44</h2>
      <div class="proflistsSection_table">
        <table border="0" cellspacing="0" cellpadding="0" width="710">
          <tbody>
          <tr height="51">
            <th class="xl65" style="text-align: center;" width="124" height="51"><strong>Тип</strong></th>
            <th class="xl66" style="text-align: center;" width="81"><strong>Толщина, мм</strong></th>
            <th class="xl65" style="text-align: center;" width="81"><strong>Габаритная
              ширина, мм</strong></th>
            <th class="xl65" style="text-align: center;" width="81"><strong>Монтажная
              ширина,мм&nbsp;</strong></th>
            <th class="xl65" style="text-align: center;" width="81"><strong>Вес 1 м.п.,кг</strong></th>
            <th class="xl65" style="text-align: center;" width="81"><strong>Вес 1м.кв.,кг</strong></th>
            <th class="xl67" style="text-align: center;" width="181"><strong>Стоимость 1м2,
              руб&nbsp;</strong></th>
          </tr>
          <tr height="17">
            <td class="xl71" style="text-align: center;" rowspan="3" height="51">С44</td>
            <td class="xl68" style="text-align: center;">0,5</td>
            <td class="xl69" style="text-align: center;">1044</td>
            <td class="xl69" style="text-align: center;">1000</td>
            <td class="xl69" style="text-align: center;">1,668</td>
            <td class="xl70" style="text-align: center;">1,60</td>
            <td class="xl72" style="text-align: center;" rowspan="3" width="181"><span style="color: #ff0000;">Наличие
              и цены уточняйте в отделе продаж</span></td>
          </tr>
          <tr height="17">
            <td class="xl68" style="text-align: center;" height="17">0,6</td>
            <td class="xl69" style="text-align: center;">1044</td>
            <td class="xl69" style="text-align: center;">1000</td>
            <td class="xl69" style="text-align: center;">2,0016</td>
            <td class="xl70" style="text-align: center;">1,92</td>
          </tr>
          <tr height="17">
            <td class="xl68" style="text-align: center;" height="17">0,8</td>
            <td class="xl69" style="text-align: center;">1044</td>
            <td class="xl69" style="text-align: center;">1000</td>
            <td class="xl69" style="text-align: center;">2,6688</td>
            <td class="xl70" style="text-align: center;">2,56</td>
          </tr>
          </tbody>
        </table>
      </div>
      <p class="proflist_img"><img src="/images/al-proflist/al-proflist-02.jpg" alt="Алюминиевый профнастил тип С44" width="640" height="119" /></p>
      <p>Алюминиевый профнастил с высотой гофры 44 мм, ширина листа габаритная 1047 мм, ширина листа полезная 1000 мм, толщина листа - 0,50 &mdash; 1,0 мм, длина листа 1,5 &ndash; 12 м. Применяется в качестве стенового и облицовочного материала для стен, перегородок, подвесных потолков и в качестве кровельного материала в жилищном строительстве. Отлично выдерживает статические и динамические нагрузки, что позволяет применять его в промышленном строительстве при возведении цехов, ангаров, навесов, а также стационарных ограждений.<br /><strong>Достоинства: долговечность, герметичность, экономичность, устойчивостью к механическим повреждениям.</strong></p>
      <h2>Тип HС35</h2>
      <div class="proflistsSection_table">
        <table border="0" cellspacing="0" cellpadding="0" width="710">
          <tbody>
          <tr height="51">
            <th class="xl65" style="text-align: center;" width="124" height="51"><strong>Тип</strong></th>
            <th class="xl66" style="text-align: center;" width="81"><strong>Толщина, мм</strong></th>
            <th class="xl65" style="text-align: center;" width="81"><strong>Габаритная
              ширина, мм</strong></th>
            <th class="xl65" style="text-align: center;" width="81"><strong>Монтажная
              ширина,мм&nbsp;</strong></th>
            <th class="xl65" style="text-align: center;" width="81"><strong>Вес 1 м.п.,кг</strong></th>
            <th class="xl65" style="text-align: center;" width="81"><strong>Вес 1м.кв.,кг</strong></th>
            <th class="xl67" style="text-align: center;" width="181"><strong>Стоимость 1м2,
              руб&nbsp;</strong></th>
          </tr>
          <tr height="17">
            <td class="xl71" style="text-align: center;" rowspan="3" height="51">HС35</td>
            <td class="xl68" style="text-align: center;">0,5</td>
            <td class="xl69" style="text-align: center;">1060</td>
            <td class="xl69" style="text-align: center;">1000</td>
            <td class="xl69" style="text-align: center;">1,67</td>
            <td class="xl70" style="text-align: center;">1,58</td>
            <td class="xl72" style="text-align: center;" rowspan="3" width="181"><span style="color: #ff0000;">Наличие
              и цены уточняйте в отделе продаж</span></td>
          </tr>
          <tr height="17">
            <td class="xl68" style="text-align: center;" height="17">0,6</td>
            <td class="xl69" style="text-align: center;">1060</td>
            <td class="xl69" style="text-align: center;">1000</td>
            <td class="xl69" style="text-align: center;">2,01</td>
            <td class="xl70" style="text-align: center;">1,9</td>
          </tr>
          <tr height="17">
            <td class="xl68" style="text-align: center;" height="17">0,8</td>
            <td class="xl69" style="text-align: center;">1060</td>
            <td class="xl69" style="text-align: center;">1000</td>
            <td class="xl69" style="text-align: center;">2,68</td>
            <td class="xl70" style="text-align: center;">2,53</td>
          </tr>
          </tbody>
        </table>
      </div>
      <p class="proflist_img"><img src="/images/hc35.jpg" alt="Алюминиевый профнастил тип НС35" width="640" /></p>
      <p>НС35 - материал, широко применяемый при устройстве кровельных систем и разнообразных ограждений. Маркировка НС в названии профлиста НС35-1000 говорит о том, что данный профилированный лист универсален и может применяться как несущий и как стеновой.</p>
      <p>Основное и существенное отличие профлиста НС35 от аналогов &ndash; это наличие в гофрах ребра жесткости, что дает профнастилу НС35х1000 более высокие прочностные характеристики.</p>
      <h2>Тип С21</h2>
      <div class="proflistsSection_table">
        <table border="0" cellspacing="0" cellpadding="0" width="710">
          <tbody>
          <tr height="51">
            <th class="xl63" style="text-align: center;" width="124" height="51"><strong>Тип</strong></th>
            <th class="xl64" style="text-align: center;" width="81"><strong>Толщина, мм</strong></th>
            <th class="xl63" style="text-align: center;" width="81"><strong>Габаритная
              ширина, мм</strong></th>
            <th class="xl63" style="text-align: center;" width="81"><strong>Монтажная
              ширина,мм&nbsp;</strong></th>
            <th class="xl63" style="text-align: center;" width="81"><strong>Вес 1 м.п.,кг</strong></th>
            <th class="xl63" style="text-align: center;" width="81"><strong>Вес 1м.кв.,кг</strong></th>
            <th class="xl65" style="text-align: center;" width="181"><strong>Стоимость 1м2,
              руб&nbsp;</strong></th>
          </tr>
          <tr height="17">
            <td class="xl67" style="text-align: center;" rowspan="3" height="51">С21</td>
            <td class="xl66" style="text-align: center;">0,5</td>
            <td class="xl67" style="text-align: center;">1051</td>
            <td class="xl67" style="text-align: center;">1000</td>
            <td class="xl67" style="text-align: center;">1,668</td>
            <td class="xl68" style="text-align: center;">1,59</td>
            <td class="xl69" style="text-align: center;" rowspan="3" width="181"><span style="color: #ff0000;">Наличие
              и цены уточняйте в отделе продаж</span></td>
          </tr>
          <tr height="17">
            <td class="xl66" style="text-align: center;" height="17">0,6</td>
            <td class="xl67" style="text-align: center;">1051</td>
            <td class="xl67" style="text-align: center;">1000</td>
            <td class="xl67" style="text-align: center;">2,0016</td>
            <td class="xl68" style="text-align: center;">1,90</td>
          </tr>
          <tr height="17">
            <td class="xl66" style="text-align: center;" height="17">0,8</td>
            <td class="xl67" style="text-align: center;">1051</td>
            <td class="xl67" style="text-align: center;">1000</td>
            <td class="xl67" style="text-align: center;">2,6688</td>
            <td class="xl68" style="text-align: center;">2,54</td>
          </tr>
          </tbody>
        </table>
      </div>
      <p class="proflist_img"><img src="/images/al-proflist/al-proflist-01.jpg" alt="Алюминиевый профиль Тип С21" width="640" height="119" /></p>
      <p>Профнастил с высотой гофры 21 мм, ширина листа габаритная 1051 мм, ширина листа полезная 1000 мм, толщина листа - 0,50 - 0,8 мм, длина листа 1,5 &ndash; 12 м.
      Применяется, как стеновой и облицовочный материал для стен, перегородок, ограждений, а также используется как кровельный материал в жилищном строительстве.<br />
      <strong>Достоинства: универсальность, прочность, экономичность.</strong></p>
      <h2>Тип МП20</h2>
      <div class="proflistsSection_table">
        <table border="0" cellspacing="0" cellpadding="0" width="710">
          <tbody>
          <tr height="51">
            <th class="xl63" style="text-align: center;" width="124" height="51"><strong>Тип</strong></th>
            <th class="xl64" style="text-align: center;" width="81"><strong>Толщина, мм</strong></th>
            <th class="xl63" style="text-align: center;" width="81"><strong>Габаритная
              ширина, мм</strong></th>
            <th class="xl63" style="text-align: center;" width="81"><strong>Монтажная
              ширина,мм&nbsp;</strong></th>
            <th class="xl63" style="text-align: center;" width="81"><strong>Вес 1 м.п.,кг</strong></th>
            <th class="xl63" style="text-align: center;" width="81"><strong>Вес 1м.кв.,кг</strong></th>
            <th class="xl65" style="text-align: center;" width="181"><strong>Стоимость 1м2,
              руб&nbsp;</strong></th>
          </tr>
          <tr height="17">
            <td class="xl67" style="text-align: center;" rowspan="3" height="51">МП20</td>
            <td class="xl66" style="text-align: center;">0,5</td>
            <td class="xl67" style="text-align: center;">1150</td>
            <td class="xl67" style="text-align: center;">1100</td>
            <td class="xl67" style="text-align: center;">1,67</td>
            <td class="xl68" style="text-align: center;">1,46</td>
            <td class="xl69" style="text-align: center;" rowspan="3" width="181"><span style="color: #ff0000;">Наличие
              и цены уточняйте в отделе продаж</span></td>
          </tr>
          <tr height="17">
            <td class="xl66" style="text-align: center;" height="17">0,6</td>
            <td class="xl67" style="text-align: center;">1150</td>
            <td class="xl67" style="text-align: center;">1100</td>
            <td class="xl67" style="text-align: center;">2,01</td>
            <td class="xl68" style="text-align: center;">1,75</td>
          </tr>
          <tr height="17">
            <td class="xl66" style="text-align: center;" height="17">0,8</td>
            <td class="xl67" style="text-align: center;">1150</td>
            <td class="xl67" style="text-align: center;">1100</td>
            <td class="xl67" style="text-align: center;">2,68</td>
            <td class="xl68" style="text-align: center;">2,33</td>
          </tr>
          </tbody>
        </table>
      </div>
      <p class="proflist_img"><img src="/images/мп20.jpg" alt="Алюминиевый профиль Тип МП20" width="640" /></p>
      <p>Используется для устройства скатных кровель, а также для облицовки стен и возведения ограждений. Профлист МП20 достаточно просто устанавливается на каркас крыши и, благодаря редкому оребрению, прочно закрепляется на своем месте.</p>
      <h2>Тип ССм10</h2>
      <div class="proflistsSection_table">
        <table border="0" cellspacing="0" cellpadding="0" width="710">
          <tbody>
          <tr height="51">
            <th class="xl65" width="124" height="51"><strong>Тип</strong></th>
            <th class="xl66" width="81"><strong>Толщина, мм</strong></th>
            <th class="xl65" width="81"><strong>Габаритная ширина, мм</strong></th>
            <th class="xl65" width="81"><strong>Монтажная ширина,мм&nbsp;</strong></th>
            <th class="xl65" width="81"><strong>Вес 1 м.п.,кг</strong></th>
            <th class="xl65" width="81"><strong>Вес 1м.кв.,кг</strong></th>
            <th class="xl67" width="181"><strong>Стоимость 1м2, руб&nbsp;</strong></th>
          </tr>
          <tr height="17">
            <td class="xl71" rowspan="3" height="51">ССм10</td>
            <td class="xl68">0,5</td>
            <td class="xl69">1150</td>
            <td class="xl69">1100</td>
            <td class="xl69">1,668</td>
            <td class="xl70">1,45</td>
            <td class="xl72" rowspan="3" width="181"><span style="color: #ff0000;">Наличие и цены уточняйте в отделе продаж</span></td>
          </tr>
          <tr height="17">
            <td class="xl68" height="17">0,6</td>
            <td class="xl69">1150</td>
            <td class="xl69">1100</td>
            <td class="xl69">2,0016</td>
            <td class="xl70">1,74</td>
          </tr>
          <tr height="17">
            <td class="xl68" height="17">0,8</td>
            <td class="xl69">1150</td>
            <td class="xl69">1100</td>
            <td class="xl69">2,6688</td>
            <td class="xl70">2,32</td>
          </tr>
          </tbody>
        </table>
      </div>
      <p class="proflist_img"><img src="/images/ccm10.jpg" alt="Алюминиевый профнастил тип ССм10" width="640" /></p>
      <p>Профнастил с высотой гофры&nbsp;10 мм, ширина листа габаритная 1150 мм, ширина листа полезная 1100 мм, толщина листа - 0,50 - 0,8 мм, длина листа 1,5 &ndash; 12 м. Применяется, как стеновой и облицовочный материал для стен, перегородок, ограждений, а также используется как кровельный материал в жилищном строительстве. Минимально возможный удельный вес при достаточной прочности.</p>
      <h2>Тип С10</h2>
      <div class="proflistsSection_table">
        <table border="0" cellspacing="0" cellpadding="0" width="710">
          <tbody>
          <tr height="51">
            <th class="xl65" width="124" height="51"><strong>Тип</strong></th>
            <th class="xl66" width="81"><strong>Толщина, мм</strong></th>
            <th class="xl65" width="81"><strong>Габаритная ширина, мм</strong></th>
            <th class="xl65" width="81"><strong>Монтажная ширина,мм&nbsp;</strong></th>
            <th class="xl65" width="81"><strong>Вес 1 м.п.,кг</strong></th>
            <th class="xl65" width="81"><strong>Вес 1м.кв.,кг</strong></th>
            <th class="xl67" width="181"><strong>Стоимость 1м2, руб&nbsp;</strong></th>
          </tr>
          <tr height="17">
            <td class="xl71" rowspan="3" height="51">С10</td>
            <td class="xl68">0,5</td>
            <td class="xl69">1130</td>
            <td class="xl69">1100</td>
            <td class="xl69">1,67</td>
            <td class="xl70">1,48</td>
            <td class="xl72" rowspan="3" width="181"><span style="color: #ff0000;">Наличие и цены уточняйте в отделе продаж</span></td>
          </tr>
          <tr height="17">
            <td class="xl68" height="17">0,6</td>
            <td class="xl69">1130</td>
            <td class="xl69">1100</td>
            <td class="xl69">2,01</td>
            <td class="xl70">1,78</td>
          </tr>
          <tr height="17">
            <td class="xl68" height="17">0,7</td>
            <td class="xl69">1130</td>
            <td class="xl69">1100</td>
            <td class="xl69">2,34</td>
            <td class="xl70">2,07</td>
          </tr>
          </tbody>
        </table>
      </div>
      <p class="proflist_img"><img src="/images/с10.jpg" alt="Алюминиевый профиль Тип С10" width="640" /></p>
      <p>Профнастил С10 применяется, как стеновой и облицовочный материал для стен, при возведении ограждений и заборов, а также используется, как кровельный материал в жилищном строительстве. Он обладает минимально возможным удельным весом при достаточной прочности.</p>
      <h2>Тип С8</h2>
      <div class="proflistsSection_table">
        <table border="0" cellspacing="0" cellpadding="0" width="710">
          <tbody>
          <tr height="51">
            <th class="xl65" width="124" height="51"><strong>Тип</strong></th>
            <th class="xl66" width="81"><strong>Толщина, мм</strong></th>
            <th class="xl65" width="81"><strong>Габаритная ширина, мм</strong></th>
            <th class="xl65" width="81"><strong>Монтажная ширина,мм&nbsp;</strong></th>
            <th class="xl65" width="81"><strong>Вес 1 м.п.,кг</strong></th>
            <th class="xl65" width="81"><strong>Вес 1м.кв.,кг</strong></th>
            <th class="xl67" width="181"><strong>Стоимость 1м2, руб&nbsp;</strong></th>
          </tr>
          <tr height="17">
            <td class="xl71" rowspan="3" height="51">С8</td>
            <td class="xl68">0,5</td>
            <td class="xl69">1200</td>
            <td class="xl69">1150</td>
            <td class="xl69">1,67</td>
            <td class="xl70">1,4</td>
            <td class="xl72" rowspan="3" width="181"><span style="color: #ff0000;">Наличие и цены уточняйте в отделе продаж</span></td>
          </tr>
          <tr height="17">
            <td class="xl68" height="17">0,6</td>
            <td class="xl69">1200</td>
            <td class="xl69">1150</td>
            <td class="xl69">2,01</td>
            <td class="xl70">1,67</td>
          </tr>
          <tr height="17">
            <td class="xl68" height="17">0,7</td>
            <td class="xl69">1200</td>
            <td class="xl69">1150</td>
            <td class="xl69">2,34</td>
            <td class="xl70">1,95</td>
          </tr>
          </tbody>
        </table>
      </div>
      <p class="proflist_img"><img src="/images/с8.jpg" alt="Алюминиевый профиль Тип С8" width="640" /></p>
      <p>Профнастил С8 - универсальный материал широко применяемый при облицовке фасадов и монтаже легких прочных заборов. Декоративные качества и достаточная жесткость листа позволяют успешно использовать его для, так называемого, быстрого строительства. Жесткость листа достигается, благодаря специальным размерам и форме волны гофра, похожей в разрезе на трапецию.</p>
      <p>&nbsp;</p>
      <p><a class="gost" href="/teh_doc/tu-profili-listoviye-gnutiye">Технические условия: профили листовые гнутые с трапецевидными гофрами для строительства из алюминиевого сплава марки АМГ2</a></p>
      </div>
		</div>

		<?= $this->render('/components/orderProcedure', array('currentPage' => $currentPage)) ?>

		<?= $this->render('/components/orderForm') ?>

    <?= $this->render('/components/domainFooter' , array('currentBranch' => $currentBranch)) ?>

	</div>
</div>
