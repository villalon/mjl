<?php

include "countries.php";

class journal {

	public $id;
	public $title;
	public $recurrence;
	public $issn;
	public $publisher_name;
	public $publisher_address;
	public $publisher_city;
	public $publisher_country;
	public $publisher_postcode;
	public $publisher_full_address;
	public $indices=array();

	public function journal($id) {
		$this->id = $id;
	}
	
	public function extractRecurrencyAddress($line) {
		$pattern = "/\s*([a-zA-z\-]+){0,1} ISSN: (.*)<br \/><DD>(.*)(<ol>|<\/li>)/i";
		if(!preg_match_all($pattern, $line, $matches))
			throw new Exception("Error: $pattern not found in $line");

		$this->recurrence = $matches[1][0];
		$this->issn = $matches[2][0];
		$this->publisher_full_address = $matches[3][0];

	}

	public function processFullAddress() {
		
		$parts = explode(',',$this->publisher_full_address);
		if(count($parts) > 4) {
		
			$patternAddress = "/^([^,]+)\s*,\s*(.*)\s*,\s*([^,]+)\s*,\s*([^,]+)\s*,\s*([^,]+)$/";
			if(!preg_match_all($patternAddress, $this->publisher_full_address, $matchesAddress))
				throw new Exception("Error: $patternAddress not found in $this->publisher_full_address");
		
			$parts = array(
					$matchesAddress[1][0],
					$matchesAddress[2][0],
					$matchesAddress[3][0],
					$matchesAddress[4][0],
					$matchesAddress[5][0]);
				
			$index = countryIndex($parts);
				
			if($index >= 0 && $index != 3) {
				$subparts = explode(',',$matchesAddress[2][0]);
		
				$tmp =  $parts[$index];
				$parts[1] = $subparts[0];
				$parts[2] = $subparts[count($subparts)-1];
				$parts[3] = $tmp;
			} elseif ($index < 0) {
				var_dump($parts);
				echo "<br>Country not found<br>";
			}
		
			$this->publisher_name = $parts[0];
			$this->publisher_address =  $parts[1];
			$this->publisher_city =  $parts[2];
			$this->publisher_country =  $parts[3];
			$this->publisher_postcode =  $parts[4];
		
		} else {
		
			$index = countryIndex($parts);
		
			if(count($parts) > 0)
				$this->publisher_name = trim($parts[0]);
			if(count($parts) > 1)
				$this->publisher_address = trim($parts[1]);
			if(count($parts) > 2)
				$this->publisher_city = trim($parts[2]);
			if(count($parts) > 3)
				$this->publisher_country = trim($parts[3]);
		}		
	}
	
	public function extractIndex($line) {
		$pattern = "/<a href=\"http:\/\/thomsonreuters.com\/products_services.*\">(.*)<\/a>/i";
		if(!preg_match_all($pattern, $line, $matches))
			throw new Exception("Error: $pattern not found in $line");

		$this->indices[] = $matches[1][0];
	}

	public function saveData($dbconnection) {
		$stmt = $dbconnection->prepare(
				"INSERT INTO journals (id, title, recurrence, issn, publisher_name, ".
				"publisher_address, publisher_city, publisher_country, publisher_postcode, publisher_full_address) values (?,?,?,?,?,?,?,?,?,?)")
				or die("Died preparing".$dbconnection->error);

		$stmt->bind_param('isssssssss',
				$this->id, $this->title, $this->recurrence,
				$this->issn, $this->publisher_name, $this->publisher_address,
				$this->publisher_city, $this->publisher_country, $this->publisher_postcode, $this->publisher_full_address) or die ("Binding".$dbconnection->error);

		$stmt->execute() or die($dbconnection->error);
	}
}

function createJournalFromLine($line) {
	$pattern = "/<DT><strong>(\d+)\.\s+(.+)<\/strong><\/DT>/i";
	if(!preg_match_all($pattern, $line, $matches))
		throw new Exception("Error: $pattern not found in $line");

	$id = $matches[1][0];
	$title = $matches[2][0];

	$journal = new journal($id);
	$journal->title = $title;

	return $journal;
}
