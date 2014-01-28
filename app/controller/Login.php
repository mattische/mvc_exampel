<?php

class Login extends BaseController
{
	public function __construct()
	{
		parent::loadModel();
	}
	
	public function index()
	{
		$data = array();
		if(isset($_SESSION['usr']))
			echo "You already logged in as " . $_SESSION['usr']; 
		else
			$this->render();
	}
	
	public function validate()
	{
		if(isset($_POST['usr']) && isset($_POST['pwd']))
		{
			$res = $this->model->checkUser($_POST['usr'], $_POST['pwd']);
			if(($res['usr'] === $_POST['usr']) && $res['pwd'] === $_POST['pwd'])
			{
				$_SESSION['usr'] = $_POST['usr'];
				header('Location: index.php');
			}
			else
				echo "<h1>You are not's ok!</h1>";
		}
	}
	
	public function logout()
	{
		session_unset();
		header('Location: index.php');
	}
	
}
?>