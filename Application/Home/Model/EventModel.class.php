<?php
/**
*
*
*/

namespace Home\Model;
header("Content-Type: text/html; charset=utf-8");
class EventModel{

	public function getEvent($citycode = '010'){
		$db = M('event');
		
		//$redis =  new \Redis();
		//$key = "redis_all_event";
		//$results = $redis->get($key);

		$_city = self::getCityName($citycode);
		$return = array();
		if($results){

		}else{
			$results = $db->select();
			if($results){
				foreach ($results as $key => $value) {
					$addr = trim($value['address']);
					$city = explode(' ', $addr);
					$str = $city[0];
					$city = substr($str,0,-2);
					if($city==$_city){
						$return [] = $value;
					}
				}
			}
		}

		return $return;
	}

	public function getCityName($citycode){

		$file = __DIR__.'/../Common/city.json';
		
		$allCity = file_get_contents($file);
		$arrCity = explode("\n", $allCity);
		$res = array();
		foreach ($arrCity  as $key => $value) {
			$code = explode(":", $value);
			$res[$code[0]] = $code[1];
		}
		if(isset($res[$citycode])){
			return trim($res[$citycode]);
		}else{
			return false;
		}
	}

}
