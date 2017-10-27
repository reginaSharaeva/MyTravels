<?php

namespace MyTravels\Model;

class Travel {

	protected $name;

  	public function setName($name) {
  		$this->name = $name;
  	}

  	public function getName() {
  		return $this->name;
  	}

  	public static function get_schema() {
    	return ['name'];
  	}

}