<?php
/*using PDO to connection to the database*/

class Database{
	private $db_host = DB_HOST;
	private $db_name = DB_NAME;
	private $db_user = DB_USER;
	private $db_pass = DB_PASS;


	private $stmt;
	private $error;
	private $db_conn;


	protected static $crf_token = NULL;
	protected static $token_time = NULL;

	/*DATABASE CONNECTION START*/
	public function __construct(){
		$dsn = 'mysql:host='.$this->db_host.';dbname='.$this->db_name;

		$options = array(
						PDO::ATTR_PERSISTENT=>TRUE,
						PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
					);
		// CONNECTING TO THE DATABASE
		try{
		$this->db_conn = new PDO($dsn, $this->db_user, $this->db_pass, $options);
		}
		catch(PDOException $e){
			//$this->error = $e->getMessage();
			exit("Sorry database connection lost");
		}
	}
	/*DATABASE CONNECTION END*/


	/*DATABASE QUERY SETUP*/
	public function query($query){
		$this->stmt = $this->db_conn->prepare($query);
	}
	/*DATABASE QUERY SETUP*/



	/*DATABASE BIND THE STATEMENT*/

	public function bindStatement($param, $value, $type=NULL){
		if(is_null($type)){
			switch (TRUE) {
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;

				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;

				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
				
				default:
					$type = PDO::PARAM_STR;
					break;
			}
		}

	$this->stmt->bindValue($param, $value, $type);
	}

	/*DATABASE BIND THE STATEMENT*/


	/*EXECUTING THE STATEMENT*/
	 public function execute(){
	 	return $this->stmt->execute();
	 }
	/*EXECUTING THE STATEMENT*/



	/*FETCHING ALL DATA AT ONCE*/

	public function fetchAll(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}

	/*FETCHING ALL DATA AT ONCE*/



	/*FETCH ONLY A SINGLE DATA*/

	public function fetchSingle(){
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_OBJ);
	}

	public function numCounter(){
		$this->execute();
		$num = $this->stmt->fetchColumn();
		return $num;

	}


	// creating crf token

	public function crfToken(){
		if(empty($_SESSION['crf_token'])){
			$_SESSION['crf_token'] = bin2hex(random_bytes(32));
			htmlentities($_SESSION['crf_token'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); 
		}

		return $_SESSION['crf_token'];
	}


	public function tokenTime(){
		if(empty($_SESSION['token_time'])){
			$_SESSION['token_time'] = time() + 3600;
		}
		return $_SESSION['token_time'];
	}

	public function checkToken($var){
		if(!empty($var) && time() < $this->tokenTime()){
		if(hash_equals($var, $this->crfToken())){
		return $this->crfToken();
		return $this->tokenTime();
	}
	else{
		echo "You need to refresh this page <a href=''>Click here</a>";
	}
	}
	else{
		unset($_SESSION['token_time']);
		unset($_SESSION['crf_token']);
		echo "Page expired, click here to <a href=''>Refresh</a>";
	}
	}


			
	//generating session ID
	public function sameSessionId(){
	session_id();
	session_regenerate_id();
	}

	// sanitizing user input
	public function sanitizeString($var){	
	$var = strip_tags($var);
	$var= htmlentities($var);
	$var= stripslashes($var);
	$var = filter_var($var, FILTER_SANITIZE_STRING);
	return $var;
	}


}
?>