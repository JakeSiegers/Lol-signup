<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/inc/db/pdo_helper.php');

	class lolsignup{
		function __construct(){
			if(false === $this->db = new pdo_helper($_SERVER['DOCUMENT_ROOT'].'/inc/credentials/mysql_lolsignups.php')){
				$this->dieAndJSON(array(
					'success' => true
					,'teamAdded' => false
					,'message' => "<p class='lead'>Oh no!</p>Cannot connect to database."
				));
			}

			$this->fieldErrors = array();
			$this->fieldErrorMsg = "";

		}

		private function dieAndJSON($data){
			echo json_encode($data);
			die();
		}

		/*
		function getTeams(){
			if(false === $this->db->query("SELECT ")){
				$this->dieAndJSON(array(
					'success' => true
					'error' => 'Failed to load teams'
				));
			}

		}*/

		private validateFields($lolPostVars){

			$this->fieldErrors = array();
			$this->fieldErrorMsg = "";

			$databaseInput = array();
			foreach($lolPostVars as $fieldName => $postName){
				if(!isset($_POST[$postName]) || strlen($_POST[$postName]) == 0){
					$this->fieldErrorMsg.= "The '".$fieldName."' field is required.<br />";
					$this->fieldErrors[] = $postName;
					continue;
				}
				if(strlen($_POST[$postName])>30){
					$this->fieldErrorMsg.="The '".$fieldName."' field must be no more than 30 characters.<br />";
					$this->fieldErrors[] = $postName;
					continue;
				}
				if($postName == 'lol_captainEmail' && !filter_var($_POST['lol_captainEmail'], FILTER_VALIDATE_EMAIL)){
					$this->fieldErrorMsg.="Please use a valid email in the '".$fieldName."' field!<br />";
					$this->fieldErrors[] = $postName;
					continue;
				}
				$databaseInput[$fieldName] = $_POST[$postName];
			}

			if(!isset($_POST['lol_checkbox'])){
				$this->fieldErrorMsg.="Please agree to the rules<br />";
			}

			return $databaseInput;
		}

		function submitTeam(){

			$lolPostVars = array(
				'Team Name'		=> 'databaseInputName'
				,'Team Leader\'s Name'	=> 'lol_captainName'
				,'Team Leader\'s Email'	=> 'lol_captainEmail'
				,'Team Leader\'s Phone'	=> 'lol_captainPhone'
				,'Summoner 1'			=> 'lol_sName1'
				,'Summoner 2'			=> 'lol_sName2'
				,'Summoner 3'			=> 'lol_sName3'
				,'Summoner 4'			=> 'lol_sName4'
				,'Summoner 5'			=> 'lol_sName5'
			);

			$databaseInput = validateFields($lolPostVars);

			if(strlen($this->fieldErrorMsg)>0){
				$this->dieAndJSON(array(
					'success' => true
					,'teamAdded' => false
					,'failedFields' => $this->fieldErrors
					,'message' => '<p class="lead"><b>Hold on there buddy:</b></p>'.$this->fieldErrorMsg
				));
			}

			if(false === $this->db->query("INSERT INTO signedupteams(teamName,teamLeadName,teamLeadEmail,teamLeadPhone,p1,p2,p3,p4,p5) VALUES (?,?,?,?,?,?,?,?,?)",array_values($databaseInput))){
				if(strstr($this->db->lastError(),'Duplicate entry')){
					$this->dieAndJSON(array(
						'success' => true
						,'teamAdded' => false
						,'message' => '<p class=\'lead\'><b>You\'re already signed up!</b></p>This captain email is already in my records.'
					));
				}else{
					$this->dieAndJSON(array(
						'success' => true
						,'teamAdded' => false
						,'message' => '<p class=\'lead\'><b>Gah!</b></p> Database Error.<br />'.$this->db->lastError()
					));
				}
			}

			$this->dieAndJSON(array(
				'success' => true
				,'teamAdded' => true
				,'message' => '<p class=\'lead\'><b>Yay!</b></p> Your team has been registered!'
			));
		}

		function submitSolo(){

			$lolPostVars = array(
				,'Name'	=> 'lol_captainName'
				,'Email'	=> 'lol_captainEmail'
				,'Phone'	=> 'lol_captainPhone'
				,'Summoner Name'		=> 'lol_sName'
			);

			if(strlen($this->fieldErrorMsg)>0){
				$this->dieAndJSON(array(
					'success' => true
					,'teamAdded' => false
					,'failedFields' => $this->fieldErrors
					,'message' => '<p class="lead"><b>Hold on there buddy:</b></p>'.$this->fieldErrorMsg
				));
			}

			if(false === $this->db->query("INSERT INTO signedupdsolos(soloName,soloPhone,soloEmail,p1) VALUES (?,?,?,?)",array_values($databaseInput))){
				if(strstr($this->db->lastError(),'Duplicate entry')){
					$this->dieAndJSON(array(
						'success' => true
						,'teamAdded' => false
						,'message' => '<p class=\'lead\'><b>You\'re already signed up!</b></p>This captain email is already in my records.'
					));
				}else{
					$this->dieAndJSON(array(
						'success' => true
						,'teamAdded' => false
						,'message' => '<p class=\'lead\'><b>Gah!</b></p> Database Error.<br />'.$this->db->lastError()
					));
				}
			}

			$this->dieAndJSON(array(
				'success' => true
				,'teamAdded' => true
				,'message' => '<p class=\'lead\'><b>Yay!</b></p> Your team has been registered!'
			));
		}
	}

?>