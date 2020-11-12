<?php

class DBController{

    //Database Connection
    protected $host = 'localhost';  //local server
    protected $user = 'root';       //server username
    protected $password = '';       //server pw
    protected $database = 'goceries'; //server db

    //connection property using nysqli
    public $con = null;

    //call constructor
    public function __construct(){

    //https://stackoverflow.com/questions/15707696/new-mysqli-vs-mysqli-connect

       $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->database);
       if ($this->con->connect_error){
           echo "Fail" . $this->con->connect_error;
       }
       echo 'Successful Connection';
   }
 

   public function __destruct(){
       $this->closeConnection(); //call the closeConnection function created below;
   }



   //close connection for mysqli
   protected function closeConnection(){
       if($this->con != null){
           $this->con->close();
           $this->con = null;
       }
   }
}



?>