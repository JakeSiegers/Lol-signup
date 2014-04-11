<?php
class TeamInfo{

	private $api;
	private $db;

	function __construct(){
		require_once('LolApi.php');
		$this->api = new LolApi();
		require_once('DbPasswords.php');
	    $this->db = new DbPasswords('local');
	}

	function getTeamSummonerStats(){
		$summoners = array();
		$con=mysqli_connect($this->db->get('hostname'),$this->db->get('username'),$this->db->get('password'),$this->db->get('database'));
	    if (mysqli_connect_errno()){
	        die('Cannot connect to database');
	    }
		$result = mysqli_query($con,"SELECT team_name,p1,p2,p3,p4,p5 FROM teams");
	    if($result === false){
	        die('Database Error');
	        //die(mysqli_error($con));
	    }
	    while ($row = $result->fetch_assoc()) {
	        for($i=1;$i<=5;$i++){
	        	$summoners[str_replace(' ','',strtolower($row['p'.$i]))]=array('team'=>$row['team_name']);
	        }
	    }
	    //echo count($summoners);
		mysqli_close($con);
		$summonersToPop = array_keys($summoners);
		//echo count($summonersToPop);
		while(count($summonersToPop)>0){
			$summonersToCheck = array();
			for($i=0;$i<40;$i++){
				if(count($summonersToPop)>0){
					$next=array_shift($summonersToPop);
					$summonersToCheck[]=$next;
					//echo $i.' = '.$next.'<br />';
				}
			}
			$checkedSummonersResults = $this->api->getSummoners($summonersToCheck);
			if(!is_null($checkedSummonersResults['data'])){
				foreach($checkedSummonersResults['data'] as $summonerName => $summonerData){
					if(isset($summoners[$summonerName])){
						$summoners[$summonerName]['id'] = $summonerData['id'];
						$summoners[$summonerName]['name'] = $summonerData['name'];
						$summoners[$summonerName]['level'] = $summonerData['summonerLevel'];
						$summoners[$summonerName]['rank'] = $this->checkRankCache($summonerData['name'],$summonerData['id']);
						//$summoners[$summonerName]['rawdata'] = $summonerData;
					}
				}
			}
		}
		return $summoners;
	}

	function checkRankCache($name,$id){
		$con=mysqli_connect($this->db->get('hostname'),$this->db->get('username'),$this->db->get('password'),$this->db->get('database'));
	    if (mysqli_connect_errno()){
	        die('Cannot connect to database');
	    }
		$result = mysqli_query($con,"SELECT summoner_id FROM summoners WHERE summoner_id=".$id);
		$numRows = mysqli_num_rows($result);
		mysqli_close($con);
		if($numRows == 1){
			$rankData=array();
			$con=mysqli_connect($this->db->get('hostname'),$this->db->get('username'),$this->db->get('password'),$this->db->get('database'));
		    if (mysqli_connect_errno()){
		        die('Cannot connect to database');
		    }
			$result = mysqli_query($con,"SELECT summoner_rank,summoner_tier FROM summoners WHERE summoner_id=".$id);
		    if($result === FALSE){
		    	die(mysqli_error($con));
		    }
		    $row = $result->fetch_assoc();
		    $rankData['rank']=$row['summoner_rank'];
		    $rankData['tier']=$row['summoner_tier'];
		    mysqli_close($con);
			return $rankData;
		}else{
			$rankData  = $this->api->getSummonerRank($id);
			if(!is_null($rankData['rank']) && !is_null($rankData['tier'])){
				$con=mysqli_connect($this->db->get('hostname'),$this->db->get('username'),$this->db->get('password'),$this->db->get('database'));
		    	if (mysqli_connect_errno()){
		        	die('Cannot connect to database');
		    	}
				mysqli_query($con,"INSERT INTO summoners (summoner_name, summoner_id, summoner_rank, summoner_tier) VALUES ('".$name."',".$id.",'".$rankData['rank']."','".$rankData['tier']."')");
				mysqli_close($con);
			}
			return($rankData);
		}
	}
}

$obj = new TeamInfo();

$allsummoners = $obj->getTeamSummonerStats();
//echo '<pre>';
//var_dump($allsummoners);
//echo '</pre>';
?>
<!DOCTYPE html>
<html>
<head>
<style>
	table, tr, td{
		border:1px solid black;
	}
	.bronze{
		background:brown;
	}
	.silver{
		background:grey;
	}
	.gold{
		background:gold;
	}
	.plat{
		background:blue;
		color:white;
	}
	.diamond{
		background:cyan;
	}
</style>
</head>
<body>

<?php
echo '<table>';
echo '<tr>';
echo '<th>#</th>';
echo '<th>Name</th>';
echo '<th>Team</th>';
echo '<th>Level</th>';
echo '<th>Tier</th>';
echo '<th>Rank</th>';
echo '</tr>';
$count = 0;
foreach($allsummoners as $summonerName => $summoner){
	echo '<tr>';

	echo '<td>';
		$count++;
		echo $count;
		
	echo '</td>';


	echo '<td>';
	//if(isset($summoner["name"])){
		//echo $summoner["name"];
	//}
	echo $summonerName;
	echo '</td>';

	echo '<td>';
	if(isset($summoner["team"])){
		echo $summoner["team"];
	}
	echo '</td>';

	
		echo '<td>';
		if(isset($summoner["level"])){
			echo $summoner["level"];
		}
		echo '</td>';
	

	if(isset($summoner['rank']['tier'])){
		$class = '';
		switch($summoner['rank']['tier']){
			case('BRONZE'):
				$class= 'bronze';
				break;
			case('SILVER'):
				$class= 'silver';
				break;
			case('GOLD'):
				$class= 'gold';
				break;
			case('PLATINUM'):
				$class= 'plat';
				break;
			case('DIAMOND'):
				$class= 'diamond';
				break;
		}
		echo '<td class="'.$class.'">';
			echo $summoner['rank']['tier'];
		echo '</td>';
	}else{
		echo '<td></td>';
	}

	
		echo '<td>';
		if(isset($summoner['rank']['rank'])){
			echo $summoner['rank']['rank'];
		}
		echo '</td>';
	

	
		echo '<td>';
		if(isset($summoner['id'])){
			echo '<a href="http://www.lolking.net/summoner/na/'.$summoner['id'].'" target="_blank">LolKing</a>';
		}
		echo '</td>';
	
	echo'</tr>';
}
echo '</table>';
echo 'There are '.($count/5).' Teams Signed Up!'
?>
</body>
</html>
