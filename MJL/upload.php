<?php
include "lib/extraction.php";
include "lib/journal.php";

if(!$_FILES['file']) {
	die("No file");
}

$filename = 'upload/'.$_FILES["file"]["name"];

if(file_exists($filename)) {
	unlink($filename);
}

move_uploaded_file($_FILES["file"]["tmp_name"], $filename);

$lines = file($filename);

processJournalsList($lines, $db);
