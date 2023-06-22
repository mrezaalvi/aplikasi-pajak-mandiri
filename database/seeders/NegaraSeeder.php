<?php

namespace Database\Seeders;

use App\Models\Negara;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NegaraSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*/
	public function run(): void
	{
		$refNegara = $kode_negara = [
			[
				"kode" => "AFG",
				"nama" => "Afganistan",
				"p3b" => false
			],
			[
				"kode" => "AGO",
				"nama" => "Angola",
				"p3b" => false
			],
			[
				"kode" => "ALB",
				"nama" => "Albania",
				"p3b" => false
			],
			[
				"kode" => "AND",
				"nama" => "Andorra",
				"p3b" => false
			],
			[
				"kode" => "ARE",
				"nama" => "Uni Emirat Arab",
				"p3b" => true
			],
			[
				"kode" => "ARG",
				"nama" => "Argentina",
				"p3b" => false
			],
			[
				"kode" => "ARM",
				"nama" => "Armenia",
				"p3b" => false
			],
			[
				"kode" => "ATG",
				"nama" => "Antigua dan Barbuda",
				"p3b" => false
			],
			[
				"kode" => "AUS",
				"nama" => "Australia",
				"p3b" => true
			],
			[
				"kode" => "AUT",
				"nama" => "Austria",
				"p3b" => true
			],
			[
				"kode" => "AZE",
				"nama" => "Azerbaijan",
				"p3b" => false
			],
			[
				"kode" => "BDI",
				"nama" => "Burundi",
				"p3b" => false
			],
			[
				"kode" => "BEL",
				"nama" => "Belgia",
				"p3b" => true
			],
			[
				"kode" => "BEN",
				"nama" => "Benin",
				"p3b" => false
			],
			[
				"kode" => "BFA",
				"nama" => "Burkina Faso",
				"p3b" => false
			],
			[
				"kode" => "BGD",
				"nama" => "Bangladesh",
				"p3b" => true
			],
			[
				"kode" => "BGR",
				"nama" => "Bulgaria",
				"p3b" => true
			],
			[
				"kode" => "BHR",
				"nama" => "Bahrain",
				"p3b" => false
			],
			[
				"kode" => "BHS",
				"nama" => "Bahama",
				"p3b" => false
			],
			[
				"kode" => "BIH",
				"nama" => "Bosnia dan Herzegovina",
				"p3b" => false
			],
			[
				"kode" => "BLR",
				"nama" => "Belarus",
				"p3b" => false
			],
			[
				"kode" => "BLZ",
				"nama" => "Belize",
				"p3b" => false
			],
			[
				"kode" => "BOL",
				"nama" => "Bolivia",
				"p3b" => false
			],
			[
				"kode" => "BRA",
				"nama" => "Brasil",
				"p3b" => false
			],
			[
				"kode" => "BRB",
				"nama" => "Barbados",
				"p3b" => false
			],
			[
				"kode" => "BRN",
				"nama" => "Brunei Darussalam",
				"p3b" => true
			],
			[
				"kode" => "BTN",
				"nama" => "Bhutan",
				"p3b" => false
			],
			[
				"kode" => "BWA",
				"nama" => "Bostwana",
				"p3b" => false
			],
			[
				"kode" => "CAF",
				"nama" => "Afrika Tengah",
				"p3b" => false
			],
			[
				"kode" => "CAN",
				"nama" => "Canada",
				"p3b" => true
			],
			[
				"kode" => "CHE",
				"nama" => "Swiss",
				"p3b" => true
			],
			[
				"kode" => "CHL",
				"nama" => "Chili",
				"p3b" => false
			],
			[
				"kode" => "CHN",
				"nama" => "China",
				"p3b" => true
			],
			[
				"kode" => "CIV",
				"nama" => "Pantai Gading",
				"p3b" => false
			],
			[
				"kode" => "CMR",
				"nama" => "Kamerun",
				"p3b" => false
			],
			[
				"kode" => "COD",
				"nama" => "Kongo - Republik Demokratik Kongo",
				"p3b" => false
			],
			[
				"kode" => "COG",
				"nama" => "Kongo - Republik Kongo",
				"p3b" => false
			],
			[
				"kode" => "COL",
				"nama" => "Kolombia",
				"p3b" => false
			],
			[
				"kode" => "COM",
				"nama" => "Komoro",
				"p3b" => false
			],
			[
				"kode" => "CPV",
				"nama" => "Tanjung Verde",
				"p3b" => false
			],
			[
				"kode" => "CRI",
				"nama" => "Kosta Rika",
				"p3b" => false
			],
			[
				"kode" => "CUB",
				"nama" => "Kuba",
				"p3b" => false
			],
			[
				"kode" => "CYP",
				"nama" => "Siprus",
				"p3b" => false
			],
			[
				"kode" => "CZE",
				"nama" => "Republik Ceko",
				"p3b" => true
			],
			[
				"kode" => "DEU",
				"nama" => "Jerman",
				"p3b" => true
			],
			[
				"kode" => "DJI",
				"nama" => "Djibouti",
				"p3b" => false
			],
			[
				"kode" => "DMA",
				"nama" => "Dominika - Persemakmuran Dominika",
				"p3b" => false
			],
			[
				"kode" => "DNK",
				"nama" => "Denmark",
				"p3b" => true
			],
			[
				"kode" => "DOM",
				"nama" => "Dominika - Republik Dominika",
				"p3b" => false
			],
			[
				"kode" => "DSA",
				"nama" => "Aljazair",
				"p3b" => true
			],
			[
				"kode" => "ECU",
				"nama" => "Ekuador",
				"p3b" => false
			],
			[
				"kode" => "EGY",
				"nama" => "Mesir",
				"p3b" => true
			],
			[
				"kode" => "ERI",
				"nama" => "Eritrea",
				"p3b" => false
			],
			[
				"kode" => "ESP",
				"nama" => "Spanyol",
				"p3b" => true
			],
			[
				"kode" => "EST",
				"nama" => "Estonia",
				"p3b" => false
			],
			[
				"kode" => "ETH",
				"nama" => "Ethiopia",
				"p3b" => false
			],
			[
				"kode" => "FIN",
				"nama" => "Finlandia",
				"p3b" => true
			],
			[
				"kode" => "FJI",
				"nama" => "Fiji",
				"p3b" => false
			],
			[
				"kode" => "FRA",
				"nama" => "Perancis",
				"p3b" => true
			],
			[
				"kode" => "FSM",
				"nama" => "Mikronesia",
				"p3b" => false
			],
			[
				"kode" => "GAB",
				"nama" => "Gabon",
				"p3b" => false
			],
			[
				"kode" => "GBR",
				"nama" => "Inggris",
				"p3b" => true
			],
			[
				"kode" => "GEO",
				"nama" => "Georgia",
				"p3b" => false
			],
			[
				"kode" => "GHA",
				"nama" => "Ghana",
				"p3b" => false
			],
			[
				"kode" => "GIN",
				"nama" => "Guinea",
				"p3b" => false
			],
			[
				"kode" => "GMB",
				"nama" => "Gambia",
				"p3b" => false
			],
			[
				"kode" => "GNB",
				"nama" => "Guinea-Bissau",
				"p3b" => false
			],
			[
				"kode" => "GNQ",
				"nama" => "Guinea Khatulistiwa",
				"p3b" => false
			],
			[
				"kode" => "GRC",
				"nama" => "Yunani",
				"p3b" => false
			],
			[
				"kode" => "GRD",
				"nama" => "Grenada",
				"p3b" => false
			],
			[
				"kode" => "GTM",
				"nama" => "Guatemala",
				"p3b" => false
			],
			[
				"kode" => "GUY",
				"nama" => "Guyana",
				"p3b" => false
			],
			[
				"kode" => "HKG",
				"nama" => "Hong Kong",
				"p3b" => true
			],
			[
				"kode" => "HND",
				"nama" => "Honduras",
				"p3b" => false
			],
			[
				"kode" => "HRV",
				"nama" => "Kroasia",
				"p3b" => false
			],
			[
				"kode" => "HTI",
				"nama" => "Haiti",
				"p3b" => false
			],
			[
				"kode" => "HUN",
				"nama" => "Hungaria",
				"p3b" => true
			],
			[
				"kode" => "IDN",
				"nama" => "Indonesia",
				"p3b" => true
			],
			[
				"kode" => "IND",
				"nama" => "India",
				"p3b" => true
			],
			[
				"kode" => "IRL",
				"nama" => "Irlandia",
				"p3b" => false
			],
			[
				"kode" => "IRN",
				"nama" => "Iran",
				"p3b" => true
			],
			[
				"kode" => "IRQ",
				"nama" => "Irak",
				"p3b" => false
			],
			[
				"kode" => "ISL",
				"nama" => "Islandia",
				"p3b" => false
			],
			[
				"kode" => "ISR",
				"nama" => "Israel",
				"p3b" => false
			],
			[
				"kode" => "ITA",
				"nama" => "Italia",
				"p3b" => true
			],
			[
				"kode" => "JAM",
				"nama" => "Jamaika",
				"p3b" => false
			],
			[
				"kode" => "JOR",
				"nama" => "Yordania",
				"p3b" => true
			],
			[
				"kode" => "JPN",
				"nama" => "Jepang",
				"p3b" => true
			],
			[
				"kode" => "KAZ",
				"nama" => "Kazakhstan",
				"p3b" => false
			],
			[
				"kode" => "KEN",
				"nama" => "Kenya",
				"p3b" => false
			],
			[
				"kode" => "KGZ",
				"nama" => "Kirgiztan",
				"p3b" => false
			],
			[
				"kode" => "KHM",
				"nama" => "Kamboja",
				"p3b" => false
			],
			[
				"kode" => "KIR",
				"nama" => "Kiribati",
				"p3b" => false
			],
			[
				"kode" => "KNA",
				"nama" => "Saint Kitts dan Nevis",
				"p3b" => false
			],
			[
				"kode" => "KOR",
				"nama" => "Korea Selatan",
				"p3b" => true
			],
			[
				"kode" => "KWT",
				"nama" => "Kuwait",
				"p3b" => true
			],
			[
				"kode" => "LAO",
				"nama" => "Laos",
				"p3b" => false
			],
			[
				"kode" => "LBN",
				"nama" => "Lebanon",
				"p3b" => false
			],
			[
				"kode" => "LBR",
				"nama" => "Liberia",
				"p3b" => false
			],
			[
				"kode" => "LBY",
				"nama" => "Libya",
				"p3b" => false
			],
			[
				"kode" => "LCA",
				"nama" => "Saint Lucia",
				"p3b" => false
			],
			[
				"kode" => "LIE",
				"nama" => "Liechtenstein",
				"p3b" => false
			],
			[
				"kode" => "LKA",
				"nama" => "Sri Lanka",
				"p3b" => true
			],
			[
				"kode" => "LSO",
				"nama" => "Lesotho",
				"p3b" => false
			],
			[
				"kode" => "LTU",
				"nama" => "Lituania",
				"p3b" => false
			],
			[
				"kode" => "LUX",
				"nama" => "Luxembourg",
				"p3b" => true
			],
			[
				"kode" => "LVA",
				"nama" => "Latvia",
				"p3b" => false
			],
			[
				"kode" => "MAR",
				"nama" => "Maroko",
				"p3b" => true
			],
			[
				"kode" => "MCO",
				"nama" => "Monako",
				"p3b" => false
			],
			[
				"kode" => "MDA",
				"nama" => "Moldova0",
				"p3b" => false
			],
			[
				"kode" => "MDG",
				"nama" => "Madagaskar",
				"p3b" => false
			],
			[
				"kode" => "MDV",
				"nama" => "Maladewa",
				"p3b" => false
			],
			[
				"kode" => "MEX",
				"nama" => "Mexico",
				"p3b" => true
			],
			[
				"kode" => "MHL",
				"nama" => "Marshall",
				"p3b" => false
			],
			[
				"kode" => "MKD",
				"nama" => "Makedonia",
				"p3b" => false
			],
			[
				"kode" => "MLI",
				"nama" => "Malia",
				"p3b" => false
			],
			[
				"kode" => "MLT",
				"nama" => "Malta",
				"p3b" => false
			],
			[
				"kode" => "MMR",
				"nama" => "Myanmar",
				"p3b" => false
			],
			[
				"kode" => "MNE",
				"nama" => "Montenegro",
				"p3b" => false
			],
			[
				"kode" => "MNG",
				"nama" => "Mongolia",
				"p3b" => true
			],
			[
				"kode" => "MOZ",
				"nama" => "Mozambik",
				"p3b" => false
			],
			[
				"kode" => "MRT",
				"nama" => "Mauritania",
				"p3b" => false
			],
			[
				"kode" => "MUS",
				"nama" => "Mauritius",
				"p3b" => false
			],
			[
				"kode" => "MWI",
				"nama" => "Malawi",
				"p3b" => false
			],
			[
				"kode" => "MYS",
				"nama" => "Malaysia",
				"p3b" => true
			],
			[
				"kode" => "NAM",
				"nama" => "Namibia",
				"p3b" => false
			],
			[
				"kode" => "NER",
				"nama" => "Niger",
				"p3b" => false
			],
			[
				"kode" => "NGA",
				"nama" => "Nigeria",
				"p3b" => false
			],
			[
				"kode" => "NIC",
				"nama" => "Nikaragua",
				"p3b" => false
			],
			[
				"kode" => "NLD",
				"nama" => "Belanda",
				"p3b" => true
			],
			[
				"kode" => "NOR",
				"nama" => "Norwegia",
				"p3b" => true
			],
			[
				"kode" => "NPL",
				"nama" => "Nepal",
				"p3b" => false
			],
			[
				"kode" => "NRU",
				"nama" => "Nauru",
				"p3b" => false
			],
			[
				"kode" => "NZL",
				"nama" => "Selandia Baru",
				"p3b" => true
			],
			[
				"kode" => "OMN",
				"nama" => "Oman",
				"p3b" => false
			],
			[
				"kode" => "PAK",
				"nama" => "Pakistan",
				"p3b" => true
			],
			[
				"kode" => "PAN",
				"nama" => "Panama",
				"p3b" => false
			],
			[
				"kode" => "PER",
				"nama" => "Peru",
				"p3b" => false
			],
			[
				"kode" => "PHL",
				"nama" => "Philipina",
				"p3b" => true
			],
			[
				"kode" => "PLW",
				"nama" => "Palau",
				"p3b" => false
			],
			[
				"kode" => "PNG",
				"nama" => "Papua Nugini",
				"p3b" => false
			],
			[
				"kode" => "POL",
				"nama" => "Polandia",
				"p3b" => true
			],
			[
				"kode" => "PRK",
				"nama" => "Korea Utara",
				"p3b" => true
			],
			[
				"kode" => "PRT",
				"nama" => "Portugal",
				"p3b" => true
			],
			[
				"kode" => "PRY",
				"nama" => "Paraguay",
				"p3b" => false
			],
			[
				"kode" => "QAT",
				"nama" => "Qatar",
				"p3b" => true
			],
			[
				"kode" => "ROU",
				"nama" => "Romania",
				"p3b" => true
			],
			[
				"kode" => "RUS",
				"nama" => "Rusia",
				"p3b" => true
			],
			[
				"kode" => "RWA",
				"nama" => "Rwanda",
				"p3b" => false
			],
			[
				"kode" => "SAU",
				"nama" => "Saudi Arabia",
				"p3b" => true
			],
			[
				"kode" => "SDN",
				"nama" => "Sudan",
				"p3b" => true
			],
			[
				"kode" => "SEN",
				"nama" => "Senegal",
				"p3b" => false
			],
			[
				"kode" => "SGP",
				"nama" => "Singapura",
				"p3b" => true
			],
			[
				"kode" => "SLB",
				"nama" => "Solomon",
				"p3b" => false
			],
			[
				"kode" => "SLE",
				"nama" => "Sierra Leone",
				"p3b" => false
			],
			[
				"kode" => "SLV",
				"nama" => "El Salvador",
				"p3b" => false
			],
			[
				"kode" => "SMR",
				"nama" => "San Marino",
				"p3b" => false
			],
			[
				"kode" => "SOM",
				"nama" => "Somalia",
				"p3b" => false
			],
			[
				"kode" => "SRB",
				"nama" => "Serbia",
				"p3b" => false
			],
			[
				"kode" => "STP",
				"nama" => "Sao Tome dan Principe",
				"p3b" => false
			],
			[
				"kode" => "SUR",
				"nama" => "Suriname",
				"p3b" => false
			],
			[
				"kode" => "SVK",
				"nama" => "Slovakia",
				"p3b" => true
			],
			[
				"kode" => "SVN",
				"nama" => "Slovenia",
				"p3b" => false
			],
			[
				"kode" => "SWE",
				"nama" => "Swedia",
				"p3b" => true
			],
			[
				"kode" => "SWZ",
				"nama" => "Swaziland",
				"p3b" => false
			],
			[
				"kode" => "SYC",
				"nama" => "Seychelles",
				"p3b" => true
			],
			[
				"kode" => "SYR",
				"nama" => "Suriah",
				"p3b" => true
			],
			[
				"kode" => "TCD",
				"nama" => "Chad",
				"p3b" => false
			],
			[
				"kode" => "TGO",
				"nama" => "Togo",
				"p3b" => false
			],
			[
				"kode" => "THA",
				"nama" => "Thailand",
				"p3b" => true
			],
			[
				"kode" => "TJK",
				"nama" => "Tajikistan",
				"p3b" => false
			],
			[
				"kode" => "TKM",
				"nama" => "Turkmenistan",
				"p3b" => false
			],
			[
				"kode" => "TLS",
				"nama" => "Timor Leste",
				"p3b" => false
			],
			[
				"kode" => "TON",
				"nama" => "Tonga",
				"p3b" => false
			],
			[
				"kode" => "TTO",
				"nama" => "Trinidad dan Tobago",
				"p3b" => false
			],
			[
				"kode" => "TUN",
				"nama" => "Tunisia",
				"p3b" => true
			],
			[
				"kode" => "TUR",
				"nama" => "Turki",
				"p3b" => true
			],
			[
				"kode" => "TUV",
				"nama" => "Tuvalu",
				"p3b" => false
			],
			[
				"kode" => "TWN",
				"nama" => "Taiwan",
				"p3b" => true
			],
			[
				"kode" => "TZA",
				"nama" => "Tanzania",
				"p3b" => false
			],
			[
				"kode" => "UGA",
				"nama" => "Uganda",
				"p3b" => false
			],
			[
				"kode" => "UKR",
				"nama" => "Ukraina",
				"p3b" => true
			],
			[
				"kode" => "URY",
				"nama" => "Uruguay",
				"p3b" => false
			],
			[
				"kode" => "USA",
				"nama" => "Amerika Serikat",
				"p3b" => true
			],
			[
				"kode" => "UZB",
				"nama" => "Uzbekistan",
				"p3b" => true
			],
			[
				"kode" => "VAT",
				"nama" => "Vatikan",
				"p3b" => false
			],
			[
				"kode" => "VCT",
				"nama" => "Saint Vincent dan Grenadines",
				"p3b" => false
			],
			[
				"kode" => "VEN",
				"nama" => "Venezuela",
				"p3b" => true
			],
			[
				"kode" => "VNM",
				"nama" => "Vietnam",
				"p3b" => true
			],
			[
				"kode" => "VUT",
				"nama" => "Vanuatu",
				"p3b" => false
			],
			[
				"kode" => "WSM",
				"nama" => "Samoa",
				"p3b" => false
			],
			[
				"kode" => "YEM",
				"nama" => "Yaman",
				"p3b" => false
			],
			[
				"kode" => "ZAF",
				"nama" => "Afrika Selatan",
				"p3b" => true
			],
			[
				"kode" => "ZMB",
				"nama" => "Zambia",
				"p3b" => false
			],
			[
				"kode" => "ZWE",
				"nama" => "Zimbabwe",
				"p3b" => false
				]
			];
			
			
			foreach($refNegara as $negara){
				Negara::firstOrCreate([
					'kode' => $negara['kode'],
					'nama' => $negara['nama'],
					'p3b' => $negara['p3b'],
				]);
			}
			
		}
	}
