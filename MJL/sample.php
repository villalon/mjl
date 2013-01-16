<?php
include "lib/extraction.php";
include "lib/journal.php";

$journal1 = new journal(1);
$journal2 = new journal(2);

$s1 = ' Annual ISSN: ****-****<br /><DD>ROCHA TRUST, CRUZINHA, APT 41, MEXILHOEIRA GRANDE, PORTUGAL, 8501-903<ol>';
$s2 = ' Monthly ISSN: 0389-9160<br /><DD>A & U PUBL CO LTD, 30-8 YUSHIMA 2-CHOME BUNKYO-KU, TOKYO, JAPAN, 113<ol>';

$journal1->extractRecurrencyAddress($s1);
$journal2->extractRecurrencyAddress($s2);

var_dump($journal1);
var_dump($journal2);