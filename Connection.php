<?php

class Connection{

	public $conn;

	public function __construct(){
		$this->conn = new PDO("mysql:host=localhost;dbname=ctg-323","root","");
	

	}

	// get all notes
	public function getAllnotes()
	{
		$statement = $this->conn->prepare("SELECT * FROM tasks");
		$statement->execute();
		$data = $statement->fetchAll();
		return $data;	
	}

	// insert a task
	public function addNote($title,$details,$day)
	{
		$statement = $this->conn->prepare("INSERT INTO tasks (title,details,day,status) VALUES (:title,:details,:day,:status);");
				$statement->execute(
					array(
						':title' => $title,
						':details' => $details,
						':day' => $day,
						':status' => 1	
					)
				);

	}

}

?>
