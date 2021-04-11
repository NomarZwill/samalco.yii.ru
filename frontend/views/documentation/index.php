<div class="main_wrap _main">

	<div class="content">

		<div class="breadcrumbs">

			[[Breadcrumbs? &currentAsLink=`0` &crumbSeparator=`/` &in_city=`[!in_city!]` &showCurrentCrumb=`0`]]

		</div>

		<h1><?= $currentPage['header'] ?></h1>

		<p><span>В данном разделе размещена следующая информация:</span></p>
			
    <?php
      foreach ($childrenPageList as $cildrenPage){
        echo '<a href="/teh_doc/' . $cildrenPage['alias'] . '/"><p>' . $cildrenPage['header'] . '</p></a>';
      }
    ?>
    
    <br>
    
	</div>

</div>