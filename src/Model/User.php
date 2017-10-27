<?php

namespace MyTravels\Model;

class User {

	protected $id;
	protected $token;

  	public function setToken($token) {
  		$this->token = $token;
  	}

  	public function setId($id) {
  		$this->id = $id;
  	}

  	public function getToken() {
  		return $this->token;
  	}

  	public function getId() {
  		return $this->id;
  	}

  	public static function get_schema() {
    	return ['id', 'token'];
  	}

}