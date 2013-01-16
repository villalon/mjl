<?php
	if(!isset($query)) {
		$query = '';
	}
	if(!isset($numresults) || !is_numeric($numresults)) {
		$numresults = 0;
	}
?>
			<?php if($numresults > 0) { ?>
			<small>Found <?php echo $numresults ?> results</small>
			<?php } ?>
<form class="form-search" action="search.php" method="get">
		<div class="input-append">
			<input class="input-xxlarge search-query" type="text" name="q" value="<?php echo $query ?>">
			<button class="btn btn-primary" type="submit">Search</button>
		</div>
	</form>
