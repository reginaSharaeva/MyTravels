<?php

namespace MyTravels\Repository;

use MyTravels\Model;
use MyTravels\Common;

class CountryRepository {

	public static function get_all($letter) {
		return Common\DataBase::select_all('boundaries/' . $letter . '_countries', Model\Country::get_schema());
	}

	public static function get_by_name($letter, $name) {
		return Common\DataBase::find_by('boundaries/' . $letter . '_countries', Model\Country::get_schema(), ['name' => $name]);
	}

}