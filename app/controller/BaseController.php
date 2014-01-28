<?php
abstract class BaseController
{
	//access to model
	protected $model;
	//default view
	private $view;
	

	public abstract function index();
	
	public function loadModel()
	{
		//echo "<br /> Base, loadModel()... " .get_class($this) ."Model<br />";
		$m = get_class($this) ."Model";
		$this->model = new $m();
	}
	
	/**
	Get the twig template loader
	*/
	public function getViewLoader()
	{
		require_once 'lib/Twig/Autoloader.php';
		Twig_Autoloader::register();
		//no caching
		$loader = new Twig_Loader_Filesystem('view/');
		
		//caching enabled. Create .tmp/cache directory with read/write perms if using this...
		//$twig = new Twig_Environment($loader, array('cache' => './tmp/cache',));
		//no caching
		return new Twig_Environment($loader);
	}
	
	/*
	Include a view (if no argument is provided view with same name as Controller will be included) which will render it's content to browser.
	*/
	public function render($viewName = "")
	{
		if(strlen($viewName) > 0) {
			//echo "<p> BaseController render() default view: ".$viewName . ".php</p>";
			include('view/'.$viewName.'.php');
		}
		else {	
			//gets the name of current class that is being run...
			$this->view = strtolower(get_class($this));
			//echo "<p> BaseController render() default view: ".$this->view . ".php</p>";
			include('view/'.$this->view.'.php');
		}
	}
	

}
?>