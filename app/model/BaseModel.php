<?php
class BaseModel {
	protected $db;
	
	public function __construct()
	{
		$database = new Db();
		$this->db = $database->pconnect();
	}
}

?>