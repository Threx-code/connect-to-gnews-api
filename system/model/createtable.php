<?php

class CreateTable{
	private $db;

	public function __construct(){
		$this->db = new Database;
	}

/*

TO CREATE NEW TABLE(S) PLEASE FOLLOW THE FORMAT BELLOW
*/
	public function createTable(){
		try {

			$query =$this->db->query("CREATE TABLE news(
			id INT(11) NOT NULL AUTO_INCREMENT,
			title VARCHAR (255) NOT NULL,
			description TEXT NOT NULL,
			url VARCHAR (255) NOT NULL,
			image VARCHAR(255) NOT NULL,
			publishedAt INT(11) NOT NULL,
			source_name VARCHAR(255) NOT NULL,
			source_url VARCHAR(255) NOT NULL,
			INDEX(title(6)),
			INDEX(url(6)),
			INDEX(image(6)),
			INDEX(source_name(6)),
			INDEX(source_url(6)),
			PRIMARY KEY (id)) ENGINE MyISAM DEFAULT CHARSET= latin1 AUTO_INCREMENT=1");
			$this->db->execute($query);
		} 
		catch (PDOException $e) {
			echo  "Table news error: ".$e->getMessage();
		}
	}
}
?>
