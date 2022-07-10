<?php

class dbms
{
public $table_created=FALSE;
public $conn;
public function connect() {
$this->conn = new mysqli('localhost', 'root', '' , "libv2");

if ($this->conn->connect_error) {
  die("Connection failed: " . $this->conn->connect_error);
}
echo "Connected successfully\r\n";
echo"</br>";
}
	
	
public function create_db()
{
	$this->conn = new mysqli('localhost', 'root', '');
 $sql = "CREATE DATABASE libv2";
if ($this->conn->query($sql) === TRUE) {
  echo 'Database created successfully';
} else {
  echo "Error creating database: " . $this->conn->error;
}
echo"</br>";
$this->conn->close();
}

public function create_table()
{

 $sql = "CREATE TABLE Students (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
score INT(4)
)";

if ($this->conn->query($sql) === TRUE) {
  echo "Table Students  created successfully\r\n";
} else {
  echo "Error creating table: " . $this->conn->error;
}

$sql ="CREATE TABLE queue (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
query varchar(200) NOT NULL,
status VARCHAR(30) DEFAULT 'queued',
error_text 	varchar(255)
)";	
echo "</br>";
if ($this->conn->query($sql) === TRUE) {
  echo "Table  Queues created successfully\r\n";
} else {
  echo "Error creating table: " . $this->conn->error;
}
}

public function insert($fname , $lname , $score)
{
$stmt = "INSERT INTO Students (firstname, lastname, score) VALUES ($fname , $lname, $score)";

return $stmt;

}


public function select()
{
	$sql = "SELECT * FROM Students";
	$result = $this->conn->query($sql);
	$out = [];
	if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	  
	  $arr=['id'=> $row["id"] ,'fname'=> $row["firstname"], 'lname'=>$row["lastname"] , 'score' =>$row["score"]];
		array_push($out , $arr);
  }
} else {
	echo "0 result";
}
  
	return $out;

}

public function delete_row($id)
{
	$stmt = "DELETE FROM Students WHERE id=$id";
return $stmt;


if ($stmt->execute() === TRUE) {
  echo "record deleted successfully\r\n";
} else {
  echo "Error: " . $sql . "<br>" . $this->conn->error;
}
}


public function update($fname , $lname , $score ,$id)
{
	$stmt = "UPDATE Students SET firstname=$fname, lastname=$lname, score=$score WHERE id=$id";
	return $stmt;

}

public function close()
{
	$this->conn->close();
}

public function query($sql)
{
	$stmt = $this->conn->query($sql);

return $stmt;	

}

}
