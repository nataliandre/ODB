<?php
  class ODB{

	   private $table;
	   private $driver;
               
        public function __construct($table) {
	          $this->table = $table; 
              require_once('ODB/driver.php');
              $this->driver = new Driver();
                        
              
        }
        
        
        
        
        
        
        public function get($args,$conditions = ''){
	        $args = ($args!="*") ? implode(",", $args) : '*';
	        $table = $this->table;
	        $entities = DB_PREFIX.'entity';
	        $SQL = "SELECT $args 
	        	   FROM $table AS a
	        	   LEFT JOIN $entities AS e ON e.entityId = a.id";
	        	   if(!empty($conditions)){ 
		        	   $conditions = $this->executeConditions($conditions); 
	        	       $SQL.="WHERE $conditions";
	        	   }
	        return $this->driver->select($SQL);
        }
        
        
        public function executeConditions($conditions){
	        
        }
      
      
      
      
      
      
      
  }
?>