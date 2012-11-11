<h1>ARTICLES</h1>
<?php

foreach ($articles as $value) {
?>
<div class="media">
	<?php if($value->image): ?>
	<a class="pull-left" href="#">
		<img class="media-object" src="<?php print  base_url('uploads/articles-'.$value->image->filename) ; ?>" alt="<?php print $value->image->filename ; ?>">
	</a>
	<?php endif; ?>
	<div class="media-body">
		<h4 class="media-heading"><a href="<?php print base_url('articles/'.$value->nid);  ?>"><?php print $value->titre; ?></a></h4>
	</div>
</div>
<?php
}
?>


