<?php

function isValidLine($line) {
	if(stripos($line,"<dt>") === false
			&& stripos($line,"ARCHITECTURE") === false) {
		return false;
	}
	return true;
}

function isStartJournal($line) {
	if(stripos($line,"<dt>") === false) return false;
	return true;
}

function isEndJournal($line) {
	if(stripos($line,"</ol>") === false) return false;
	return true;
}

function isAddressLine($line) {
	if(stripos($line,"<dd>") === false) return false;
	return true;
}

function isIndexLine($line) {
	if(stripos($line,"<li>") === false
			|| stripos($line,"products_services") === false
			|| stripos($line,"thomson_reuters") === false)
		return false;
	return true;
}

function cleanLine($line) {
	$line = str_replace("\n", "", $line);
	return $line;
}

function processJournalsList($lines) {
	
	$db = new mysqli('localhost','root','','mjl') or die("Couldn't connect to DB:".$db->error);
	
	$db->query("TRUNCATE journals");
	
	$journal = null;
	foreach($lines as $line_num => $line) {
		$line = cleanLine($line);
		if(isStartJournal($line)) {
			$journal = createJournalFromLine($line);
		} else if(isAddressLine($line) && $journal) {
			$journal->extractRecurrencyAddress($line);
		} else if(isIndexLine($line) && $journal) {
			$journal->extractIndex($line);
		} else if(isEndJournal($line) && $journal) {
			$journal->extractIndex($line);
			$journal->saveData($db);
		}
	}
	
	$db->close();
}