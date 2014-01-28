<?php 
ob_start();
session_start();
	//Load all things necessary...
	include('config/loader.php');
	include(HEAD);
	$page = "";
	if(isset($_GET['page'])) {
		
		$page = $_GET['page'];
		
		$obj = new $page();//controller
	
		//run a method (action) in the controller class
		if(isset($_GET['action']))
		{
			$action = $_GET['action'];
			$args = 0;
			if(isset($_GET['args'])) {
				$args = $_GET['args'];
				$obj->$action($args);
			}
			else {
				$obj->$action();
			}
		}
		else 
		{
			//run index method in controller class
			$obj->index();
		}
	}
	//LOAD DEFAULT (def) page
	else {
	  	$def = new Def();
	}

	include(FOOT);
ob_end_flush();
?>