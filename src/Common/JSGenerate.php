<?php

namespace MyTravels\Common;

class JSGenerate {

	public function generate_js_border_overlay($border) {

    $init_borders = "function initBorders(map, p) { \n";
    
    foreach ($border as $row) {
      $name=$row['name'];
      $string=$row['polygon'];

      $multi_poligon= explode(")),((",$string);
      $multi_poligon[0]= substr($multi_poligon[0], 15);
     	$count=count($multi_poligon)-1;
      $multi_poligon[$count]= substr($multi_poligon[$count],0,-3);
      
      foreach ($multi_poligon as $points ) {
        $encoded = $this->encode_by_reducing_pointcount($points);
        $encoded[0]=preg_replace('/\\\\/', '\\\\\\', $encoded[0]);

        $init_borders .= "p.paths = google.maps.geometry.encoding.decodePath(\"".$encoded[0]."\"); \n";

        $init_borders .= "var shape = new google.maps.Polygon(p); \n";
        $init_borders .= "shape.setMap(map); \n";
      }
    }
 
    $init_borders .= "\n}";
    $write= $init_borders;

    $file = fopen(__DIR__."/../../web/resources/init.js", 'w');
    fwrite($file, $write);
    fclose($file);
	}
 
	public function encode_by_reducing_pointcount ($points) {
  		$dlat =0;
  		$plng =0;
  		$plat = 0;
  		$dlng = 0;
  		$i=0;
    	$points=explode(",",$points);
  		foreach ($points as $point) {
    		$map_point=explode(" ",$point);
    		$point=array("lat"=>$map_point[1],"lng"=>$map_point[0]);
      		if (fmod($i,5) == 0 && count($points) > 16) {
        		$late5 = intval($point['lat'] * 1e5);
        		$lnge5 = intval($point['lng'] * 1e5);
        		$dlat = $late5 - $plat;
        		$dlng = $lnge5 - $plng;
        		$plat = $late5;
        		$plng = $lnge5;
        		$res[0] .= $this->encode_signed_number($dlat);
        		$res[0] .= $this->encode_signed_number($dlng);
        		$res[1] .= $this->encode_number(3);
      		}
      		if (count($points) <= 16) {
        		$late5 = intval($point['lat'] * 1e5);
        		$lnge5 = intval($point['lng'] * 1e5);
        		$dlat = $late5 - $plat;
        		$dlng = $lnge5 - $plng;
        		$plat = $late5;
        		$plng = $lnge5;
        		$res[0] .= $this->encode_signed_number($dlat);
        		$res[0] .= $this->encode_signed_number($dlng);
        		$res[1] .= $this->encode_number(3);
      		}
 
    		$i++;
  		}
  		return $res;
	}
 
	function encode_signed_number($num) {
  		$sig_num = $num << 1;
  		if ($sig_num < 0) {
  			$sig_num = ~$sig_num;
  		}
  		$res=$this->encode_number($sig_num);
  		return $res;
	}
 
	function encode_number($num) {
  		$res = "";
  		while ($num  >= 0x20) {
    		$res .= chr((0x20 | ($num & 0x1f)) + 63);
    		$num >>=5;
  		}
  		$res .= chr($num + 63);
  		return $res;
	}

}