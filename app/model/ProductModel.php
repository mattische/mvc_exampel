<?php

class ProductModel extends BaseModel
{
	public function __construct()
	{
		parent::__construct();
	}
	
	
	public function getAllProducts()
	{
		
		//$result = $this->db->query("SELECT * FROM Product");
		$sth = $this->db->prepare("SELECT * FROM Product");
		$sth->execute();

		/* Fetch all of the remaining rows in the result set */
		$result = $sth->fetchAll(PDO::FETCH_ASSOC);
		
		return $result;
	}
	
	public function getProduct($id)
	{
		$sth = $this->db->query("SELECT * FROM Product WHERE id=".$id);
		$sth->execute();

		/* Fetch all of the remaining rows in the result set */
		$row = $sth->fetchAll(PDO::FETCH_ASSOC);
		
		return $row;
	}
	
	public function getByCategory($cid)
	{
		
		//$result = $this->db->query("SELECT * FROM Product");
		$sth = $this->db->prepare("SELECT * FROM Product WHERE category=".$cid);
		$sth->execute();

		/* Fetch all of the remaining rows in the result set */
		$result = $sth->fetchAll(PDO::FETCH_ASSOC);
		
		return $result;
	}
	
	public function edit($pid, $name, $price)
	{
		$sql = "UPDATE Product SET price=?, name=? WHERE id=?";
		$sth = $this->db->prepare($sql);
		$sth->execute(array($price, $name, $pid));
	}
	
	public function delete($pid)
	{
		$sql = "DELETE FROM Product WHERE id=?";
		$sth = $this->db->prepare($sql);
		$sth->execute(array($pid));
	}
	
	public function newProduct($name, $price, $cid)
	{
		$sql = "INSERT INTO Product (name, price, category) VALUES (:name,:price,:category)";
		$q = $this->db->prepare($sql);
		$q->execute(array(':name'=>$name,
		                  ':price'=>$price,
						  ':category'=>$cid));
		
	}
}

?>