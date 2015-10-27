<html>
<head><title>Downloading...</title></head>
<body>
<?php
set_time_limit (0);
include "lib/db.php";
include "lib/extraction.php";
include "lib/journal.php";

ob_start();

echo '<img src="img/icon_processing.gif"><br> Downloading journals info, please wait.';

ob_flush();

$content = '';
for($i = 1; $i<=1; $i++) {
	$content .= file_get_contents('http://science.thomsonreuters.com/cgi-bin/jrnlst/jlresults.cgi?PC=MASTER&mode=print&Page=' . $i);
	$content .= '\n';
	echo '<br>Page ' . $i;
	ob_flush();
}

$lines = preg_split('/\n|\r\n?/', $content);

processJournalsList($lines);

echo '<hr>Done.<hr>';
echo '<a href="index.php">Back</a>';
?>
</body>
</html>