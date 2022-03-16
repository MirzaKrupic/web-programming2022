<?php

class TodoDao{

  private $conn;

  public function __construct(){
    $servername = "localhost";
    $username = "todo";
    $password = "todo";
    $schema = "todo";
    $this->conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
    // set the PDO error mode to exception
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  public function get_all(){
    $stmt = $this->conn->prepare("SELECT * from todos");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function add($description, $created){
    $stmt = $this->conn->prepare("INSERT INTO todos (description, created) VALUES ('$description', '$created')");
    $stmt->execute();
  }

  /**
  * Delete todo record from the database
  */
  public function delete($id){
    $stmt = $this->conn->prepare("DELETE FROM todos WHERE id=$id");
    $stmt->execute();
  }

  /**
  * Update todo record
  */
  public function update($id, $description, $created){
    $stmt = $this->conn->prepare("UPDATE todos SET description='$description', created='$created' WHERE id=$id");
    $stmt->execute();
  }

}

?>
