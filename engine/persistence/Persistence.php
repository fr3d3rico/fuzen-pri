<?php
class Persistence {
	
	private $dbconn;
	
	function __construct() {
		$this->connect();
	}
	
	function __destruct() {
		$this->closeConnection();
	
		//Close Conect
		if( is_resource($this->dbconn) ) {
			pg_close($this->dbconn);
		}
	}
	
	function connect() {
		//Conect
		$this->dbconn = pg_connect("host=localhost dbname=DBNAME user=USER password=PASSWORD") or die("Could not connect: " . pg_last_error());
	}
	
	function closeConnection() {
		//Close Conect
		pg_close($this->dbconn);
	}
}
?>