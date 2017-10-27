<?php

namespace MyTravels\Repository;

use MyTravels\Model;
use MyTravels\Common;

class UserRepository {

	public static function add($user) {
		return Common\DataBase::add('users', Model\User::get_schema(), $user);
	}

	public static function get_by_token($token) {
		return Common\DataBase::find_by('users', Model\User::get_schema(), ['token' => $token]);
	}

}