<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\ArrayHelper;
use common\models\LoginForm;
use common\models\User;
use common\models\Slices;
use common\models\Subdomen;
use common\models\Pages;
use common\models\PagesSubdomenSeo;
use common\models\Branch;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use backend\components\AllParams;

class CustomController extends Controller
{

  public function actionIndex()
  {
    return $this->render('index.php');
  }

  public function actionCustom()
  {
    function getText($region)
    {
      $contact_out = '';
      
      $footer_msk = '<div class="delivery_table"><p>Срок доставки: 2 дня.</p><h2>Стоимость доставки</h2><div class="delivery_table_block"><table><tr><th colspan="8">Максимальная стоимость доставки за 1 кг при весе всего груза (кг)</th><th rowspan="2">Минимальная<br/>стоимость</th></tr><tr align="center"><td>до 150</td><td>150 - 300</td><td>300 - 800</td><td>800 - 1500</td><td>1500 - 2000</td><td>2000 - 3000</td><td>3000 - 5000</td><td>5000 - 10000</td></tr><tr><td>6,70<span class="rub">a</span></td><td>6,50<span class="rub">a</span></td><td>6,30<span class="rub">a</span></td><td>6,20<span class="rub">a</span></td><td>6,00<span class="rub">a</span></td><td>5,80<span class="rub">a</span></td><td>5,60<span class="rub">a</span></td><td>5,40<span class="rub">a</span></td><td>310<span class="rub">a</span></td></tr></table></div><div class="delivery_table_block"><table><tr><th colspan="8">Максимальная стоимость доставки за 1 м<sup><small>3</small></sup> при объеме всего груза (м<sup><small>3</small></sup>)</th><th rowspan="2">Минимальная<br/>стоимость</th></tr><tr align="center"><td>до 0,6</td><td>0,6 - 1,3</td><td>1,3 - 4</td><td>4 - 7</td><td>7 - 10</td><td>10 - 15</td><td>15 - 25</td><td>25 - 44</td></tr><tr><td>1680<span class="rub">a</span></td><td>1630<span class="rub">a</span></td><td>1580<span class="rub">a</span></td><td>1550<span class="rub">a</span></td><td>1500<span class="rub">a</span></td><td>1450<span class="rub">a</span></td><td>1400р.</td><td>1350<span class="rub">a</span></td><td>310<span class="rub">a</span></td></tr></table></div></div>';

	$footer_samara = '<div class="delivery_table"><p>Свой заказ можно забрать в день изготовления. Если товар находится в наличии, то забрать его можно в день заказа.</p></div>';

	$footer_chelyabinsk = '<div class="delivery_table"><p>Срок доставки: 4 дня.</p><div class="delivery_table_block"><table><tr><th colspan="8">Максимальная стоимость доставки за 1 кг при весе всего груза (кг)</th><th rowspan="2">Минимальная<br/>стоимость</th></tr><tr align="center"><td>до 150</td><td>150 - 300</td><td>300 - 800</td><td>800 - 1500</td><td>1500 - 2000</td><td>2000 - 3000</td><td>3000 - 5000</td><td>5000 - 10000</td></tr><tr><td>8,60<span class="rub">a</span></td><td>8,20<span class="rub">a</span></td><td>8,00<span class="rub">a</span></td><td>7,80<span class="rub">a</span></td><td>7,60<span class="rub">a</span></td><td>7,40<span class="rub">a</span></td><td>7,10<span class="rub">a</span></td><td>6,80<span class="rub">a</span></td><td>340<span class="rub">a</span></td></tr></table></div><div class="delivery_table_block"><table><tr><th colspan="8">Максимальная стоимость доставки за 1 м<sup><small>3</small></sup> при объеме всего груза (м<sup><small>3</small></sup>)</th><th rowspan="2">Минимальная<br/>стоимость</th></tr><tr align="center"><td>до 0,6</td><td>0,6 - 1,3</td><td>1,3 - 4</td><td>4 - 7</td><td>7 - 10</td><td>10 - 15</td><td>15 - 25</td><td>25 - 44</td></tr><tr><td>2150<span class="rub">a</span></td><td>2050<span class="rub">a</span></td><td>2000<span class="rub">a</span></td><td>1950<span class="rub">a</span></td><td>1900<span class="rub">a</span></td><td>1850<span class="rub">a</span></td><td>1780<span class="rub">a</span></td><td>1700<span class="rub">a</span></td><td>340<span class="rub">a</span></td></tr></table></div></div>';

	$footer_perm = '<div class="delivery_table"><p>Срок доставки: 3 дня.</p><h2>Стоимость доставки</h2><div class="delivery_table_block"><table><tr><th colspan="8">Максимальная стоимость доставки за 1 кг при весе всего груза (кг)</th><th rowspan="2">Минимальная<br/>стоимость</th></tr><tr align="center"><td>до 150</td><td>150 - 300</td><td>300 - 800</td><td>800 - 1500</td><td>1500 - 2000</td><td>2000 - 3000</td><td>3000 - 5000</td><td>5000 - 10000</td></tr><tr><td>8,00<span class="rub">a</span></td><td>7,80<span class="rub">a</span></td><td>7,50<span class="rub">a</span></td><td>7,40<span class="rub">a</span></td><td>7,20<span class="rub">a</span></td><td>7,00<span class="rub">a</span></td><td>6,80<span class="rub">a</span></td><td>6,50<span class="rub">a</span></td><td>350<span class="rub">a</span></td></tr></table></div><div class="delivery_table_block"><table><tr><th colspan="8">Максимальная стоимость доставки за 1 м<sup><small>3</small></sup> при объеме всего груза (м<sup><small>3</small></sup>)</th><th rowspan="2">Минимальная<br/>стоимость</th></tr><tr align="center"><td>до 0,6</td><td>0,6 - 1,3</td><td>1,3 - 4</td><td>4 - 7</td><td>7 - 10</td><td>10 - 15</td><td>15 - 25</td><td>25 - 44</td></tr><tr><td>2010<span class="rub">a</span></td><td>1960<span class="rub">a</span></td><td>1880<span class="rub">a</span></td><td>1850<span class="rub">a</span></td><td>1800<span class="rub">a</span></td><td>1750<span class="rub">a</span></td><td>1700<span class="rub">a</span></td><td>1630<span class="rub">a</span></td><td>350<span class="rub">a</span></td></tr></table></div></div>';

	$footer_volgograd = '<div class="delivery_table"><p>Срок доставки: 4 дня.</p><h2>Стоимость доставки</h2><div class="delivery_table_block"><table><tr><th colspan="8">Максимальная стоимость доставки за 1 кг при весе всего груза (кг)</th><th rowspan="2">Минимальная<br/>стоимость</th></tr><tr align="center"><td>до 150</td><td>150 - 300</td><td>300 - 800</td><td>800 - 1500</td><td>1500 - 2000</td><td>2000 - 3000</td><td>3000 - 5000</td><td>5000 - 10000</td></tr><tr><td>7,00<span class="rub">a</span></td><td>6,70<span class="rub">a</span></td><td>6,50<span class="rub">a</span></td><td>6,40<span class="rub">a</span></td><td>6,20<span class="rub">a</span></td><td>6,00<span class="rub">a</span></td><td>5,80<span class="rub">a</span></td><td>5,60<span class="rub">a</span></td><td>350<span class="rub">a</span></td></tr></table></div><div class="delivery_table_block"><table><tr><th colspan="8">Максимальная стоимость доставки за 1 м<sup><small>3</small></sup> при объеме всего груза (м<sup><small>3</small></sup>)</th><th rowspan="2">Минимальная<br/>стоимость</th></tr><tr align="center"><td>до 0,6</td><td>0,6 - 1,3</td><td>1,3 - 4</td><td>4 - 7</td><td>7 - 10</td><td>10 - 15</td><td>15 - 25</td><td>25 - 44</td></tr><tr><td>1760<span class="rub">a</span></td><td>1680<span class="rub">a</span></td><td>1630<span class="rub">a</span></td><td>1600<span class="rub">a</span></td><td>1550<span class="rub">a</span></td><td>1500<span class="rub">a</span></td><td>1450<span class="rub">a</span></td><td>1400<span class="rub">a</span></td><td>350<span class="rub">a</span></td></tr></table></div></div>';

	$footer_kazan = '<div class="delivery_table"><p>Срок доставки: 2 дня.</p><h2>Стоимость доставки</h2><div class="delivery_table_block"><table><tr><th colspan="8">Максимальная стоимость доставки за 1 кг при весе всего груза (кг)</th><th rowspan="2">Минимальная<br/>стоимость</th></tr><tr align="center"><td>до 150</td><td>150 - 300</td><td>300 - 800</td><td>800 - 1500</td><td>1500 - 2000</td><td>2000 - 3000</td><td>3000 - 5000</td><td>5000 - 10000</td></tr><tr><td>5,60<span class="rub">a</span></td><td>5,40<span class="rub">a</span></td><td>5,20<span class="rub">a</span></td><td>5,10<span class="rub">a</span></td><td>5,00<span class="rub">a</span></td><td>4,90<span class="rub">a</span></td><td>4,70<span class="rub">a</span></td><td>4,50<span class="rub">a</span></td><td>350<span class="rub">a</span></td></tr></table></div><div class="delivery_table_block"><table><tr><th colspan="8">Максимальная стоимость доставки за 1 м<sup><small>3</small></sup> при объеме всего груза (м<sup><small>3</small></sup>)</th><th rowspan="2">Минимальная<br/>стоимость</th></tr><tr align="center"><td>до 0,6</td><td>0,6 - 1,3</td><td>1,3 - 4</td><td>4 - 7</td><td>7 - 10</td><td>10 - 15</td><td>15 - 25</td><td>25 - 44</td></tr><tr><td>1430<span class="rub">a</span></td><td>1380<span class="rub">a</span></td><td>1330<span class="rub">a</span></td><td>1300<span class="rub">a</span></td><td>1270<span class="rub">a</span></td><td>1240<span class="rub">a</span></td><td>1190<span class="rub">a</span></td><td>1140<span class="rub">a</span></td><td>350<span class="rub">a</span></td></tr></table></div></div>';

	$footer_tula = '<div class="delivery_table"><p>Срок доставки: 4 дня.</p><h2>Стоимость доставки</h2><div class="delivery_table_block"><table><tr><th colspan="8">Максимальная стоимость доставки за 1 кг при весе всего груза (кг)</th><th rowspan="2">Минимальная<br/>стоимость</th></tr><tr align="center"><td>до 150</td><td>150 - 300</td><td>300 - 800</td><td>800 - 1500</td><td>1500 - 2000</td><td>2000 - 3000</td><td>3000 - 5000</td><td>5000 - 10000</td></tr><tr><td>12,10<span class="rub">a</span></td><td>11,60<span class="rub">a</span></td><td>11,30<span class="rub">a</span></td><td>11,10<span class="rub">a</span></td><td>10,80<span class="rub">a</span></td><td>10,50<span class="rub">a</span></td><td>10,10<span class="rub">a</span></td><td>9,70<span class="rub">a</span></td><td>380<span class="rub">a</span></td></tr></table></div><div class="delivery_table_block"><table><tr><th colspan="8">Максимальная стоимость доставки за 1 м<sup><small>3</small></sup> при объеме всего груза (м<sup><small>3</small></sup>)</th><th rowspan="2">Минимальная<br/>стоимость</th></tr><tr align="center"><td>до 0,6</td><td>0,6 - 1,3</td><td>1,3 - 4</td><td>4 - 7</td><td>7 - 10</td><td>10 - 15</td><td>15 - 25</td><td>25 - 44</td></tr><tr><td>3130<span class="rub">a</span></td><td>3000<span class="rub">a</span></td><td>2920<span class="rub">a</span></td><td>2870<span class="rub">a</span></td><td>2790<span class="rub">a</span></td><td>2710<span class="rub">a</span></td><td>2610<span class="rub">a</span></td><td>2510<span class="rub">a</span></td><td>380<span class="rub">a</span></td></tr></table></div></div>';

	$footer_ufa = '<div class="delivery_table"><p>Срок доставки: 2 дня.</p><h2>Стоимость доставки</h2><div class="delivery_table_block"><table><tr><th colspan="8">Максимальная стоимость доставки за 1 кг при весе всего груза (кг)</th><th rowspan="2">Минимальная<br/>стоимость</th></tr><tr align="center"><td>до 150</td><td>150 - 300</td><td>300 - 800</td><td>800 - 1500</td><td>1500 - 2000</td><td>2000 - 3000</td><td>3000 - 5000</td><td>5000 - 10000</td></tr><tr><td>5,10<span class="rub">a</span></td><td>4,90<span class="rub">a</span></td><td>4,80<span class="rub">a</span></td><td>4,70<span class="rub">a</span></td><td>4,60<span class="rub">a</span></td><td>4,50<span class="rub">a</span></td><td>4,30<span class="rub">a</span></td><td>4,10<span class="rub">a</span></td><td>350<span class="rub">a</span></td></tr></table></div><div class="delivery_table_block"><table><tr><th colspan="8">Максимальная стоимость доставки за 1 м<sup><small>3</small></sup> при объеме всего груза (м<sup><small>3</small></sup>)</th><th rowspan="2">Минимальная<br/>стоимость</th></tr><tr align="center"><td>до 0,6</td><td>0,6 - 1,3</td><td>1,3 - 4</td><td>4 - 7</td><td>7 - 10</td><td>10 - 15</td><td>15 - 25</td><td>25 - 44</td></tr><tr><td>1290<span class="rub">a</span></td><td>1240<span class="rub">a</span></td><td>1210<span class="rub">a</span></td><td>1180<span class="rub">a</span></td><td>1150<span class="rub">a</span></td><td>1130<span class="rub">a</span></td><td>1080<span class="rub">a</span></td><td>1030<span class="rub">a</span></td><td>350<span class="rub">a</span></td></tr></table></div></div>';

	$footer_rostov = '<div class="delivery_table"><p>Срок доставки: 4 дня.</p><h2>Стоимость доставки</h2><div class="delivery_table_block"><table><tr><th colspan="8">Максимальная стоимость доставки за 1 кг при весе всего груза (кг)</th><th rowspan="2">Минимальная<br/>стоимость</th></tr><tr align="center"><td>до 150</td><td>150 - 300</td><td>300 - 800</td><td>800 - 1500</td><td>1500 - 2000</td><td>2000 - 3000</td><td>3000 - 5000</td><td>5000 - 10000</td></tr><tr><td>8,00<span class="rub">a</span></td><td>7,70<span class="rub">a</span></td><td>7,50<span class="rub">a</span></td><td>7,40<span class="rub">a</span></td><td>7,20<span class="rub">a</span></td><td>7,00<span class="rub">a</span></td><td>6,80<span class="rub">a</span></td><td>6,50<span class="rub">a</span></td><td>310<span class="rub">a</span></td></tr></table></div><div class="delivery_table_block"><table><tr><th colspan="8">Максимальная стоимость доставки за 1 м<sup><small>3</small></sup> при объеме всего груза (м<sup><small>3</small></sup>)</th><th rowspan="2">Минимальная<br/>стоимость</th></tr><tr align="center"><td>до 0,6</td><td>0,6 - 1,3</td><td>1,3 - 4</td><td>4 - 7</td><td>7 - 10</td><td>10 - 15</td><td>15 - 25</td><td>25 - 44</td></tr><tr><td>2010<span class="rub">a</span></td><td>1930<span class="rub">a</span></td><td>1880<span class="rub">a</span></td><td>1850<span class="rub">a</span></td><td>1800<span class="rub">a</span></td><td>1750<span class="rub">a</span></td><td>1700<span class="rub">a</span></td><td>1630<span class="rub">a</span></td><td>310<span class="rub">a</span></td></tr></table></div></div>';

	$footer_spb = '<div class="delivery_table"><p>Срок доставки: 4 дня.</p><h2>Стоимость доставки</h2><div class="delivery_table_block"><table><tr><th colspan="8">Максимальная стоимость доставки за 1 кг при весе всего груза (кг)</th><th rowspan="2">Минимальная<br/>стоимость</th></tr><tr align="center"><td>до 150</td><td>150 - 300</td><td>300 - 800</td><td>800 - 1500</td><td>1500 - 2000</td><td>2000 - 3000</td><td>3000 - 5000</td><td>5000 - 10000</td></tr><tr><td>7,90<span class="rub">a</span></td><td>7,60<span class="rub">a</span></td><td>7,40<span class="rub">a</span></td><td>7,30<span class="rub">a</span></td><td>7,10<span class="rub">a</span></td><td>6,90<span class="rub">a</span></td><td>6,70<span class="rub">a</span></td><td>6,40<span class="rub">a</span></td><td>370<span class="rub">a</span></td></tr></table></div><div class="delivery_table_block"><table><tr><th colspan="8">Максимальная стоимость доставки за 1 м<sup><small>3</small></sup> при объеме всего груза (м<sup><small>3</small></sup>)</th><th rowspan="2">Минимальная<br/>стоимость</th></tr><tr align="center"><td>до 0,6</td><td>0,6 - 1,3</td><td>1,3 - 4</td><td>4 - 7</td><td>7 - 10</td><td>10 - 15</td><td>15 - 25</td><td>25 - 44</td></tr><tr><td>1980<span class="rub">a</span></td><td>1900<span class="rub">a</span></td><td>1850<span class="rub">a</span></td><td>1830<span class="rub">a</span></td><td>1780<span class="rub">a</span></td><td>1730<span class="rub">a</span></td><td>1680<span class="rub">a</span></td><td>1600<span class="rub">a</span></td><td>370<span class="rub">a</span></td></tr></table></div></div>';

	$footer_nn = '<div class="delivery_table"><p>Срок доставки: 3 дня.</p><h2>Стоимость доставки</h2><div class="delivery_table_block"><table><tr><th colspan="8">Максимальная стоимость доставки за 1 кг при весе всего груза (кг)</th><th rowspan="2">Минимальная<br/>стоимость</th></tr><tr align="center"><td>до 150</td><td>150 - 300</td><td>300 - 800</td><td>800 - 1500</td><td>1500 - 2000</td><td>2000 - 3000</td><td>3000 - 5000</td><td>5000 - 10000</td></tr><tr><td>8,70<span class="rub">a</span></td><td>8,50<span class="rub">a</span></td><td>8,10<span class="rub">a</span></td><td>7,90<span class="rub">a</span></td><td>7,70<span class="rub">a</span></td><td>7,50<span class="rub">a</span></td><td>7,20<span class="rub">a</span></td><td>6,90<span class="rub">a</span></td><td>350<span class="rub">a</span></td></tr></table></div><div class="delivery_table_block"><table><tr><th colspan="8">Максимальная стоимость доставки за 1 м<sup><small>3</small></sup> при объеме всего груза (м<sup><small>3</small></sup>)</th><th rowspan="2">Минимальная<br/>стоимость</th></tr><tr align="center"><td>до 0,6</td><td>0,6 - 1,3</td><td>1,3 - 4</td><td>4 - 7</td><td>7 - 10</td><td>10 - 15</td><td>15 - 25</td><td>25 - 44</td></tr><tr><td>2180<span class="rub">a</span></td><td>2130<span class="rub">a</span></td><td>2030<span class="rub">a</span></td><td>1980<span class="rub">a</span></td><td>1930<span class="rub">a</span></td><td>1880<span class="rub">a</span></td><td>1800<span class="rub">a</span></td><td>1730<span class="rub">a</span></td><td>350<span class="rub">a</span></td></tr></table></div></div>';

	$footer_ekb = '<div class="delivery_table"><p>Срок доставки: 4 дня.</p><h2>Стоимость доставки</h2><div class="delivery_table_block"><table><tr><th colspan="8">Максимальная стоимость доставки за 1 кг при весе всего груза (кг)</th><th rowspan="2">Минимальная<br/>стоимость</th></tr><tr align="center"><td>до 150</td><td>150 - 300</td><td>300 - 800</td><td>800 - 1500</td><td>1500 - 2000</td><td>2000 - 3000</td><td>3000 - 5000</td><td>5000 - 10000</td></tr><tr><td>8,90<span class="rub">a</span></td><td>8,50<span class="rub">a</span></td><td>8,30<span class="rub">a</span></td><td>8,10<span class="rub">a</span></td><td>7,90<span class="rub">a</span></td><td>7,70<span class="rub">a</span></td><td>7,40<span class="rub">a</span></td><td>7,10<span class="rub">a</span></td><td>320<span class="rub">a</span></td></tr></table></div><div class="delivery_table_block"><table><tr><th colspan="8">Максимальная стоимость доставки за 1 м<sup><small>3</small></sup> при объеме всего груза (м<sup><small>3</small></sup>)</th><th rowspan="2">Минимальная<br/>стоимость</th></tr><tr align="center"><td>до 0,6</td><td>0,6 - 1,3</td><td>1,3 - 4</td><td>4 - 7</td><td>7 - 10</td><td>10 - 15</td><td>15 - 25</td><td>25 - 44</td></tr><tr><td>2230<span class="rub">a</span></td><td>2130<span class="rub">a</span></td><td>2080<span class="rub">a</span></td><td>2030<span class="rub">a</span></td><td>1980<span class="rub">a</span></td><td>1930<span class="rub">a</span></td><td>1850<span class="rub">a</span></td><td>1780<span class="rub">a</span></td><td>320<span class="rub">a</span></td></tr></table></div></div>';

	$footer_nsk = '<div class="delivery_table"><p>Срок доставки: 5 дня.</p><h2>Стоимость доставки</h2><div class="delivery_table_block"><table><tr><th colspan="8">Максимальная стоимость доставки за 1 кг при весе всего груза (кг)</th><th rowspan="2">Минимальная<br/>стоимость</th></tr><tr align="center"><td>до 150</td><td>150 - 300</td><td>300 - 800</td><td>800 - 1500</td><td>1500 - 2000</td><td>2000 - 3000</td><td>3000 - 5000</td><td>5000 - 10000</td></tr><tr><td>14,80<span class="rub">a</span></td><td>14,10<span class="rub">a</span></td><td>13,80<span class="rub">a</span></td><td>13,50<span class="rub">a</span></td><td>13,20<span class="rub">a</span></td><td>12,80<span class="rub">a</span></td><td>12,40<span class="rub">a</span></td><td>11,90<span class="rub">a</span></td><td>380<span class="rub">a</span></td></tr></table></div><div class="delivery_table_block"><table><tr><th colspan="8">Максимальная стоимость доставки за 1 м<sup><small>3</small></sup> при объеме всего груза (м<sup><small>3</small></sup>)</th><th rowspan="2">Минимальная<br/>стоимость</th></tr><tr align="center"><td>до 0,6</td><td>0,6 - 1,3</td><td>1,3 - 4</td><td>4 - 7</td><td>7 - 10</td><td>10 - 15</td><td>15 - 25</td><td>25 - 44</td></tr><tr><td>3700<span class="rub">a</span></td><td>3530<span class="rub">a</span></td><td>3450<span class="rub">a</span></td><td>3380<span class="rub">a</span></td><td>3300<span class="rub">a</span></td><td>3200<span class="rub">a</span></td><td>3100<span class="rub">a</span></td><td>2980<span class="rub">a</span></td><td>380<span class="rub">a</span></td></tr></table></div></div>';

	$footer_omsk = '<div class="delivery_table"><p>Срок доставки: 5 дня.</p><h2>Стоимость доставки</h2><div class="delivery_table_block"><table><tr><th colspan="8">Максимальная стоимость доставки за 1 кг при весе всего груза (кг)</th><th rowspan="2">Минимальная<br/>стоимость</th></tr><tr align="center"><td>до 150</td><td>150 - 300</td><td>300 - 800</td><td>800 - 1500</td><td>1500 - 2000</td><td>2000 - 3000</td><td>3000 - 5000</td><td>5000 - 10000</td></tr><tr><td>12,90<span class="rub">a</span></td><td>12,40<span class="rub">a</span></td><td>12,10<span class="rub">a</span></td><td>11,90<span class="rub">a</span></td><td>11,60<span class="rub">a</span></td><td>11,30<span class="rub">a</span></td><td>10,90<span class="rub">a</span></td><td>10,50<span class="rub">a</span></td><td>380<span class="rub">a</span></td></tr></table></div><div class="delivery_table_block"><table><tr><th colspan="8">Максимальная стоимость доставки за 1 м<sup><small>3</small></sup> при объеме всего груза (м<sup><small>3</small></sup>)</th><th rowspan="2">Минимальная<br/>стоимость</th></tr><tr align="center"><td>до 0,6</td><td>0,6 - 1,3</td><td>1,3 - 4</td><td>4 - 7</td><td>7 - 10</td><td>10 - 15</td><td>15 - 25</td><td>25 - 44</td></tr><tr><td>3230<span class="rub">a</span></td><td>3100<span class="rub">a</span></td><td>3030<span class="rub">a</span></td><td>2980<span class="rub">a</span></td><td>2900<span class="rub">a</span></td><td>2830<span class="rub">a</span></td><td>2730<span class="rub">a</span></td><td>2630<span class="rub">a</span></td><td>380<span class="rub">a</span></td></tr></table></div></div>';

	$footer_tambov = '<div class="delivery_table"><p>Срок доставки: 4 дня.</p><h2>Стоимость доставки</h2><div class="delivery_table_block"><table><tr><th colspan="8">Максимальная стоимость доставки за 1 кг при весе всего груза (кг)</th><th rowspan="2">Минимальная<br/>стоимость</th></tr><tr align="center"><td>до 150</td><td>150 - 300</td><td>300 - 800</td><td>800 - 1500</td><td>1500 - 2000</td><td>2000 - 3000</td><td>3000 - 5000</td><td>5000 - 10000</td></tr><tr><td>10,30<span class="rub">a</span></td><td>9,80<span class="rub">a</span></td><td>9,60<span class="rub">a</span></td><td>9,40<span class="rub">a</span></td><td>9,20<span class="rub">a</span></td><td>8,90<span class="rub">a</span></td><td>8,60<span class="rub">a</span></td><td>8,30<span class="rub">a</span></td><td>390<span class="rub">a</span></td></tr></table></div><div class="delivery_table_block"><table><tr><th colspan="8">Максимальная стоимость доставки за 1 м<sup><small>3</small></sup> при объеме всего груза (м<sup><small>3</small></sup>)</th><th rowspan="2">Минимальная<br/>стоимость</th></tr><tr align="center"><td>до 0,6</td><td>0,6 - 1,3</td><td>1,3 - 4</td><td>4 - 7</td><td>7 - 10</td><td>10 - 15</td><td>15 - 25</td><td>25 - 44</td></tr><tr><td>2580<span class="rub">a</span></td><td>2450<span class="rub">a</span></td><td>2400<span class="rub">a</span></td><td>2350<span class="rub">a</span></td><td>2300<span class="rub">a</span></td><td>2230<span class="rub">a</span></td><td>2150р.</td><td>2080<span class="rub">a</span></td><td>390<span class="rub">a</span></td></tr></table></div></div>';

	$footer_kirov = '<div class="delivery_table"><p>Срок доставки: 3 дня.</p><h2>Стоимость доставки</h2><div class="delivery_table_block"><table><tr><th colspan="8">Максимальная стоимость доставки за 1 кг при весе всего груза (кг)</th><th rowspan="2">Минимальная<br/>стоимость</th></tr><tr align="center"><td>до 150</td><td>150 - 300</td><td>300 - 800</td><td>800 - 1500</td><td>1500 - 2000</td><td>2000 - 3000</td><td>3000 - 5000</td><td>5000 - 10000</td></tr><tr><td>10,00<span class="rub">a</span></td><td>9,50<span class="rub">a</span></td><td>9,30<span class="rub">a</span></td><td>9,10<span class="rub">a</span></td><td>8,90<span class="rub">a</span></td><td>8,60р.</td><td>8,30<span class="rub">a</span></td><td>8,00<span class="rub">a</span></td><td>390<span class="rub">a</span></td></tr></table></div><div class="delivery_table_block"><table><tr><th colspan="8">Максимальная стоимость доставки за 1 м<sup><small>3</small></sup> при объеме всего груза (м<sup><small>3</small></sup>)</th><th rowspan="2">Минимальная<br/>стоимость</th></tr><tr align="center"><td>до 0,6</td><td>0,6 - 1,3</td><td>1,3 - 4</td><td>4 - 7</td><td>7 - 10</td><td>10 - 15</td><td>15 - 25</td><td>25 - 44</td></tr><tr><td>2510<span class="rub">a</span></td><td>2380<span class="rub">a</span></td><td>2330<span class="rub">a</span></td><td>2280<span class="rub">a</span></td><td>2230<span class="rub">a</span></td><td>2150<span class="rub">a</span></td><td>2080<span class="rub">a</span></td><td>2000<span class="rub">a</span></td><td>390<span class="rub">a</span></td></tr></table></div></div>';

	$footer_tver = '<div class="delivery_table"><p>Срок доставки: 3 дня.</p><h2>Стоимость доставки</h2><div class="delivery_table_block"><table><tr><th colspan="8">Максимальная стоимость доставки за 1 кг при весе всего груза (кг)</th><th rowspan="2">Минимальная<br/>стоимость</th></tr><tr align="center"><td>до 150</td><td>150 - 300</td><td>300 - 800</td><td>800 - 1500</td><td>1500 - 2000</td><td>2000 - 3000</td><td>3000 - 5000</td><td>5000 - 10000</td></tr><tr><td>15,90<span class="rub">a</span></td><td>15,10<span class="rub">a</span></td><td>14,70<span class="rub">a</span></td><td>13,50<span class="rub">a</span></td><td>13,20<span class="rub">a</span></td><td>12,80<span class="rub">a</span></td><td>12,40<span class="rub">a</span></td><td>11,90<span class="rub">a</span></td><td>350<span class="rub">a</span></td></tr></table></div><div class="delivery_table_block"><table><tr><th colspan="8">Максимальная стоимость доставки за 1 м<sup><small>3</small></sup> при объеме всего груза (м<sup><small>3</small></sup>)</th><th rowspan="2">Минимальная<br/>стоимость</th></tr><tr align="center"><td>до 0,6</td><td>0,6 - 1,3</td><td>1,3 - 4</td><td>4 - 7</td><td>7 - 10</td><td>10 - 15</td><td>15 - 25</td><td>25 - 44</td></tr><tr><td>3980<span class="rub">a</span></td><td>3780<span class="rub">a</span></td><td>3680<span class="rub">a</span></td><td>3380<span class="rub">a</span></td><td>3300<span class="rub">a</span></td><td>3200<span class="rub">a</span></td><td>3100<span class="rub">a</span></td><td>2980<span class="rub">a</span></td><td>350<span class="rub">a</span></td></tr></table></div></div>';  


	if ($region == '') {
		$contact_out = $footer_msk;
	} else {
		switch ($region) {
			case 'samara': $contact_out = $footer_samara; break;
			case 'chelyabinsk': $contact_out = $footer_chelyabinsk; break;
			case 'perm': $contact_out = $footer_perm; break;
			case 'volgograd': $contact_out = $footer_volgograd; break;
			case 'kazan': $contact_out = $footer_kazan; break;
			case 'tula': $contact_out = $footer_tula; break;
			case 'ufa': $contact_out = $footer_ufa; break;
			case 'rostov': $contact_out = $footer_rostov; break;
			case 'spb': $contact_out = $footer_spb; break;
			case 'nn': $contact_out = $footer_nn; break;
			case 'ekb': $contact_out = $footer_ekb; break;
			case 'nsk': $contact_out = $footer_nsk; break;
			case 'omsk': $contact_out = $footer_omsk; break;
			case 'tambov': $contact_out = $footer_tambov; break;
			case 'kirov': $contact_out = $footer_kirov; break;
			case 'tver': $contact_out =  $footer_tver; break;
		}
	}

      return $contact_out;
    }

    $subdomensAll = Subdomen::find()->all();

    foreach (Pages::find()->where(['id' => 48])->all() as $page){

      foreach ($subdomensAll as $subdomen){
        $query = PagesSubdomenSeo::find()->where(['subdomen_alias' => $subdomen->alias, 'page_id' => $page->id, 'is_slice' => false]);
        $pageSubdomenSeo = null;

        if ($query->exists()){
          $pageSubdomenSeo = $query->one();
          $pageSubdomenSeo->header = 'Условия доставки в филиал в ' . $subdomen->name_dec;
          $pageSubdomenSeo->text_1 = getText($subdomen->alias);
          // $pageSubdomenSeo->text_2 = getText($subdomen->alias);
          // $pageSubdomenSeo->text_3 = getText($subdomen->alias);
          // $pageSubdomenSeo->text_4 = getText($subdomen->alias);
        } else {
          $pageSubdomenSeo = new PagesSubdomenSeo();
          $pageSubdomenSeo->subdomen_alias = $subdomen->alias;
          $pageSubdomenSeo->page_id = $page->id;
          $pageSubdomenSeo->page_type = $page->type;
          $pageSubdomenSeo->is_slice = false;
          $pageSubdomenSeo->header = 'Условия доставки в филиал в ' . $subdomen->name_dec;
          $pageSubdomenSeo->text_1 = getText($subdomen->alias);
          // $pageSubdomenSeo->text_2 = getText($subdomen->alias);
          // $pageSubdomenSeo->text_3 = getText($subdomen->alias);
          // $pageSubdomenSeo->text_4 = getText($subdomen->alias);

        }

        $pageSubdomenSeo->save(false);
      }
    }

    // foreach (Slices::find()->where(['parent_alias' => 'ugolok'])->all() as $slice){
    //   $currentPageSeo = PagesSubdomenSeo::find()->where(['subdomen_alias' => '', 'page_id' => $slice->id, 'page_type' => 'slice'])->one();

    //   if (array_key_exists($slice->alias, $textList)){

    //     $currentPageSeo->text_1 = array_key_exists(1, $textList[$slice->alias]) ? $textList[$slice->alias][1] : '';
    //     $currentPageSeo->text_2 = array_key_exists(2, $textList[$slice->alias]) ? $textList[$slice->alias][2] : '';
    //     $currentPageSeo->text_3 = array_key_exists(3, $textList[$slice->alias]) ? $textList[$slice->alias][3] : '';
    //     $currentPageSeo->save();
    //   }
    // }

    // echo '<pre>';
    // print_r($newSeo);
    // exit;

    echo "конец";
    exit;
  }

  // добавдение text_1 ал. лентам
  // {
  //   $textList = [
  //     'а7' => '<p>Сплав А7&nbsp;означает первичный алюминий, содержащий небольшое количество примесей, около 0.3%. Цифровая маркировка после буквы&nbsp;А показывает чистоту основного металла в&nbsp;процентном выражении. Материал имеет следующий химический состав:</p>
  //     <ul>
  //     <li>алюминий&nbsp;&mdash; 99.7%;</li>	
  //     <li>медь&nbsp;&mdash; 0.01%;</li>
  //     <li>магний&nbsp;&mdash; 0.02%;</li>
  //     <li>марганец&nbsp;&mdash; 0.03%;</li>
  //     <li>кремний&nbsp;&mdash; 0.15%;</li>
  //     <li>железо&nbsp;&mdash; 0.16%;</li>
  //     <li>титан&nbsp;&mdash; 0.01%;</li>
  //     <li>цинк&nbsp;&mdash; 0.04%;</li>
  //     <li>галлий&nbsp;&mdash; 0.03%.</li>
  //     </ul>
  //     <p>Плотность сплава А7&nbsp;равна 2700&nbsp;кг/м при температуре 20&nbsp;градусов. Преимущества Алюминия А7&nbsp;выражаются в&nbsp;повышенной стойкости к&nbsp;коррозии и&nbsp;легкости механической обработки. Чтобы улучшить характеристики, металл подвергается специальной термической обработке. Алюминиевая лента сплава А7&nbsp;применяется в&nbsp;тепловой изоляции, пищевой и&nbsp;легкой промышленности. С&nbsp;ее&nbsp;помощью налаживают работу многих технологичных конструкций.</p>',
  //     'а6' => '<p><p>Алюминиевая лента сплава А6&nbsp;применяется в&nbsp;различных отраслях промышленности, а&nbsp;также в&nbsp;строительстве. Материал считается универсальным, и&nbsp;обладает высоким антикоррозийным свойством. Дополнительные преимущества сплава алюминия А6&nbsp;&mdash; это влагонепроницаемость и&nbsp;отличная теплопроводимость. Также, стоит отметить изоляционные качества ленты и&nbsp;полную химическую инертность. Материал огнестойкий, с&nbsp;наличием светоотражающих свойств. Благодаря гибкости, подходит для производства фольгированных изделий и&nbsp;упаковочного материала, включая емкости для хранения пищевых продуктов.</p></p>',
  //     'а5' => '<p>Лента из&nbsp;алюминия сплава А5&nbsp;выпускается в&nbsp;соответствии с&nbsp;ГОСТом 13726-97. Алюминиевая лента сплава А5&nbsp;&mdash; это тонкая алюминиевая полоса, которая активно используется во&nbsp;всех отраслях промышленности. В&nbsp;отдельных случаях ее&nbsp;окрашивают. Обладает отличными характеристиками. Алюминиевая лента сплава А5&nbsp;применяется в&nbsp;ремонтных и&nbsp;строительных работах, особенно при монтаже. Преимущества: пластичность, прочность, стойкость к&nbsp;агрессивной среде, способность к&nbsp;скручиванию без разрыва. Лента данного сплава поставляется в&nbsp;рулонах.</p>',
  //     'а0' => '<p>Лента сплава А0&nbsp;изготовлена из&nbsp;первичного алюминия. Обозначение А0&nbsp;говорит о&nbsp;технической чистоте алюминия, в&nbsp;котором содержится небольшое количество примесей. Цифра маркировки отображает процентное содержание основного металла и&nbsp;его чистоты. В&nbsp;состав алюминиевой ленты сплава А0&nbsp;входит&nbsp;99% алюминия, 0.05% меди, столько&nbsp;же магния и&nbsp;марганца, 0.95% кремния, 0.1% цинка и&nbsp;0.02% титана. Для улучшения характеристик, к&nbsp;металлу применяют метод термической обработки (отжиг), а&nbsp;также упрочение давлением. Алюминиевая лента из&nbsp;сплава А0&nbsp;применяется во&nbsp;многих отраслях промышленности в&nbsp;силу ряда преимуществ, а&nbsp;именно пластичность, прочность и&nbsp;огнестойкость.</p>',
  //     'ад0' => '<p>Сплав алюминия АД0 имеет в&nbsp;составе определенное количество дополнительных примесей, таких как железо, титан, медь, цинк, марганец, магний и&nbsp;кремний. Обработка ленты из&nbsp;сплава АД0 выполняется под давлением, о&nbsp;чем свидетельствует маркировка. Также применяется метод термической обработки. Такой металл легко формовать, а&nbsp;стойкость к&nbsp;коррозии добавляет преимущества. Алюминиевая лента сплав АД0 производится в&nbsp;соответствии с&nbsp;ГОСТом 13726-97, а&nbsp;ее&nbsp;химический состав соответствует ГОСТу 4784. Лента сплава АД0 отличается стойкостью к&nbsp;внешним воздействиям и&nbsp;долговечностью, хорошими механическими свойствами и&nbsp;преимущественными характеристиками. Очень легкий вес и&nbsp;отличная электропроводимость.</p>',
  //     'ад1' => '<p>Алюминиевая лента из&nbsp;сплава АД1 используется для различных производственных нужд, а&nbsp;также в&nbsp;строительстве. С&nbsp;помощью ленты данного сплава осуществляют гидроизоляцию трубопровода, изготавливают отливы и&nbsp;применяют в&nbsp;теплообменной аппаратуре. Лента не&nbsp;только отталкивает тепло, но&nbsp;и&nbsp;сохраняет его, поэтому подходит для систем отопления, холодильного оборудования. Незаменима при строительстве современных саун. Основные преимущества ленты сплава АД1: повышенная пластичность, стойкость к&nbsp;влаге, механическая прочность и&nbsp;электропроводность. Лента обладает устойчивостью ко&nbsp;всем химическим воздействиям.</p>',
  //     'ад00' => '<p>Алюминиевая лента АД00 изготавливается из&nbsp;сплава деформируемого технического алюминия. Сплав АД00 является главным материалом в&nbsp;производстве различных изделий, обрабатываемых давлением. Это штамповка, прессование, ковка, прокатка, экструзия и&nbsp;другие. Ленточные полосы сплава АД00 применяются в&nbsp;производстве штампованной продукции, герметизации стыков, термоизоляции трубопроводов. Может использоваться как упаковочный материал, но&nbsp;незаменим в&nbsp;производстве холодильного оборудования, а&nbsp;также в&nbsp;ремонте всевозможных агрегатов. Благодаря своей экологичности, ленты сплава АД00 нашли применение в&nbsp;пищевой промышленности. Главным преимуществом является прочность и&nbsp;высокая пластичность, теплопроводность и&nbsp;влагонепроницаемость.</p>',
  //     'мм' => '<p>Алюминиевый сплав&nbsp;ММ применяется для изготовления тонкой ленты, нашедшей применение во&nbsp;многих отраслях промышленности. Лента сплава&nbsp;ММ имеет достаточную прочность, хорошую теплопроводность и&nbsp;влагоустойчивость. Сам сплав получается путем непрерывного или частично непрерывного литья, который в&nbsp;дальнейшем идет на&nbsp;производство алюминиевой ленты. Алюминиевая лента из&nbsp;сплава&nbsp;ММ соответствует ГОСТу 13726-97 и&nbsp;содержит в&nbsp;составе дополнительные примеси в&nbsp;различном процентном выражении. Плотность составляет 2720&nbsp;кг/м3 при температуре 20&nbsp;градусов. Выпуск ленты достигается посредством холодной и&nbsp;горячей деформации.</p>',
  //     'д12' => '<p>Алюминиевая лента сплава Д12 отражает тепловое излучение, равно как и&nbsp;ультрафиолетовые лучи. В&nbsp;связи с&nbsp;этим лента Д12 активно применяется в&nbsp;работах с&nbsp;теплоизоляционными системами и&nbsp;оборудованием. Помимо этого, данная лента нашла применение и&nbsp;в&nbsp;других сферах в&nbsp;силу хорошей влагоустойчивости и&nbsp;теплоизоляции. Подходит для герметизации систем от&nbsp;агрессивных внешних воздействий. Сплав алюминия марки Д12 относится к&nbsp;классу стойких металлов. Антикоррозийное свойство достигается благодаря содержанию в&nbsp;составе кремния. Общее содержание примесей указано в&nbsp;ГОСТ 4784-2019.</p>',
  //     'амц' => '<p>Алюминиевая лента сплав Амц относится к&nbsp;группе наиболее востребованного металлопроката. Лента применяется в&nbsp;промышленности независимо от&nbsp;отрасли и&nbsp;типа хозяйства. Незаменима при монтажных работах в&nbsp;строительстве, а&nbsp;также в&nbsp;пищевом производстве. Характеристики ленты определяют целевое назначение, а&nbsp;поставляется продукт по&nbsp;ГОСТу 13726-97. Функциональные особенности ленты АМЦ зависят от&nbsp;технических параметров, одним из&nbsp;которых является толщина изделия. Обычно она варьирует в&nbsp;диапазоне до&nbsp;4.5&nbsp;мм, начиная с&nbsp;0,3&nbsp;мм. Легкий вес и&nbsp;пластичность становятся главными достоинствами алюминиевой ленты АМЦ, в&nbsp;связи с&nbsp;чем пользуется популярностью не&nbsp;только в&nbsp;промышленности, но&nbsp;и&nbsp;быту.</p>',
  //     'амцс' => '<p>Лента из&nbsp;алюминиевого сплава марки АМЦС производится абсолютно гладкой, без каких либо заусенцев. Главным достоинством материала является стойкость к&nbsp;коррозии и&nbsp;прочность. Хорошо выдерживает воздействие кислот и&nbsp;других агрессивных веществ. Широко применяется в&nbsp;строительстве и&nbsp;в&nbsp;промышленности различных отраслей, включая пищевое. Лента АМЦС обладает отличной пластичностью и&nbsp;проводит электрический ток. Прочность позволяет увеличить срок эксплуатации, а&nbsp;способность выдерживать температуру делает ее&nbsp;незаменимой. Сплав АМЦС для ленты включает в&nbsp;состав алюминий (98%) и&nbsp;другие примеси, такие как кремний, железо, марганец.</p>',
  //     'амг2' => '<p>Лента производится из&nbsp;деформируемого алюминиевого сплава марки АМГ2. Буквы на&nbsp;маркировке указывают на&nbsp;главные составляющие сплава, это алюминий и&nbsp;магний. Массовая доля магния обозначается цифрой 2. Алюминиевая лента АМГ2 широко применяется во&nbsp;всех сферах производства, и&nbsp;именно состав сплава делает ее&nbsp;столь востребованной. Основные преимущества материала&nbsp;&mdash; это антикоррозийное свойство и&nbsp;повышенная пластичность. Механическая обработка сплава проходит с&nbsp;легкостью, сваривается, как правило, аргонодуговым способом. За&nbsp;счет низкой пористости, шов при сварке не&nbsp;подвергается коррозии. Лента из&nbsp;алюминия АМГ2 считается наименее прочной и&nbsp;теплопроводной по&nbsp;сравнению с&nbsp;аналогами из&nbsp;алюминие-магниевой группы.</p>',
  //     'амг3' => '<p>Деформируемый сплав АМГ3 имеет хорошие показатели качества, а&nbsp;особенно стойкость к&nbsp;коррозии. Металл легко обрабатывается и&nbsp;обладает повышенной резистенцией на&nbsp;разрыв. Помимо алюминия, в&nbsp;состав сплава АМГ3 входит кремний, железо, марганец и&nbsp;магний. За&nbsp;счет присутствия в&nbsp;составе магния, сплав достигает оптимальную плотность при небольшой массе. Алюминиевая лента сплава АМГ3 имеет меньшую пластичность по&nbsp;сравнению с&nbsp;аналогичными изделиями из&nbsp;алюминия другой марки, зато превосходит по&nbsp;прочности и&nbsp;твердости. Лента выдерживает большие нагрузки и&nbsp;внешние негативные воздействия. Поставляется антикоррозийная лента АМГ3&nbsp;в рулонах с&nbsp;соответствующей маркировкой.</p>',
  //     'амг5' => '<p>Соотношение легирующих элементов алюминиевого сплава АМГ5 определяет его свойства и&nbsp;сферу применения. Путем холодной и&nbsp;горячей обработки из&nbsp;него производят алюминиевую ленту.</p>
  //     <p>Лента из&nbsp;алюминия сплава АМГ5 применяется в&nbsp;промышленности и&nbsp;во&nbsp;всех сферах народного хозяйства, по&nbsp;большей части благодаря характеристикам данного сплава. Лента весит намного меньше, хотя не&nbsp;уступает по&nbsp;прочности изделиям из&nbsp;сплавов других марок. Стойкость к&nbsp;коррозии и&nbsp;теплопроводность&nbsp;&mdash; основные преимущества ленты АМГ5. В&nbsp;своем составе материал имеет алюминий, кремний, железо, медь, титан, марганец, магний и&nbsp;бериллий. Каждый компонент добавляется в&nbsp;определенном процентном выражении, где на&nbsp;долю алюминия приходится до&nbsp;95%.</p>',
  //     'амг6' => '<p>Алюминиевая лента из&nbsp;сплава АМГ6 применяется для решения многих задач. Основная&nbsp;&mdash; защитная функция систем от&nbsp;коррозии и&nbsp;других внешних воздействий. Лентой АМГ6 защищает конструкции и&nbsp;приборы на&nbsp;промышленных объектах, сфера применения изделия весьма широка. Преимущественные характеристики ленты достигаются благодаря оптимальному составу алюминиевого сплава АМГ6, который дает материалу достаточную прочность, износостойкость, антикоррозийность и&nbsp;теплопроводность. Порог прочности данного сплава составляет 340&nbsp;МПа, а&nbsp;после отжига он&nbsp;не&nbsp;вступает в&nbsp;реакцию с&nbsp;кислотами и&nbsp;щелочами. На&nbsp;сегодняшний день, алюминиевая лента сплава АМГ6 востребована во&nbsp;всех отраслях производственной деятельности.</p>',
  //     'ав' => '<p>Алюминиевая лента из&nbsp;сплава марки&nbsp;АВ обладает повышенной прочностью за&nbsp;счет содержания большого количества магния и&nbsp;цинка. Марганец и&nbsp;хром в&nbsp;составе сплава усиливают стойкость к&nbsp;коррозии, повышают пластичность в&nbsp;горячем состоянии. В&nbsp;холодном состоянии сплав легко деформируется при условии предварительного отжига. После закалки, твердость металла достигает 65&nbsp;МПа. Сплав АВ&nbsp;обладает хорошими литейными свойствами, что позволяет получать качественную алюминиевую ленту. Алюминиевая лента&nbsp;АВ относится к&nbsp;группе высокопрочных изделий, нашедших применения в&nbsp;разных отраслях промышленности.</p>',
  //     'д1' => '<p>Алюминиевая лента Д1&nbsp;изготавливается в&nbsp;соответствии с&nbsp;ГОСТом 13726-97. Поставляется в&nbsp;рулонах различной ширины и&nbsp;длины. По&nbsp;способу технологического производства лента из&nbsp;алюминиевого сплава Д1&nbsp;может быть отожженная и&nbsp;горячекатанная. Алюминиевая лента из&nbsp;сплава Д1&nbsp;востребована в&nbsp;строительстве, машиностроении и&nbsp;пищевой промышленности. В&nbsp;коммунальном хозяйстве используется для термоизоляции трубопровода. К&nbsp;преимуществам ленты сплава Д1&nbsp;можно отнести стойкость к&nbsp;коррозии и&nbsp;способность защитить от&nbsp;воздействия магнитных полей. Легкий вес, пластичность и&nbsp;прочность делают ее&nbsp;незаменимым материалам в&nbsp;любых производственных сферах.</p>',
  //     'д16' => '<p>Алюминиевая лента сплава Д16 представляет собой изделие в&nbsp;виде полосы со&nbsp;светло-серым оттенком. Имеет матовую или блестящую поверхность. Поставляется в&nbsp;рулонах одинаковой формы с&nbsp;целостной структурой по&nbsp;всей длине. Ширина и&nbsp;толщина определяют основные габариты ленты. Согласно характеристикам и&nbsp;свойствам алюминиевого сплава Д16, достоинствами изделия считаются стойкость к&nbsp;коррозии, теплопроводность, электропроводимость и&nbsp;низкий удельный вес. Применяется в&nbsp;качестве изоляционного материала во&nbsp;многих отраслях промышленности. Подходит для теплоизоляции трубопровода и&nbsp;других инженерных коммуникаций. Способность выдерживать механические и&nbsp;температурные нагрузки делают алюминиевую ленту сплава Д16 востребованной на&nbsp;всех производственных участках.</p>',
  //     'вд1' => '<p>Обозначение ВД1 говорит о&nbsp;том, что материал относится к&nbsp;деформируемым сплавам алюминия. Из&nbsp;него изготавливают алюминиевую ленту, которая в&nbsp;дальнейшем используется в&nbsp;качестве защитных кожухов для разных инженерных систем. Алюминиевая лента сплав ВД1 нашла применение в&nbsp;нефтеперерабатывающих и&nbsp;газоперерабатывающих отраслях промышленности, а&nbsp;также применяется на&nbsp;объектах химического производства. Алюминиевая лента ВД1 обладает отличными эксплуатационными характеристиками, в&nbsp;частности химической и&nbsp;термической стойкостью. Идеально подходит для изоляции нефтепровода в&nbsp;условиях постоянной мерзлоты. Легко обрабатывается механически и&nbsp;является экологически безопасным материалом.</p>',
  //     '1105' => '<p>Алюминиевая лента 1105 усиливается нагартовкой, в&nbsp;результате чего улучшаются ее&nbsp;характеристики. Лента сплава 1105 способна выдерживать высокую нагрузку в&nbsp;условиях повышенной влажности, хорошо переносит резкий перепад температур. Используется при строительстве в&nbsp;качестве надежного теплоизоляционного материала, а&nbsp;также нашла применения в&nbsp;различных отраслях промышленности.</p>',
  //   ];

  //   foreach (Slices::find()->where(['parent_alias' => 'alyuminievye_lenty'])->all() as $slice){
  //     $currentPageSeo = PagesSubdomenSeo::find()->where(['subdomen_alias' => '', 'page_id' => $slice->id, 'page_type' => 'slice'])->one();
  //     $currentPageSeo->text_1 = array_key_exists($slice->alias, $textList) ? $textList[$slice->alias] : '';
  //     $currentPageSeo->save();
  //   }
  // }

  // создание крошек у срезов
  // {
      // foreach (Slices::find()->all() as $slice){
    //   $paramsList = (array)json_decode($slice->params);

    //   $paramNameList = [
    //     'alloy' => 'Сплав',
    //     'depth' => 'Толщина',
    //     // 'width' => 'Ширина',
    //     'curing' => 'Термообработка',
    //     'height' => 'Высота',
    //     'diameter' => 'Диаметр',
    //     // 'section' => 'section',
    //     'width' => 'Толщина стенки',
    //   ];

    //   if (count($paramsList) > 1 && $paramsList['type'] == 'tubes'){
    //     $currentParamKey = array_key_last($paramsList);

    //     if ($currentParamKey == 'section'){
    //       $slice->breadcrumbs_title = $paramsList[$currentParamKey];
    //     } else {
    //       $slice->breadcrumbs_title = $paramNameList[$currentParamKey] . ' ' . $paramsList[$currentParamKey];
  
    //       if ($currentParamKey == 'depth' || $currentParamKey == 'width' || $currentParamKey == 'diameter' || $currentParamKey == 'height'){
    //         $slice->breadcrumbs_title .= ' мм';
    //       }

    //       if ($currentParamKey == 'curing' && $paramsList[$currentParamKey] == 'без т/о'){
    //         $slice->breadcrumbs_title = 'Без т/о';
    //       }
    //     }
    //   }

    //   $slice->save();
    // }

  // }

  // создание PagesSubdomenSeo для срезов
  // {
  //   $allParams = new AllParams();

  //   $paramNameList = [
  //     'alloy' => 'сплав',
  //     'depth' => 'толщиной',
  //     'width' => 'шириной',
  //     'curing' => 'с термообработкой',
  //     // 'section' => 'section',
  //     'diameter' => 'диаметром',
  //     // 'width' => 'с толщиной стенки',
  //     'height' => 'высота',
  //   ];

  //   $subdomensAll = Subdomen::find()->all();

  //   foreach (Slices::find()->where(['parent_alias' => 'ugolok'])->all() as $slice){
  //     $paramsList = (array)json_decode($slice->params);
  //     $currentParamKey = array_key_last($paramsList);

  //     foreach($subdomensAll as $subdomen){
  //       $newSeo = new PagesSubdomenSeo();
  //       $newSeo->subdomen_alias = $subdomen->alias;
  //       $newSeo->page_id = $slice->id;
  //       $newSeo->page_type = 'slice';
  //       $newSeo->is_slice = true;

  //       if ($currentParamKey == 'section'){
  //         $newSeo->header = 'Алюминиевые уголки ' . $slice->name;
  //       } 
  //       // elseif ($currentParamKey == 'width' || $currentParamKey == 'diameter'){
  //       //   $valueList = explode('-', $paramsList[$currentParamKey]);
  //       //   $newSeo->header = 'Алюминиевые уголки ' . $paramNameList[$currentParamKey] . ' от ' . $valueList[0] . ' до ' . $valueList[1] . ' мм';
  //       // } 
  //       else {
  //         $newSeo->header = 'Алюминиевые уголки ' 
  //         . $paramNameList[$currentParamKey] 
  //         . ' ' 
  //         . $paramsList[$currentParamKey];
  
  //         if ($currentParamKey == 'depth' || $currentParamKey == 'width' || $currentParamKey == 'diameter' || $currentParamKey == 'height'){
  //           $newSeo->header .= ' мм';
  //         }
  //       }
  //       $newSeo->save(false);
  //     }
  //   }
  // }

  // создание срезов
  // {
    // $allParams = new AllParams();

    // $paramNameList = [
    //   'alloy' => 'alloy',
    //   'depth' => 'depth',
    //   'width' => 'width',
    //   'curing' => 'curing',
    //   'section' => 'section',
    //   'diameter' => 'diameter',
    //   'width_st' => 'width',
    //   'height' => 'height',
    // ];

    // foreach ($allParams->arrAlloys['profils']['profil_pryamougolnik'] as $key => $value){

    //   if (array_key_exists($key, $paramNameList)){
    //     $paramName = $paramNameList[$key];
  
    //     foreach ($value as $value1){
    //       $newSlice = new Slices();
    //       $newSlice->alias = mb_strtolower($value1);
    //       $newSlice->parent_alias = 'pryamougolnik';
    //       $newSlice->name = $value1;
    //       $newSlice->params = '{"type":"profil_pryamougolnik"' . ',"' . $paramName . '":"' . $value1 . '"}';
    //       $newSlice->save();
    //     }
    //   }
    // }

  // }

  public function actionInfo(){
    // 'dsn' 			=> 'mysql:host=localhost;dbname=pmn_gorko_ny',

    $connection = new \yii\db\Connection([
        'dsn' 		=> $siteArr[$site]['params']['dsn'],
        'username' 	=> 'pmnetwork',
        'password' 	=> 'P2t8wdBQbczLNnVT',
        'charset' 	=> 'utf8',
    ]);
    $connection->open();
    Yii::$app->set('db', $connection);
  }

  public function actionCreateUser()
  {

    // $user = new User();
    // $user->username = 'admin';
    // $user->email = 'artm@liderpoiska.ru';
    // $user->password = 'Gjf/1k2U';
    // $user->setPassword('Gjf/1k2U');
    // $user->generateAuthKey();
    
    // return $user->save() ? $user : 'пользователь не создан';

    
    echo "конец";
    exit;
  }

}