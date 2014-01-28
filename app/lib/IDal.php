<?php
interface IDal
{
	public function connect();
	public function pconnect();
	public function close();
	public function query($sql);	
}
?>