<?php
class LolApi{

	private $apiKey;
	function __construct(){
		require_once('LolApiKey.php');
		$this->apiKey = LolApiKey::getKey();
	}

	function getSummonerIds($arrayOfNames){
		for($i=0;$i<count($arrayOfNames);$i++){
			$arrayOfNames[$i] = urlencode(trim($arrayOfNames[$i]));
		}
		return $this->apiRequest('summoner/by-name/'.implode(',',$arrayOfNames));
	}

	function apiRequest($method,$region = 'na',$version = 'v1.4'){
		$url = 'https://prod.api.pvp.net/api/lol/'.$region.'/'.$version.'/'.$method.'?api_key='.$this->apiKey;
		return $this->curl($url);
	}

	function curl($url){
		$ch = curl_init();

		curl_setopt($ch,CURLOPT_URL,$url);

		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

		$contents = curl_exec($ch);

		curl_close ($ch);

		return $contents;
	}


}

?>