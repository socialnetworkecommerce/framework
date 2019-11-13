<?php
  /*
   * PDO Database Class
   * Connect to database
   * Create prepared statements
   * Bind values
   * Return rows and results
   */
  class Database {
    private $host = DBHOST;
    private $user = DBUSER;
    private $pass = DBPASS;
    private $dbname = DBNAME;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct(){
      // Set DSN
      $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
      $options = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      );

      // Create PDO instance
      try{
        $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
      } catch(PDOException $e){
        $this->error = $e->getMessage();
        echo $this->error;
      }
    }

    // Prepare statement with query
    public function query($sql){
      $this->stmt = $this->dbh->prepare($sql);
    }

    // Bind values
    public function bind($param, $value, $type = null){
      if(is_null($type)){
        switch(true){
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
        }
      }

      $this->stmt->bindValue($param, $value, $type);
    }

    // Execute the prepared statement
    public function execute(){

     if(!$this->stmt->execute()){
        die($this->dbh->errorInfo());
     }else{
      return $this->stmt->execute();
     }
    }

    // Get result set as array of objects
    public function resultSet($type = 'obj'){
      $this->execute();

      if($type == 'obj')
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
      return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
      
    }

    // Get single record as object
    public function single(){
      $this->execute();
      return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // Get row count
    public function rowCount(){
      $this->execute();
      return $this->stmt->rowCount();
    }

    public function insert()
    {
      $this->execute();
      return $this->lastInsertId();
    }

    public function stmt(){
      return $this->stmt;
    }

    public function lastInsertId(){
      return $this->dbh->lastInsertId();
    }

    public function error()
    {
      return $this->error;
    }

    public function instance()
    {
      return $this->dbh;
    }
  }