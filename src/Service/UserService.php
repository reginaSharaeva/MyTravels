<?php 

namespace MyTravels\Service;

use MyTravels\Repository;
use MyTravels\Common;
use MyTravels\Model;

class UserService {

	public static function add_user($token) {
		$id = Common\DataBase::get_next_id('users');
		$user = ['id' => $id, 'token' => $token];
		$filename = __DIR__.'/../Model/data/user_travels/' . $id . '.csv';
		if (!file_exists($filename)) {
			$fp = fopen($filename, 'a+');
			fclose($fp);
		}
		return Repository\UserRepository::add($user);
	}

	public static function get_user_by_token($token) {
		return Repository\UserRepository::get_by_token($token);
	}
}