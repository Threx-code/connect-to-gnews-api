<?php
class FormProcessor{
	private $db;

	public function __construct(){
		$this->db = new Database();
	}
	
	
	/*creating category*/
	public function createNews($data){
		$this->db->query("INSERT INTO news (title, description, url, image, publishedAt, source_name, source_url )
			VALUES(:title, :description, :url, :image, :publishedAt, :source_name, :source_url )");
		$this->db->bindStatement(":title", $data['title']);
		$this->db->bindStatement(":description", $data['description']);
		$this->db->bindStatement(":url", $data['url']);
		$this->db->bindStatement(":image", $data['image']);
		$this->db->bindStatement(":publishedAt", $data['publishedAt']);
		$this->db->bindStatement(":source_name", $data['source_name']);
		$this->db->bindStatement(":source_url", $data['source_name']);

		if($this->db->execute()){
			return true;
		}
		
		
	}

}

?>