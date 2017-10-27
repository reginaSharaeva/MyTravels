<?php 

namespace MyTravels\Service;

use MyTravels\Repository;

class CountryService {

	public static function get_all_countries($letter) {
		return Repository\CountryRepository::get_all($letter);
	}

	public static function get_country_by_name($name) {
		$letter = $name[0];
		return Repository\CountryRepository::get_by_name($letter, $name);
	}
}