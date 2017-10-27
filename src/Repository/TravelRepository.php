<?php

namespace MyTravels\Repository;

use MyTravels\Model;
use MyTravels\Common;

class TravelRepository {

	public static function add($userId, $travel) {
		return Common\DataBase::add('user_travels/' . $userId, Model\Travel::get_schema(), $travel);
	}

	public static function get_all($userId) {
		return Common\DataBase::select_all('user_travels/' . $userId, Model\Travel::get_schema());
	}

	public static function get_by_name($userId, $name) {
		return Common\DataBase::find_by('user_travels/' . $userId, Model\Travel::get_schema(), ['name' => $name]);
	}

	public static function delete_by_name($userId, $name) {
		return Common\DataBase::delete('user_travels/' . $userId, Model\Travel::get_schema(), $name);
	}

}