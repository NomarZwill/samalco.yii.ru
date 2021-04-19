
<div class="main_wrap _main">
	<div class="content">
		<div class="breadcrumbs">
			[[Breadcrumbs? &currentAsLink=`0` &crumbSeparator=`/` &in_city=`[!in_city!]` &showCurrentCrumb=`0`]]
		</div>
		<h1>Чертежи профилей</h1>
		
    <?php
      foreach ($childrenPages as $page){
        echo '<a href="/teh_doc/chertezhi/' . $page['alias'] . '/"><p>' . $page['name'] . '</p></a>';
      }
    ?>
		<br/>
	</div>
</div>