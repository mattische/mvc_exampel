<?php

class CategoryModel extends BaseModel
{
	public function __construct()
	{
		parent::__construct();
	}
	
	
	public function getAllCategories()
	{	
		//$result = $this->db->query("SELECT * FROM Product");
		$sth = $this->db->prepare("SELECT * FROM Category");
		$sth->execute();

		/* Fetch all of the remaining rows in the result set */
		$result = $sth->fetchAll(PDO::FETCH_ASSOC);
		
		return $result;
	}
	
	public function getCategory($id)
	{
		$sth = $this->db->query("SELECT * FROM Category WHERE id=".$id);
		$sth->execute();

		/* Fetch all of the remaining rows in the result set */
		$row = $sth->fetchAll(PDO::FETCH_ASSOC);
		
		return $row;
	}
}

?>