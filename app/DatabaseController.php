<?php
class DatabaseController
{

  protected $conn;
  private $host = "localhost";
  private $database = "dab";
  private $username = "root";
  private $password = "";

  public function __construct()
  {
    try {
      $this->conn = new PDO("mysql:host=$this->host;dbname=$this->database;charset=utf8", $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }

  public function getConnection()
  {
    return $this->conn;
  }

  public function __destruct()
  {
    $this->conn = null;
  }
}