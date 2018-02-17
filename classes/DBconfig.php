<?php 

/**
* class for CRUD operation on Database
* 
* 
*/
class DBconfig extends mysqli
{
	private $host='localhost';
	private $user='root';
	private $pwd='';
	private $DBname='admito';
	private $conn=null;

	function connect($DBname=null)
	{
		if(!empty($DBname))
			$this->DBname=$DBname;

		try {
			$this->conn=new mysqli($this->host,$this->user,$this->pwd,$this->DBname);
			if(!$this->conn) 
				throw new Exception("Could not connect to Database");
			$this->conn->set_charset("utf8");
			return $this->conn;
		} catch(Exception $DBexc) {
			echo 'Error : '.$DBexc->getMessage();
		}
	}
	function close() 
	{
		$this->conn->close();
	}
	function validateQuery($str)
	{
		$str=filter_var($str, FILTER_SANITIZE_STRING);
		$str=stripslashes($str);
		$str=$this->conn->real_escape_string($str);
		return $str;
	}
	// function select($q)
	// {
	// 	$q=$this->validateQuery($q);
	// 	$query=$this->conn->query($q);
	// 	return $query->fetch_array();
	// }
	// function insert()
	// {
		
	// }
	// function update()
	// {
		
	// }
}


?>