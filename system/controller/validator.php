<?php
class Validator{
	private $db;

	public function __construct(){
		$this->db = new Database();
	}

	/*session Id*/
	public function sessionId(){
		$this->db->sameSessionId();
	}

	/*security token*/
	public function crfToken(){
		return $this->db->crfToken();
	}

	public function selfURL(){
		return $this->db->selfURL();
	}

	/*security token exprire time*/
	public function tokenTime(){
		return $this->db->tokenTime();
	}

	public function checkToken($var){
		return $this->sanitizeString($this->db->checkToken($var));
	}

	/*sanitizing user input*/
	public function sanitizeString($var){
		return $this->db->sanitizeString($var);
	}

}


?>