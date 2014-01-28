<?php

class LoginModel extends BaseModel
{
	public function __construct()
	{
		parent::__construct();
	}
	
	
	public function checkUser($uid, $pwd)
	{	
		$uid = $this->db->quote($uid);
		$pwd = $this->db->quote($pwd);
		$sth = $this->db->prepare("SELECT usr, pwd FROM usr WHERE usr=".$uid." AND pwd=" .$pwd);
		$sth->execute();

		/* Fetch all of the remaining rows in the result set */
		$result = $sth->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
	
}

?>