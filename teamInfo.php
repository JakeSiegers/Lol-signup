<?php
	require_once('LolApi.php');
	$api = new LolApi();
	echo '<pre>';
	var_dump($api->getSummonerIds(array('Sirtopeia',' Choder Rules')));
	echo '</pre>';
?>