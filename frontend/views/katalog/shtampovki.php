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
		<?= $currentPage['subdomenSeo']['text_1'] ?>
    
		<div class="content_table_static">
      <div style="margin-bottom:10px; font-size:18px"><a class="contact" href="/kontact/">Для уточнения цен и наличия металла обратитесь к нашим специалистам.</a></div>
      <p>Общий каталог  насчитывает более 7000 позиций. В случае необходимости наши специалисты подготовят документацию и разработают техническую оснастку для изготовления поковок и штамповок по Вашим чертежам.</p>
      <p>По желанию заказчика возможна поставка продукции с Военной Приёмкой ПЗ или Авиатехприемкой.</p>		</div>
		<br>
		<br>
		<?= $currentPage['subdomenSeo']['text_2'] ?>
		<br>
		<?= $this->render('/components/orderProcedure', array('currentPage' => $currentPage)) ?>

		<?= $this->render('/components/orderForm') ?>
    
	</div>
</div>

