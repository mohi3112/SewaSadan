<?php
class database{
	private $host;
	private $dbusername;
	private $dbpassword;
	private $dbname;
	
	protected function connect(){
		$this->host='localhost';
		$this->dbusername='u402268216_learn';
		$this->dbpassword='Learn@2022';
		$this->dbname='u402268216_learn';
		$con=new mysqli($this->host,$this->dbusername,$this->dbpassword,$this->dbname);
		return $con;
	}
}
?>