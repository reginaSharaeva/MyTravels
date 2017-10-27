<?php 

namespace MyTravels\Service;

use MyTravels\Repository;

class TravelService {

	public static function get_all_boundaries($userId) {
		$bounds = array();
		$travels = Repository\TravelRepository::get_all($userId);
		foreach ($travels as $key => $value) {
		 	array_push($bounds, CountryService::get_country_by_name($value['name']));
		} 
		return $bounds;
	}

	public static function get_all_travels($userId) {
		return Repository\TravelRepository::get_all($userId);
	}

	public static function delete_travel($userId, $name) {
		return Repository\TravelRepository::delete_by_name($userId, $name);
	}

	public static function get_travel_by_name($userId, $name) {
		return Repository\TravelRepository::get_by_name($userId, $name);
	}

	public static function add_travel($userId, $name) {
		$travel = array('name' => $name);
		return Repository\TravelRepository::add($userId, $travel);
	}
}