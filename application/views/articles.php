<h1>ARTICLES</h1>
<?php
foreach ($articles as $value) {
?>
<div class="media">
	<a class="pull-left" href="#">
		<img class="media-object" src="http://placehold.it/64x64">
	</a>
	<div class="media-body">
		<h4 class="media-heading"><a href="<?php print base_url('articles/'.$value->nid);  ?>"><?php print $value->titre; ?></a></h4>
	</div>
</div>
<?php
}
?>


