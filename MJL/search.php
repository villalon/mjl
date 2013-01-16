<?php

include 'lib/header.php';
include 'lib/db.php';

$rowsperpage = 10;
$page = 1;
$query = '';

if(isset($_REQUEST['q']))
	$query = $_REQUEST['q'];

if(isset($_REQUEST['p']) && is_numeric($_REQUEST['p']))
	$page = intval($_REQUEST['p']);

$query = trim($query);

if(strlen($query) < 2) {
	die("Query is too short, please try again.");
}

$columns = array("title","issn","publisher_name","publisher_address");

$db = getConnection();

$parts = explode(' ', $query);

$sql = "SELECT id, title, recurrence, issn, publisher_full_address " .
		" FROM journals WHERE ";

$currentcol = 0;
foreach($columns as $column) {
	$currentcol++;
	$sql .= "(";
	$current = 0;
	foreach($parts as $part) {
		$current++;
		$sql .= $column . " like '%" . mysqli_escape_string($db, $part) . "%'";
		if($current < count($parts)) {
			$sql .= " AND ";
		}
	}
	$sql.= ")";
	if($currentcol < count($columns)) {
		$sql .= " OR ";
	}
}

$result = $db->query($sql)
		or die("Died preparing".$db->error);

// $stmt->bind_param('ssssss', $query, $query, $query, $query, $query, $query) or die ("Binding".$db->error);

// $stmt->execute() or die($db->error);

// $stmt->store_result();

$numresults = $result->num_rows;

include 'lib/searchform.php';

if($numresults > $rowsperpage) {
	$maxpages = ceil($numresults / $rowsperpage);
	echo '<div class="pagination pagination-left"><ul>';

	//
	if($page > 1)
		echo '<li><a href="?q='.$query.'&p='.($page - 1).'">&laquo;</a></li>';

	for($i=max(1,$page - 5);$i<=min($maxpages, $page + 5);$i++) {
		$class = $page == $i ? ' class="active" ' : ' ';
		echo '<li'.$class.'><a href="?q='.$query.'&p='.$i.'">'.$i.'</a></li>';
	}

	if($page < $maxpages)
		echo '<li><a href="?q='.$query.'&p='.($page + 1).'">&raquo;</a></li>';


	echo '</ul></div>';
}

// $result->bind_result($id, $title, $recurrence, $issn, $publisher_full_address);

$offset = ($page - 1) * $rowsperpage;

$result->data_seek($offset);
?>
<table class="table table-condensed table-hover">
	<tr>
		<th>#</th>
		<th>Title</th>
		<th>Tools</th>
	</tr>
	<?php 
	$total = 0;
	while(($row = $result->fetch_assoc()) != null) {
		$id=$row['id'];
		$title=$row['title'];
		$url = urlencode("\"$title\"");
		echo "<tr><td>$id</td><td style=\"cursor:pointer;\" onClick=\"\$('#journal$id').modal('show');\">$title</td>";
		echo "<td><a href=\"http://scholar.google.cl/scholar?as_publication=$url\">Google scholar</a></td></tr>";
		$total++;
		if($total > $rowsperpage)
			break;
	}

	?>

</table>
<?php 

$result->data_seek($offset);

$total = 0;
while(($row = $result->fetch_assoc())!=null) {
		$id=$row['id'];
		$title=$row['title'];
		$issn=$row['issn'];
		$recurrence=$row['title'];
		$publisher_full_address=$row['publisher_full_address'];
		?>
<div id="journal<?php echo $id ?>" class="modal hide fade">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal"
			aria-hidden="true">&times;</button>
		<h3>
			<?php echo $title ?>
		</h3>
	</div>
	<div class="modal-body">
		<p>
		
		
		<dl class="dl-horizontal">
			<dt>Recurrence</dt>
			<dd>
				<?php echo $recurrence ?>
			</dd>
			<dt>ISSN</dt>
			<dd>
				<?php echo $issn ?>
			</dd>
			<dt>Address</dt>
			<dd>
				<address>
					<?php echo str_replace(',', '<br>', $publisher_full_address) ?>
				</address>
			</dd>
		</dl>
		</p>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	</div>
</div>
<?php
$total++;
if($total > $rowsperpage)
	break;
}

$result->close();

$db->close();

include 'lib/footer.php';
?>