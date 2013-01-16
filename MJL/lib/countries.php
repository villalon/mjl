<?php

function countryIndex($array) {
	$countries = array(
			"Afghanistan",
			"Albania",
			"Algeria",
			"American Samoa",
			"Andorra",
			"Angola",
			"Anguilla",
			"Antigua & Barbuda",
			"Argentina",
			"Armenia",
			"Aruba",
			"Australia",
			"Austria",
			"Azerbaijan",
			"Bahamas",
			"Bahrain",
			"Bangladesh",
			"Barbados",
			"Belarus",
			"Belgium",
			"Belize",
			"Benin",
			"Bermuda",
			"Bhutan",
			"Bolivia",
			"Bonaire",
			"Bosnia & Herzegovina",
			"Botswana",
			"Brazil",
			"British Indian Ocean Ter",
			"Brunei",
			"Bulgaria",
			"Burkina Faso",
			"Burundi",
			"Cambodia",
			"Cameroon",
			"Canada",
			"Canary Islands",
			"Cape Verde",
			"Cayman Islands",
			"Central African Republic",
			"Chad",
			"Channel Islands",
			"Chile",
			"China",
			"Peoples R China",
			"Christmas Island",
			"Cocos Island",
			"Colombia",
			"Comoros",
			"Congo",
			"Cook Islands",
			"Costa Rica",
			"Cote D'Ivoire",
			"Croatia",
			"Cuba",
			"Curacao",
			"Cyprus",
			"Czech Republic",
			"Denmark",
			"Djibouti",
			"Dominica",
			"Dominican Republic",
			"East Timor",
			"Ecuador",
			"Egypt",
			"El Salvador",
			"England",
			"Equatorial Guinea",
			"Eritrea",
			"Estonia",
			"Ethiopia",
			"Falkland Islands",
			"Faroe Islands",
			"Fiji",
			"Finland",
			"France",
			"French Guiana",
			"French Polynesia",
			"French Southern Ter",
			"Gabon",
			"Gambia",
			"Georgia",
			"Germany",
			"Ghana",
			"Gibraltar",
			"Great Britain",
			"Greece",
			"Greenland",
			"Grenada",
			"Guadeloupe",
			"Guam",
			"Guatemala",
			"Guinea",
			"Guyana",
			"Haiti",
			"Hawaii",
			"Honduras",
			"Hong Kong",
			"Hungary",
			"Iceland",
			"India",
			"Indonesia",
			"Iran",
			"Iraq",
			"Ireland",
			"Isle of Man",
			"Israel",
			"Italy",
			"Jamaica",
			"Japan",
			"Jordan",
			"Kazakhstan",
			"Kenya",
			"Kiribati",
			"Korea North",
			"Korea South",
			"Kuwait",
			"Kyrgyzstan",
			"Laos",
			"Latvia",
			"Lebanon",
			"Lesotho",
			"Liberia",
			"Libya",
			"Liechtenstein",
			"Lithuania",
			"Luxembourg",
			"Macau",
			"Macedonia",
			"Madagascar",
			"Malaysia",
			"Malawi",
			"Maldives",
			"Mali",
			"Malta",
			"Marshall Islands",
			"Martinique",
			"Mauritania",
			"Mauritius",
			"Mayotte",
			"Mexico",
			"Midway Islands",
			"Moldova",
			"Monaco",
			"Mongolia",
			"Montserrat",
			"Morocco",
			"Mozambique",
			"Myanmar",
			"Nambia",
			"Nauru",
			"Nepal",
			"Netherland Antilles",
			"Netherlands",
			"Nevis",
			"New Caledonia",
			"New Zealand",
			"Nicaragua",
			"Niger",
			"Nigeria",
			"Niue",
			"Norfolk Island",
			"Norway",
			"Oman",
			"Pakistan",
			"Palau Island",
			"Palestine",
			"Panama",
			"Papua New Guinea",
			"Paraguay",
			"Peru",
			"Philippines",
			"Pitcairn Island",
			"Poland",
			"Portugal",
			"Puerto Rico",
			"Qatar",
			"Republic of Montenegro",
			"Republic of Serbia",
			"Reunion",
			"Romania",
			"Russia",
			"Rwanda",
			"St Barthelemy",
			"St Eustatius",
			"St Helena",
			"St Kitts-Nevis",
			"St Lucia",
			"St Maarten",
			"St Pierre & Miquelon",
			"St Vincent & Grenadines",
			"Saipan",
			"Samoa",
			"Samoa American",
			"San Marino",
			"Sao Tome & Principe",
			"Saudi Arabia",
			"Senegal",
			"Seychelles",
			"Serbia Monteneg",
			"Serbia",
			"Sierra Leone",
			"Singapore",
			"Slovakia",
			"Slovenia",
			"Solomon Islands",
			"Somalia",
			"South Africa",
			"South Korea",
			"Spain",
			"Sri Lanka",
			"Sudan",
			"Suriname",
			"Swaziland",
			"Sweden",
			"Switzerland",
			"Syria",
			"Tahiti",
			"Taiwan",
			"Tajikistan",
			"Tanzania",
			"Thailand",
			"Togo",
			"Tokelau",
			"Tonga",
			"Trinidad & Tobago",
			"Tunisia",
			"Turkey",
			"Turkmenistan",
			"Turks & Caicos Is",
			"Tuvalu",
			"Uganda",
			"Ukraine",
			"United Arab Emirates",
			"United Kingdom",
			"United States of America",
			"United States",
			"USA",
			"Uruguay",
			"Uzbekistan",
			"Vanuatu",
			"Vatican City State",
			"Venezuela",
			"Vietnam",
			"Virgin Islands (Brit)",
			"Virgin Islands (USA)",
			"Wake Island",
			"Wallis & Futana Is",
			"Yemen",
			"Yugoslavia",
			"Zaire",
			"Zambia",
			"Zimbabwe"
	);
	$index = 0;
	foreach($array as $element) {
		foreach($countries as $country) {
			$element = trim(strtoupper($element));
			$country = trim(strtoupper($country));
			
			if(strcasecmp($element, $country) == 0)
				return $index;
		}
		$index++;
	}
	return -1;
}