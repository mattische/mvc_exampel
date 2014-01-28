<?php

class Db implements IDal
{
	private $dbh;
	
	
	public function connect() {
		return $this->pconnect();
	}
	
	public function pconnect()
	{
		$this->dbh = new PDO(DB_DSN, DB_USER, DB_PWD, array(PDO::ATTR_PERSISTENT => true));
		$this->dbh->exec("SET CHARACTER SET utf8");
		return $this->dbh;
	}
		
	public function close()
	{}
	
	public function query($sql)
	{
		return $this->dbh->query($sql);
	}
}

?>