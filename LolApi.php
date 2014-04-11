<?php
class LolApi{

	private $apiKey;
	private $apiUrl;
	function __construct(){
		require_once('LolApiKey.php');
		$this->apiKey = LolApiKey::getKey();
		$this->apiUrl = 'http://prod.api.pvp.net/api/lol/';
	}

	function getSummoners($arrayOfNames){
		//var_dump($arrayOfNames);
		for($i=0;$i<count($arrayOfNames);$i++){
			$arrayOfNames[$i] = $arrayOfNames[$i];
		}
		$raw_users = $this->apiRequest('v1.4/summoner/by-name/'.(implode(',',$arrayOfNames)));
		if($raw_users['success']){
			return $raw_users;
		}else{
			die('API key is maxed. Please try again later.');
		}
	}

	function getSummonerRank($id){

		$raw_rank_data = $this->apiRequest('v2.3/league/by-summoner/'.$id.'/entry');
		if($raw_rank_data['success']){
			foreach ($raw_rank_data['data'] as $piece){
				if($piece['queueType'] === 'RANKED_SOLO_5x5'){
					return array('tier' => $piece['tier'],'rank' => $piece['rank']);
				}
			}
			return array('tier' => 'Unknown','rank' => 'Unknown');
		}else{
			return null;
			//die('API key is maxed. Please try again later.');
		}
	}

	function apiRequest($method,$region = 'na'){
		$url = $this->apiUrl.$region.'/'.$method.'?api_key='.$this->apiKey;
		return $this->curl($url);
	}

	function curl($url){
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		$contents = json_decode(curl_exec($ch),true);
		if(curl_getinfo($ch)['http_code']!==200){
			curl_close ($ch);
			return array('success' => false,'data' => $contents);
		}
		curl_close ($ch);
		return array('success' => true,'data' => $contents);
	}
}

?>