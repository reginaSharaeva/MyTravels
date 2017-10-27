<?php

namespace MyTravels\Model;

class Country {

	protected $name;
	protected $lat;
	protected $lng;
	protected $polygon;

  	public function setName($name) {
  		$this->name = $name;
  	}

  	public function setLat($lat) {
  		$this->lat = $lat;
  	}

  	public function setLng($lng) {
  		$this->lng = $lng;
  	}

  	public function setPolygon($polygon) {
  		$this->polygon = $polygon;
  	}

  	public function getName() {
  		return $this->name;
  	}

  	public function getLat() {
  		return $this->lat;
  	}

  	public function getLng() {
  		return $this->lng;
  	}

  	public function getPolygon() {
  		return $this->polygon;
  	}

  	public static function get_schema() {
    	return ['name', 'lat', 'lng', 'polygon'];
  	}

}