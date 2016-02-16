<?php

  require_once('ODB/config.php');






class driver{
	  	public $host;
        public $user;
        public $pswd;
        public $db;
	  
public function __construct(){
	
		$this->host = DB_HOSTNAME;
        $this->user = DB_USERNAME;
        $this->pswd = DB_PASSWORD;
        $this->db  = DB_DATABASE;
  
       
}
   
public function db_connect(){

    
        $connection = mysqli_connect($this->host,$this->user,$this->pswd,$this->db);
   
            mysqli_query($connection,"set_client='utf8'");
            mysqli_query($connection,"set character_set_results='utf8'");
            mysqli_query ($connection,"set collation_connection='utf8_general_ci'");
            mysqli_query ($connection,"SET NAMES utf8");
            if(!$connection || !mysqli_select_db($connection,$this->db)){   return false;  }
            return $connection;   
    
   }
   
      
    public function db_res_arr($result){
            $res_arr = array();
            $count = 0;
            while($row = mysqli_fetch_array($result))
            {
                $res_arr[$count] = $row;
                $count++; 
            }
            return $res_arr;
    }
   
   
       
     public function insert($sql){
            return $this->IDU($sql);
     }
     
     public function delt($sql){
            return $this->IDU($sql);
     }
     public function update($sql){
            return $this->IDU($sql);
     }
     
     
     /* idu = insert delete update*/
     public function IDU($sql){
	      $result=mysqli_query($this->db_connect(),$sql);
          return $result;
     }
     
     
     

     public function select($sql){
              $result = mysqli_query($this->db_connect(),$sql);
              
              $result = $this->db_res_arr($result);
              
              return $result;
      }
      
     public function  check($sql){
              $result = mysqli_query($this->db_connect(),$sql);
              $result = $this->db_res_arr($result);
              return (isset($result[0])) ? true : false;
       }
    



 
 }
?>