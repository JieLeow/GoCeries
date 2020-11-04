<?php
class createDb
{
  public $servername;
  public $username;
  public $password;
  public $dbname;
  public $tablename;
  public $connect;

  //class constructor
  public function __construct(
    $dbname ="Newdb",
    $tablename ="Productdb",
    $servername ="localhost",
    $username ="root",
    $password =""
    )
    {
      $this->dbname = $dbname;
      $this->tablename =$tablename;
      $this->servername =$servername;
      $this->username = $username;
      $this->password = $password;
      // $this->connect =$connect;

      //Create connection
      $this->connect = mysqli_connect($servername,$username,$password);
      //Check connection
      if(!$this->connect){
        die("connection failed". mysqli_connect_error());
      }

      //query
      $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
      //execute query
      if(mysqli_query($this->connect, $sql)){
        $this->connect = mysqli_connect($servername, $username, $password, $dbname);

        //$sql to create a table
        $sql = "CREATE TABLE IF NOT EXISTS $tablename
        (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        product_name VARCHAR(25) NOT NULL,
        product_price FLOAT,
        product_weight FLOAT,
        product_image VARCHAR(100)
      );";

      if (!mysqli_query($this->connect,$sql)){
        echo "Error Creating Table" . mysqli_error($this->connect);
      }


    }else {
      return false;
    }
  }

  //get product from DATABASE
  public function getData(){
    $sql ="SELECT * FROM $this->tablename";
    $result = mysqli_query($this->connect, $sql);

    if(mysqli_num_rows($result)>0) {
      return $result;
    }
  }

}
